<?php

namespace AppBundle\Controller;

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
            dump($show); die;

            // Upload file

            // Save


        }

        return $this->render('create/create.html.twig', ['showForm'=>$form->createView()]);
    }

    public function categoriesAction(){
        return $this->render('_includes/categories.html.twig',[
                'categories' => ['Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript']
            ]);
    }
}