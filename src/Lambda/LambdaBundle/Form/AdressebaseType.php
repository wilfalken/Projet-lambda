<?php

namespace Lambda\LambdaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AdressebaseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numrue',IntegerType::class, array('label' => 'Numéro de rue :'))
                ->add('textadresse',TextType::class, array('label' => 'Rue :'))
                ->add('complement',TextType::class, array('label' => 'Complément d\'adresse :', 'required' => false, 'empty_data' => 0))
                ->add('cp',IntegerType::class, array('label' => 'Code postal :'))
                ->add('ville',TextType::class, array('label' => 'Ville :'))
                ->add('pays',CountryType::class, array('label' => 'Pays :', 'placeholder' => 'Choisissez un pays'))
                ->add('principale', CheckboxType::class, array(
                    'label' => 'Ce sera mon adresse principale ...',
                    'data' => true,
                    'required' => false
                ))
                //->add('iduser')
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lambda\LambdaBundle\Entity\Adresse',

        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lambda_lambdabundle_adresse';
    }


}
