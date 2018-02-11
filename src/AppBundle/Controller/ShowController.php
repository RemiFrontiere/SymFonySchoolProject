<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Show;
use AppBundle\Type\ShowType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(name="show_")
 */
class ShowController extends Controller{

    /**
     * @Route("/show", name="list")
     */

    public function listAction(){
        return $this->render('show/list.html.twig');
    }

    /**
     * @Route("/create", name="create")
     */
    public function createAction(Request $request){

        $show = new Show();

        $form = $this->createForm(ShowType::class, $show);

        $form->handleRequest($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($show);
            $em->flush();

            $this->addFlash('sucess', 'You successfully added a new show !');

            return $this->redirectToRoute('show_list');

        }

        return $this->render('create/create.html.twig', ['form'=>$form->createView()]);
    }

    public function categoriesAction(){
      $repository = $this->getDoctrine()->getRepository(Category::class);
          $categories = $repository->findAll();
          return $this->render('show/categories.html.twig', [
              'categories' => $categories
          ]);
    }
}
