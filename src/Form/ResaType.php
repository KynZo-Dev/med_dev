<?php

namespace App\Form;

use App\Entity\Resa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ResaAt')
            ->add('ResaMaxAt')
            ->add('ResaLongAt')
            ->add('ResaLongMaxAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Resa::class,
        ]);
    }
}
