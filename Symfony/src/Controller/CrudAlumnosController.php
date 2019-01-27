<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use \App\Entity\Alumnos;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use \App\Form\AlumnoType;
use \App\Form\CategoriasType;
use \App\Form\MaterialesType;
use \App\Entity\Categorias;
use \App\Entity\Materiales;



class CrudAlumnosController extends AbstractController
{
    /**
     * @Route("/crud/alumnos", name="crud_alumnos")
     */
    public function index()
    {
        $yo = new Alumnos();
        $yo->setDni("1234a");
        $yo->setApellidos("maderas");

        $tu = new Alumnos();
        $tu->setDni("6789b");
        $tu->setApellidos("prieto");

        $el = new Alumnos();
        $el->setDni("2356");
        $el->setApellidos("lolo");

        $objetosalumnos=[$yo,$tu,];
        return $this->render('crud_alumnos/index.html.twig', [
            'alumnos' => $objetosalumnos,
        ]);
    }

    /*Para añadir funcionalidad a un boton hay que hacer un metodo */

    /**
     * @Route("crud/alumnos/nuevo",name="nuevoalumno")
     */

    public function nuevo_alumno(Request $request){
        $nuevo = new Alumnos();
        $nuevo->setDni("12356A");
        $nuevo->setApellidos("Sergio Caminos Tristes");

        $categoria = new Categorias();

        $materiales = new Materiales();


        /*Crear un formulario a mano*/
        
            /*Primera manera de crear formulario */
            /*$formulario = $this->createFormBuilder($nuevo)*/
            /*->add("dni",TextType::class,["attr"=>["placeholder"=>"Introduce DNI"]])
            ->add("apellidos",TextType::class,["attr"=>["placeholder"=>"Introduce Apellidos"]])
            ->add("grabar",SubmitType::class)
            ->getForm();*/

            /*Segunda manera de crear formulario */
            $formulario=$this->createForm(CategoriasType::class,$categoria);
            $formulario->handleRequest($request);
            /* Aqui se hace lo que tenemos que hacer en el formulario*/
            if($formulario->isSubmitted()){
                $categoria = $formulario->getData();

                return $this->render("crud_alumnos/detallealumno.html.twig",
                ["alumno" => $categoria]);  
            }

            $formulario=$this->createForm(MaterialesType::class,$materiales);
            $formulario->handleRequest($request);
            /* Aqui se hace lo que tenemos que hacer en el formulario*/
            if($formulario->isSubmitted()){
                $materiales = $formulario->getData();

                return $this->render("crud_alumnos/detallealumno.html.twig",
                ["alumno" => $materiales]);  
            }

        return $this->render("crud_alumnos/nuevoalumno.html.twig",
        ["formulario" => $formulario->createView()]);
    }
}
