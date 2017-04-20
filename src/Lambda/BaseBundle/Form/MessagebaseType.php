<?php

namespace Lambda\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class MessagebaseType extends AbstractType{
    
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('destinataire', TextType::class, array(
                    'label'  => 'Veuillez entrer le nom du destinataire :',
                    'required' => true))
                ->add('sujet', TextType::class, array(
                    'label' => 'Renseignez le sujet du message :',
                    'required' => true))
                ->add('corps', TextareaType::class, array(
                    'label' => 'Tapez votre message :',
                    'required' => false,
                    'attr' => array('class' => 'mytextarea')))
                
                
                ; 
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lambda\LambdaBundle\Entity\Message',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lambda_basebundle_message';
    }

}
