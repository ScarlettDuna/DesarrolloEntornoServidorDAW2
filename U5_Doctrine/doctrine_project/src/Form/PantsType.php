<?php

namespace App\Form;

use App\Entity\Pants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand')
            ->add('size')
            ->add('color')
            ->add('price')
            ->add('save', SubmitType::class, ['label' => 'Add pants'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pants::class,
        ]);
    }
}
