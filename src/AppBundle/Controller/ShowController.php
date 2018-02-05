<?php

namespace AppBundle\Controller;

use AppBundle\Type\ShowType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
    public function createAction(){
        $form = $this->createForm(ShowType::class);

        return $this->render('create/create.html.twig', ['showForm'=>$form->createView()]);
    }

    public function categoriesAction(){
        return $this->render('_includes/categories.html.twig',[
                'categories' => ['Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript','Typescript', 'Typescript', 'Valar morghulis', 'Typescript', 'Typescript', 'Typescript']
            ]);
    }
}