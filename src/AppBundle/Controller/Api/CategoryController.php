<?php

namespace AppBundle\Controller\Api;

use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;



/**
* @Route(name="api_category_")
*
*/
class CategoryController extends Controller {

  /**
  * @Method({"GET"})
  * @Route("/categories", name="list")
  *
  */
  public function listAction(SerializerInterface $serializer){
    $categories = $this->getDoctrine()->getRepository('AppBundle:Category')->findAll();

    $data = $serializer->serialize($categories, 'json');

    return new Response($data, Response::HTTP_OK, ['Content-Type' => 'application\json']);
  }

  /**
  * @Method({"GET"})
  * @Route("/categories/{id}", name="get")
  */
  public function getAction(Category $category, SerializerInterface $serializer)
  {
    $json = $serializer->serialize($category, 'json');

    return new Response($json, Response::HTTP_OK, ['Content-Type' => 'application\json']);
  }

}
