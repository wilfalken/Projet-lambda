<?php

namespace Lambda\LambdaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Lambda\LambdaBundle\Repository\CategorieRepository;
use Lambda\LambdaBundle\Form\EventListener\AddFieldsProprietes;

class ItemType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        $builder->add('nomitem')
                ->add('description')
                ->add('photoitem')
                ->add('isvalide')
//                ->add('nomprop', 'Lienpropriete', array(
//                    'mapped' => false,
//                    'data_class' => 'Lambda\LambdaBundle\Entity\Lienpropriete'
//                ))
                //->add('idcategorie', CategoriebaseType::class, array(
                    
                        ->add('idCategorie', EntityType::class, array(
                            'class' => 'LambdaBundle:Categorie',
                            'choice_label' => 'nomcategorie',
                            'placeholder' => 'Choisissez une catégorie',
                            'label' => 'Categories :',
                            'mapped'=>true,
                            'query_builder' => function(CategorieRepository $repository) {
                                return $repository->createQueryBuilder('c')->orderBy('c.nomcategorie', 'ASC');
                                }))
                         //->addEventSubscriber(new AddFieldsProprietes())
                           ;    
                          
                      
                        //'choices' => $categories= getCategories()->getNomcategorie(),


    
               
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
