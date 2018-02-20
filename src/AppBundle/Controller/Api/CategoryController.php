<?php

namespace AppBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller {

  /**
  * @Method({"GET"})
  * @Route("/categories", name="api_category_list")
  *
  */
  public function listAction(SerializerInterface $serializer){
    $categories = $this->getDoctrine()->getRepository('AppBundle:Category')->findAll();

    $data = $serializer->serialize($categories, 'json');

    return new Response($data, Response::HTTP_OK, ['Content-Type' => 'application\json']);
  }
}
