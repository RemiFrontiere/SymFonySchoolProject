<?php
namespace AppBundle\Entity;

use Doctrice\ORM\EntityRepository;

class ShowRepository extends EntityRepository{
  public function findAllByQuery($query){
    return $this->createQueryBuilder('s')
      ->where('LOWER(s.name) LIKE :query')
      ->setParameter('query', '%' . $query . '%')
      ->getQuery()
      ->getResult();
  }
}
?>
