<?php

namespace Lambda\LambdaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Lambda\LambdaBundle\Repository\CategorieRepository;

class CategoriebaseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('nomcategorie', EntityType::class, array(
                    'class' => 'LambdaBundle:Categorie',
                    'query_builder' => function(CategorieRepository $repo) {
                                            return $repo->listeCategoriesalpha();
                                            },
                    //'choice_label' => 'Categories :',
                ))        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lambda\LambdaBundle\Repository\CategorieRepository'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lambda_lambdabundle_categorie';
    }


}
