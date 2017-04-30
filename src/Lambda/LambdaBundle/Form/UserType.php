<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lambda\LambdaBundle\Form;

use Lambda\LambdaBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

/**
 * Description of UserType
 *
 * @author admin
 */
class UserType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
               
                ->add('username', TextType::class, array('label' => 'Nom d\'utilisateur :',
                    ))
                //->add('email', EmailType::class, array('label' => 'Email :'))
                ->add('email', RepeatedType::class, array(
                    'type' => EmailType::class,
                    'first_options' => array('label' => 'Votre email :'),
                    'second_options' => array('label' => 'Retapez votre email :'),
                    'label_attr' => array('class' => 'col-2 col-form-label'),
                        ))
                ->add('plainPassword', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'first_options' => array('label' => 'Mot de passe'),
                    'second_options' => array('label' => 'Retapez le mot de passe'),
                    'label_attr' => array('class' => 'col-2 col-form-label'),
                ))
                ->add('telephone', TextType::class, array('label' => 'telephone',
                    'label_attr' => array('class' => 'col-2 col-form-label')
                    ,))
                
                ->add('genre', ChoiceType::class, array(
                    'choices' => array(
                        'Homme' => false,
                        'Femme' => true,
                        
                        ),
                            'required' => true,
                            'empty_data' => '',
                    'label_attr' => array('class' => 'col-2 col-form-label'),
                        ))
                ->add('save', SubmitType::class, array('label' => 'Je m\'enregistre !!!'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}
