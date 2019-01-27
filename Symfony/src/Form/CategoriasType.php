<?php

namespace App\Form;

use App\Entity\Categorias;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoriasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('pathimagen')
        ;

        $formulario=$this->createFormBuilder($categoria);
        $formulario->handleRequest($request);
            
        /* Aqui se hace lo que tenemos que hacer en el formulario*/
        if($formulario->isSubmitted()){
            $categoria = $formulario->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoria);
            $entityManager->flush();  
        }
        return $this->render("crud_producto/nuevo.html.twig",
            ["categoria" => $categoria]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Categorias::class,
        ]);
    }
}
