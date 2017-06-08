<?php

namespace Lambda\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ExemplaireType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$builder->add('nomcategorie')->add('iditem')->add('idpropriete')->add('idsouscategorie')        ;
        $builder->add('etat', TextareaType::class, array(
                    'label'  => 'Veuillez stipuler l\'état dans lequel est votre objet :',))
                ->add('photoexemplaire', FileType::class, array(
                    'label' => 'Vous pouvez ajouter une photo de votre objet :',
                    'required' => false,
                    'data_class' => null,)
                ); 
                //->add('idsouscategorie')
                //->add('nomsouscategorie');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lambda\LambdaBundle\Entity\Exemplaire',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lambda_basebundle_exemplaire';
    }


}
