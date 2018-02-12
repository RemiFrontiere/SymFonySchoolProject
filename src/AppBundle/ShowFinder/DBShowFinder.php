<?php

namespace AppBundle\ShowFinder;

use Symfony\Bridge\Doctrine\RegistryInterface;

class DBShowFinder implements ShowFinderInterface
{

  private $doctrine;

  public function _construct(RegistryInterface $doctrine){
    $this->doctrine = $doctrine;
  }

  public function findByName($query){
    return $this->doctrine->getRepository('AppBundle:Show')->findAllByQuery($query);
    dump(\GuzzleHttp\json_decode($results->getBody(), true)); die;
  }

  public function getName(){
    return 'Local Database';
  }
}
