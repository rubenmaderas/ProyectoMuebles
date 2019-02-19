<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Categorias;
use App\Entity\Productos;

class CarritoController extends AbstractController
{
    /**
     * @Route("/carrito/index/{id}", name="producto_a_carrito")
     */
    public function annadirCarrito(Productos $producto)
    {
        $session = new Session();

        $controlId = uniqid();
        if($session->has('carrito')){
            $productos = $session->get('carrito');
            $productos[$producto->getId().$controlId] = $producto;
            $session->replace(['carrito'=>$productos]);
        }
        else{
            $session->set('carrito',[$producto->getId()=>$producto]);
        }
        return new JsonResponse(['cuantos'=>count($session->get('carrito'))]);
    }

    /**
     * @Route("/carrito/vercarrito", name="ver_carrito")
     */
    public function listarCarrito(){
        $session = new Session();

        $producto = $session->get("carrito");
        
        return $this->render('carrito/vercarrito.html.twig', [
            'productos' => $producto,
            
        ]);
    }

    /**
     * @Route("/carrito/borrar/{id}", name="borrar_producto_carrito")
     */
    public function borrarProductoCarrito($id){
        $session = new Session();

        $producto = $session->get("carrito");
        
        unset($producto[$id]);
        $session->replace(['carrito'=>$producto]);

        return $this->redirectToRoute('ver_carrito');
    }
}
