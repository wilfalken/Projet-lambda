<?php

namespace Lambda\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titreevenement', TextType::class, array(
                    'label' => 'Titre de l\'évènement :',
        ))
                ->add('texteevenement', TextareaType::class, array(
                    'label' => 'Texte de l\'évènement :',
                    'attr' => array('class' => 'mytextarea'),
                    'required' => false,
                ))
                ->add('lienimage', FileType::class,array(
                    'label' => 'Envoyez une image (vous devez obligatoirement ré-uploader l\'image en .jpg) :',
                    
                    
                ))        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lambda\LambdaBundle\Entity\Evenement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lambda_lambdabundle_evenement';
    }


}
