<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use \App\Entity\Productos;
use \App\Entity\Categorias;

class CrudProductoController extends AbstractController
{
    /**
     * @Route("/crud/producto", name="crud_producto")
     */
    public function index()
    {
        /*Sacar listado de productos */
        $categoria = $this->getDoctrine()->getRepository(Productos::class)->findAll(); /*Para acceder a doctrine */
        return $this->render('crud_producto/index.html.twig', [
            'categoria' => $categoria,
        ]);
    }
    /**
     * @Route("/crud/producto/nuevo", name="nuevo") 
     */
    public function nuevo(Request $request){
        $categoria = new Categorias();

        $formulario=$this->createFormBuilder($categoria)
        ->add('nombre')
        ->add('pathimagen')
        ->add("grabar",SubmitType::class)
        ->getForm();

        $formulario->handleRequest($request);
            
        /* Aqui se hace lo que tenemos que hacer en el formulario*/
        if($formulario->isSubmitted()){
            $categoria = $formulario->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoria);
            $entityManager->flush();

            return $this->redirectToRoute("crud_producto");  
        }

        return $this->render("crud_producto/nuevo.html.twig",
        ["formulario" => $formulario->createView()]);

    }

    /**
     * @Route("/crud/producto/borra", name="borra") 
     */
    public function borrar()
    {
        # code...
    }
}
