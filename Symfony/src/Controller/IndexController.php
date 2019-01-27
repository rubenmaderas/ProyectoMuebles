<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/muebles", name="muebles")
     */
    public function index()
    {
        return $this->render('Proyecto/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
