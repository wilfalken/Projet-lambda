<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SearchBaseType
 *
 * @author admin
 */
class SearchBaseType {
    
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder -> add('marque', 'entity', array(
            'class' => 'Lambdabundle:Item', 'property' => 'nomitem', 'empty_value' => 'Tout', 'required' => false))
        ;
    }      
            
            
    public function getName()

{

    return 'lambda_lambdabundle_produitpropriete';

}
}
