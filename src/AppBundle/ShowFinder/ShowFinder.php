<?php

namespace AppBundle\ShowFinder;

class ShowFinder{

  private $finders;

  public function searchByName($query){

  }

  public function addFinder($finder){
    $this->finders[] = $finder;
  }
}
