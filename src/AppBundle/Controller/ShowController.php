<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Show;
use AppBundle\File\FileUploader;
use AppBundle\Type\ShowType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;


//
/**
 * @Route(name="show_")
 */
class ShowController extends Controller{

    /**
     * @Route("/", name="list")
     */
    public function listAction(Request $request){
      $showRepository = $this->getDoctrine()->getRepository('AppBundle:Show');
      $session = $request->getSession();

      if ($session->has('query_search_shows')) {
          $querySearchShows = $session->get('query_search_shows');
          $shows = $showRepository->findAllByQuery($querySearchShows);
          $request->getSession()->remove('query_search_shows');
      } else {
          $shows = $showRepository->findAll();
      }

      return $this->render('show/list.html.twig', ['shows' => $shows]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function createAction(Request $request, FileUploader $fileUploader){

      $show = new Show();
      $form = $this->createForm(ShowType::class, $show, ['validation_groups' => 'create']);
      $form->handleRequest($request);

       if ($form->isValid()) {
           $generatedFileName = $fileUploader->upload($show->getTmpPicture(), $show->getCategory()->getName());
           $show->setMainPicture($generatedFileName);
           $em = $this->getDoctrine()->getManager();
           $em->persist($show);
           $em->flush();
           $this->addFlash('success', 'You successfully created a new show!');
           return $this->redirectToRoute('show_list');
       }

       return $this->render('create/create.html.twig', ['showForm' => $form->createView()]);
    }


    /**
     * @Route("/search", name="search")
     * @Method({"POST"})
     */
    public function searchAction(Request $request)
    {
        $request->getSession()->set('query_search_shows', $request->request->get('query'));
        return $this->redirectToRoute('show_list');
    }



    public function categoriesAction(){
      $repository = $this->getDoctrine()->getRepository(Category::class);
          $categories = $repository->findAll();
          return $this->render('show/categories.html.twig', [
              'categories' => $categories
          ]);
    }


    /**
     * @Route("/delete", name="delete")
     * @Method({"POST"})
     */
    public function deleteAction(Request $request, CsrfTokenManagerInterface $csrfTokenManager){
      $showId = $request->request->get('show_id');
      $show = $this->getDoctrine()->getRepository('AppBundle:Show')->findOneById($showId);

      if(!$show){
        throw new NotFoundException(sprintf('There is no show with the id %d', $showId));
      }

      $csrfToken = new CsrfToken('delete_show', $request->request->get('_csrf_token'));

      if($csrfTokenManager->isTokenValid($csrfToken)){
        $doctrine->getManager()->remove($show);
        $doctrine->getManager()->flush();

        $this->addFlash('success', 'The show have been successfully deleted.');

      }else{
        $this->addFlash('success', 'Csrf Token not valid. No deletion');
      }
      return $this->redirectToRoute('show_list');
    }
}
