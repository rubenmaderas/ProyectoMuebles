<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use \App\Entity\Categorias;

class NavegacionController extends AbstractController
{
    public function listarcategorias(){
        $categoria = $this->getDoctrine()->getRepository(Categorias::class)->findAll(); /*Para acceder a doctrine */
        return $this->render(
            'navegacion/index.html.twig',
            ['categorias' => $categoria]
        );
    }
}
