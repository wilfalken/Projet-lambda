<?php

namespace Lambda\LambdaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Lambda\LambdaBundle\Entity\Categorie;
use \Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Lambda\LambdaBundle\Repository\CategorieRepository;

class ItemType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomitem')
                ->add('description')
                ->add('idCategorie', EntityType::class, array(
                    'class' => 'LambdaBundle:Categorie',
                            'choice_label' => 'nomcategorie',
                            'placeholder' => 'Choisissez une catégorie',
                            'label' => 'Categories :',
                            'mapped'=>false,
                            'query_builder' => function(CategorieRepository $repository) {
                                return $repository->listeCategoriesalpha();
                                }))
                   // 'choice_label' => 'getNomcategorie'
                    
                
                    
      
                ->add('idpropriete', EntityType::class, array(
                    'class' => 'LambdaBundle:Lienpropriete',
                    'choice_label' => 'nomprop',
                    'mapped' => false
                    
                    
                ))
                ->add('photoitem')
                ->add('isvalide')        ;
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
