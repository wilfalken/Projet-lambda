<?php

namespace Lambda\LambdaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class ItemType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('nomitem')->add('description')->add('photoitem', FileType::class)->add('isvalide')->add('idcategorie', Null,array(
            
        ));
            
        
                
                
        
        
       // ->add('idpropriete', CollectionType::class, array(
                //    'entry_type' => 'Lienproprietetype::class',
                //    'attr'=> array('class' =>'valeur')
                //))        ;

        $builder->add('nomitem')->add('description')->add('photoitem')->add('isvalide')->add('idcategorie')->add('idpropriete')        ;

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
