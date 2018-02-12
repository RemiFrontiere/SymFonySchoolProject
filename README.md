SchoolSymfony
==============

## Usefull link
https://symfony.com/

Components : https://github.com/symfony/symfony

Form themes :  https://symfony.com/doc/current/form/form_themes.html


## Clone repository
git clone https://github.com/RemiFrontiere/SymfonySchoolProject.git


## Install dependencies
>composer install
or
>php composer.phar install

## Start server
>bin/console server:run

## Get environment variable available for this bundle
>bin/console config:dump-reference [NomBundle] (sans Bundle)

### Exemple:
>bin/console config:dump-reference framework

>bin/console config:dump-reference webserver

## Database has been created ?
>bin/console doctrine:database:create

## Database commands
>bin/console doctrine:schema:create

>bin/console doctrine:schema:update

>bin/console doctrine:migration:diff

>bin/console doctrine:migration:migrate

>bin/console doctrine:migration:execute [NumMigration]

For me :
>bin/console doctrine:migration:execute 20180206095108


### Search a service
>bin/console debug:container [Servicename]

## Doctrine DB
    /**
     * @ORM\Id                      --> For PRIMARY KEY
     * @ORM\GeneratedValue          --> Auto-Generated Value
     * @ORM\Column(type="integer")  --> Column type -- Default(string)
     */
     
     
# Example of insert into Category 
>insert into category(name)  values ('Science-Fiction');

>insert into category(name)  values ('Romantique');

>insert into category(name)  values ('Action');




## Etapes DB :

1. Creer fichier php dans Entity --> Exemple.php
2. Donner à ce fichier le namespace AppBundle\Entity
3. Ajouter les uses : 

>use Doctrine\ORM\Mapping as ORM;

4. Ajouter la class  Exemple
5. Ajouter les attributs privée
    1. ID --> 
    
    /**
  * @ORM\Id
  * @ORM\GeneratedValue
  * @ORM\Column(type="integer")
  */
  
  private $id;
