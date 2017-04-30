<?php

namespace Lambda\LambdaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Lambda\LambdaBundle\Form\LienproprieteType;


class ItemEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomitem')->add('description')->add('photoitem')->add('isvalide')->add('idcategorie', null, array(
            'disabled' => true
        ))
                
                
        
        
        ->add('idpropriete', LienproprieteType::class); //, array(
                    //'entry_type' => 'LambdaBundle:Lienpropriete',
                   // 'attr'=> array('class' =>'valeur'
                     //   )
               // )        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lambda\LambdaBundle\Entity\Item'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lambda_lambdabundle_item';
    }


}
