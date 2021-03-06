<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use \App\Entity\Productos;
use \App\Entity\Categorias;
use \App\Entity\Materiales;

class CategoriasController extends AbstractController
{
    /**
     * @Route("/categorias", name="categorias")
     */
    public function index()
    {
        return $this->render('categorias/index.html.twig', [
            'controller_name' => 'CategoriasController',
        ]);
    }

    /**
     * @Route("/categorias/nueva", name="nueva") 
     */
    public function nuevo(Request $request){
        $categoria = new Categorias();

        $formulario=$this->createFormBuilder($categoria)
        ->add('nombre')
        ->add('pathimagen')
        ->add('Guardar',SubmitType::class,[
            'attr' => ['class' => 'guardar']])
        ->getForm();

        $formulario->handleRequest($request);
            
        /* Aqui se hace lo que tenemos que hacer en el formulario*/
        if($formulario->isSubmitted()){
            $categoria = $formulario->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoria);
            $entityManager->flush();

            return $this->redirectToRoute("categorias");  
        }

        return $this->render("categorias/nueva.html.twig",
        ["formulario" => $formulario->createView()]);

    }

    /**
     * @Route("/categorias/borra", name="borra") 
     */
    public function borrar(Categorias $categoria)
    {
        $this->getDoctrine()->getManager()->remove($categoria);
        
    }
}
