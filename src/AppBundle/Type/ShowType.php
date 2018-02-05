<?php

namespace  AppBundle\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

class ShowType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $option){
        $builder
            ->add('name')
            ->add('category')
            ->add('abstract')
            ->add('country', CountryType::class)
            ->add('author')
            ->add('releasedDate')
            ->add('mainPicture', FileType::class);
    }
}