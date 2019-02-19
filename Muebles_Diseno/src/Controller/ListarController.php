<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Productos;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\Paginator;
use App\Entity\Ofertas;

class ListarController extends AbstractController
{
    /**
     * @Route("/listar2", name="listar2")
     */
    
    public function index()
    {
        return $this->render('listar/index.html.twig', [
            'controller_name' => 'ListarController',
        ]);
    }

    /**
     * @Route("/listar/{id}", name="listar")
     */
    public function listar(Request $request, PaginatorInterface $paginator, $id){

        $repository = $this->getDoctrine()->getRepository(Productos::class);
        $query=$repository->listar($id);
        $productos = $paginator->paginate($query,$request->query->getInt('page',1),10);

        return $this->render('listar/index.html.twig', [
            'productos' => $productos
        ]);
    }

    /**
     * @Route("/listar/descripcion/{id}", name="descripcion")
     */
     public function descripcion(Request $request, PaginatorInterface $paginator, $id){

        $repository = $this->getDoctrine()->getRepository(Productos::class);
        $query=$repository->listarDescripcion($id);
        $productos = $paginator->paginate($query,$request->query->getInt('page',1),10);

        $repositoryOfertas = $this->getDoctrine()->getRepository(Ofertas::class);
        $ofertas = $repositoryOfertas->saberDescuentoOferta($id);
        return $this->render('listar/descripcion.html.twig', [
            'productos' => $productos,
            'ofertas' => $ofertas
        ]);
    }

    /**
     * @Route("/listar2/buscador" , methods={"GET"}, name="buscar")
    */
    public function buscar(Request $request, PaginatorInterface $paginator){
        $buscarProducto = $_GET["buscador"];

        $repository = $this->getDoctrine()->getRepository(Productos::class);
        $query = $repository->buscadorProductoRepository($buscarProducto);
        $productos = $paginator->paginate($query,$request->query->getInt('page',1),10);

        return $this->render('listar/buscador.html.twig',[
            'productos' => $productos
        ]);
    }

    /**
     * @Route("/index", name="index")
     */
    public function productosOferta(Request $request, PaginatorInterface $paginator){

        $repository = $this->getDoctrine()->getRepository(Ofertas::class);
        $query = $repository->listarofertas();
        $productos = $paginator->paginate($query,$request->query->getInt('page',1),10);

        return $this->render('html/section.html.twig',[
            'productos' => $productos
        ]);
    }

    /**
     * @Route("/index", name="index")
     */
    public function DetallesProductosOferta(Request $request, PaginatorInterface $paginator){

        $repository = $this->getDoctrine()->getRepository(Ofertas::class);
        $query = $repository->listar();
        $productos = $paginator->paginate($query,$request->query->getInt('page',1),10);

        return $this->render('index/index.html.twig',[
            'productos' => $productos
        ]);
    }
}
