<?php

namespace AppBundle\DependencyInjection;

use AppBundle\ShowFinder\ShowFinder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ShowFinderCompilerPass implements CompilerPassInterface{

    public function process(ContainerBuilder $container){

      // Récuperer définition du service ShowFinder afin de lui ajouter les services taggués plus bas
      $showFinderDefinition = $container->findDefinition(ShowFinder::class);

      // Noms de services ayant comme tag 'show.finder'
      $showFinderTaggedServices = $container->findTaggedServiceIds('show.finder');

      // Pour tout les services ayant comme tag 'show.finder'
      foreach ($showFinderTaggedServices as $showFinderTaggedServiceId => $showFinderTaggedService) {

        // On créer ref avec id service
        $service = new Reference($showFinderTaggedServiceId);

        // On demande à appeler la méthode 'addFinder' sur le service ApplBundle\ShowFinder\ShowFinder
        // afin d'y injecter le service taggué
        $showFinderDefinition->addMethodCall('addFinder', [$service]);
      }
      //
      // dump(get_class($showFinderDefinition)); die;
    }
}
