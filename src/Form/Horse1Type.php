<?php

namespace App\Form;

use App\Entity\Horse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Horse1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('race')
            ->add('description')
            ->add('speed')
            ->add('stamina')
            ->add('jump_height')
            ->add('strength')
            ->add('sociability')
            ->add('intelligence')
            ->add('temperament')
            ->add('experience')
            ->add('level')
            ->add('general_stat')
            ->add('id_exhaust_state')
            ->add('id_health_state')
            ->add('id_stress_state')
            ->add('id_moral_state')
            ->add('id_hunger_state')
            ->add('id_clean_state')
            ->add('id_user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Horse::class,
        ]);
    }
}
