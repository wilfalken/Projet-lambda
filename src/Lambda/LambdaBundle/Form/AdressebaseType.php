<?php

namespace Lambda\LambdaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AdresseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numrue',TextType::class, array('label' => 'Numéro de rue :'))
                ->add('textadresse',TextType::class, array('label' => 'Rue :'))
                ->add('complement',TextType::class, array('label' => 'Complément d\'adresse :'))
                ->add('cp',TextType::class, array('label' => 'Code postal :'))
                ->add('ville',TextType::class, array('label' => 'Ville :'))
                ->add('pays',CountryType::class, array('label' => 'Pays :'))
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
