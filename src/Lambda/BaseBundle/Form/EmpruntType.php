<?php

namespace Lambda\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EmpruntType extends AbstractType{
    
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->user = $options['user'];
        $this->demandeur = $options['demandeur'];
        $this->exemplaire = $options['exemplaire'];
        $builder->add('idemprunteur', TextType::class, array(
                    'disabled' => true,
                    'label' => 'Emprunteur',
                    'attr' => array(
                        'placeholder' => $this->demandeur->getUsername()
                    )
                ))
                ->add('idproprietaire', TextType::class, array(
                    'disabled' => true,
                    'label' => 'Propriétaire',
                    'attr' => array(
                        'placeholder' => $this->user->getUsername()                  //$this->exemplaire->getUser()->getUsername()
                        )
                 ))
                ->add('duree', ChoiceType::class, array(
                    
                    'label' => 'Choisissez la date de rendu souhaitée',
                    'choices' => array(
                        'Une semaine' => "P7D",
                        'deux semaines' => "P14D",
                        'un mois' => "P1M",
                        'trois mois' => "P3M",
                    )
                ))
                ->add('adresse', EntityType::class, array(
                    'class' => 'LambdaBundle:Adresse',
                    'choices' => $this->user->getAdresses()['ville']
                ))
                ->add('idexemplaire', TextType::class, array(
                    'disabled' => true,
                    'label' => 'Objet :',
                    'attr' => array(
                        'placeholder' => $this->exemplaire->getItem()->getNomitem()
                        )
                ))
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lambda\LambdaBundle\Entity\Emprunt',
            'user' => 1,
            'demandeur' => 1,
            'exemplaire' => 1,
        ));
        $resolver->setRequired('user', 'demandeur', 'exemplaire'); // Requires that currentOrg be set by the caller.
        $resolver->setAllowedTypes('user', 'Lambda\LambdaBundle\Entity\User'); // Validates the type(s) of option(s) passed.
        $resolver->setAllowedTypes('demandeur', 'Lambda\LambdaBundle\Entity\User'); // Validates the type(s) of option(s) passed.
        $resolver->setAllowedTypes('exemplaire', 'Lambda\LambdaBundle\Entity\Exemplaire'); // Validates the type(s) of option(s) passed.
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lambda_basebundle_emprunt';
    }

}
