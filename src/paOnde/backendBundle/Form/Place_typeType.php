<?php

namespace paOnde\backendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Place_typeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('pltyName', TextType::class, array(
            'label' => 'Tipo de Categoría',
            'attr' =>  array(
                'class' => 'form-control'
            )
        ))->add('pltyOrdering', NumberType::class, array(
            'label' => 'Ordenamiento',
            'attr' =>  array(
                'class' => 'form-control'
            )
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'paOnde\backendBundle\Entity\Place_type'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'paonde_backendbundle_place_type';
    }


}
