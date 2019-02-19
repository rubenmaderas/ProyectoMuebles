<?php

namespace App\Controller;

use App\Entity\Productos;
use App\Form\ProductosType;
use App\Repository\ProductosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;

use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/productos")
 */
class ProductosController extends AbstractController
{
    /**
     * @Route("/", name="productos_index", methods={"GET"})
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {        
        $repository = $this->getDoctrine()->getRepository(Productos::class);
        $query = $repository->createQueryBuilder('p')->getQuery();
        $productos = $paginator->paginate($query,$request->query->getInt('page',1),5);
        /*$productos = $this->getDoctrine()
            ->getRepository(productos::class)
            ->findAll();*/

        return $this->render('productos/index.html.twig', [
            'productos' => $productos,
        ]);

    }

    /**
     * @Route("/new", name="productos_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $producto = new Productos();
        $form = $this->createForm(ProductosType::class, $producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form['pathimagen']->getData();
            /*$file = $producto->getPathimagen();*/
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
            //var_dump($fileName);exit;
            try {
                $file->move(
                    $this->getParameter('brochures_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                echo("Error subida imagen");
            }
            /*var_dump("File = " . $file);
            var_dump("FileName = " . $fileName);*/
            
            $producto->setPathimagen($fileName);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($producto);
            $entityManager->flush();

            return $this->redirect($this->generateUrl('productos_index'));
        }

        return $this->render('productos/new.html.twig', [
            'producto' => $producto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="productos_show", methods={"GET"})
     */
    public function show(Productos $producto): Response
    {
        return $this->render('productos/show.html.twig', [
            'producto' => $producto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="productos_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Productos $producto): Response
    {
        $form = $this->createForm(ProductosType::class, $producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form['pathimagen']->getData();
            /*$file = $producto->getPathimagen();*/
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
            //var_dump($fileName);exit;
            try {
                $file->move(
                    $this->getParameter('brochures_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                echo("Error subida imagen");
            }
            /*var_dump("File = " . $file);
            var_dump("FileName = " . $fileName);*/
            
            $producto->setPathimagen($fileName);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($producto);
            $entityManager->flush();

            return $this->redirect($this->generateUrl('productos_index'));
        }

        return $this->render('productos/edit.html.twig', [
            'producto' => $producto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="productos_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Productos $producto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$producto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($producto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('productos_index');
    }

    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
}
