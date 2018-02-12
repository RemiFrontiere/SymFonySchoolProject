<?php

namespace AppBundle\ShowFinder;

class OMDBShowFinder implements ShowFinderInterface{

  public function findByName($query){

  }

  public function getName(){
    return 'IMDB API';
  }
}
