<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use \App\Entity\Alumnos;

class PrincipalController extends AbstractController
{
    /**
     * @Route("/principal", name="principal")
     */
    public function index()
    {
        $yo = new Alumnos();
        $yo->setDni("1234a");
        $yo->setApellidos("maderas");

        $tu = new Alumnos();
        $tu->setDni("6789b");
        $tu->setApellidos("prieto");
        
        $objetosalumnos=[$yo,$tu];

        return $this->render('principal/index.html.twig', [
            "alumnos"=>["Juan","Pepe","Manuel"],
            "objetosalumnos"=>$objetosalumnos
        ]);
    }
}
