<?php
namespace AppBundle\Controller\Api;
use AppBundle\Entity\Show;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;


/**
 * @Route(name="api_show_")
 */
class ShowController extends Controller
{
	/**
	 * @Method({"GET"})
	 * @Route("/shows", name="list")
	 */
	public function listAction(SerializerInterface $serializer)
	{
		$shows = $this->getDoctrine()->getRepository('AppBundle:Show')->findAll();
		$serialzationContext = SerializationContext::create();
		return $this->returnResponse(
			$serializer->serialize($shows, 'json', $serialzationContext->setGroups(['show'])),
			Response::HTTP_OK
		);
	}
	/**
	 * @Method({"GET"})
	 * @Route("/shows/{id}", name="get")
	 */
	public function getAction(Show $show, SerializerInterface $serializer)
	{
		$serialzationContext = SerializationContext::create();
		var_dump($serialzationContext);
		return $this->returnResponse(
			$serializer->serialize($show, 'json', $serialzationContext->setGroups(['show'])),
			Response::HTTP_OK
			);
	}

	/**
     * @Route("/shows/{id}", name="update")
     * @Method("PUT")
     */
  public function putAction(Show $show, Request $request, SerializerInterface $serializer, ValidatorInterface $validator) {
      $newShow = $serializer->deserialize($request->getContent(), Show::class, 'json');
      dump($newShow); die;

      $constraintValidationList = $validator->validate($show);

      if($constraintValidationList->count() == 0) {
          $show->update($newShow);
          dump($show); die;
          $em = $this->getDoctrine()->getManager();
          $em->flush();

          return new Response('Show updated', Response::HTTP_OK);
      }

      return new Response($serializer->serialize($constraintValidationList, 'json'), Response::HTTP_BAD_REQUEST);
    }

	/**
	 * @Method({"DELETE"})
	 * @Route("/shows/{id}", name="delete")
	 */
	public function deleteAction(Show $show)
	{
			$this->getDoctrine()->getManager()->remove($show);
			$this->getDoctrine()->getManager()->flush();

			return $this->returnResponse('Show deleted', Response::HTTP_OK);
	}
}
