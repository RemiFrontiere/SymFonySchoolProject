<?php

namespace AppBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class ShowController extends Controller {

  /**
  * @Method({"GET"})
  * @Route("/shows", name="api_show_list")
  *
  */
  public function listAction(){
    $shows = $this->getDoctrine()->getRepository('AppBundle:Show')->findAll();

    return new JsonResponse($shows);
  }
}
