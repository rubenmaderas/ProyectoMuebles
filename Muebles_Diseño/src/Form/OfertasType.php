<?php

namespace App\Form;

use App\Entity\Ofertas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OfertasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descuento')
            ->add('finiciooferta')
            ->add('ffinoferta')
            ->add('productos')
            ->add('Guardar',SubmitType::class,[
                'attr' => ['class' => 'guardar']]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ofertas::class,
        ]);
    }
}
