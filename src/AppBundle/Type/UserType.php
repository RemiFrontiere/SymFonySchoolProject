<?php

namespace AppBundle\Type;

class UserType extends AbstractType{
  public function buildForm(FormBuilderInterface $builder, array $options){
    $builder
      ->add('name')
      ->add('Save');
  }
}
