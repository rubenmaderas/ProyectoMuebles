<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PruebasController extends AbstractController
{
    /**
     * @Route("/pruebas", name="pruebas")
     */
    public function index(){
        return $this->render('pruebas/index.html.twig', [
            'controller_name' => 'PruebasController',
        ]);
    }

    /**
     * @Route("/suma/{sumando1}/{sumando2}",name="suma")
     */
    public function Suma($sumando1,$sumando2){
        $suma = $sumando1+$sumando2;
        return $this->render("pruebas/suma.html.twig",
        ['suma'=>$suma,"sumando1"=>$sumando1,"sumando2"=>$sumando2]);
    }

    /**
     * @Route("/farenheit/{grados}",name="farenheit")
     */
    public function ctof($grados){
        $farenheit = ($grados*9 / 5) + 32;
        return $this->render("temperaturas/ctof.html.twig",
        ['farenheit'=>$farenheit,"grados"=>$grados]);
    }

    /**
     * @Route("/celsius/{grados}",name="celsius")
     */
    public function ftoc($grados){
        $celsius = (($grados - 32)/1.8);
        return $this->render("temperaturas/ftoc.html.twig",
        ['celsius'=>$celsius,"grados"=>$grados]);
    }
}
