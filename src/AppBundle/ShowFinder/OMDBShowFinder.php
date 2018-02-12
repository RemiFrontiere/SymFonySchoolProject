<?php

namespace AppBundle\ShowFinder;

use GuzzleHttp\Client\Client;

class OMDBShowFinder implements ShowFinderInterface{

  private $client;

  public function _construct(Client $client){
    $this->client = $client;
  }

  public function findByName($query){
    $this->client->get('/?apikey=29337efc&type=series&t="walking"');
  }

  public function getName(){
    return 'IMDB API';
  }
}
