<?php

namespace App\Controller;

use App\Entity\Categorias;
use App\Form\CategoriasType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/categorias")
 */
class CategoriasController extends AbstractController
{
    /**
     * @Route("/", name="categorias_index", methods={"GET"})
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {

        $repository = $this->getDoctrine()->getRepository(Categorias::class);
        $query = $repository->createQueryBuilder('p')->getQuery();
        $categorias = $paginator->paginate($query,$request->query->getInt('page',1),6);
       /* $categorias = $this->getDoctrine()
            ->getRepository(Categorias::class)
            ->findAll();*/

        return $this->render('categorias/index.html.twig', [
            'categorias' => $categorias,
        ]);
    }

    /**
     * @Route("/new", name="categorias_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categoria = new Categorias();
        $form = $this->createForm(CategoriasType::class, $categoria);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoria);
            $entityManager->flush();

            return $this->redirectToRoute('categorias_index');
        }

        return $this->render('categorias/new.html.twig', [
            'categoria' => $categoria,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorias_show", methods={"GET"})
     */
    public function show(Categorias $categoria): Response
    {
        return $this->render('categorias/show.html.twig', [
            'categoria' => $categoria,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="categorias_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Categorias $categoria): Response
    {
        $form = $this->createForm(CategoriasType::class, $categoria);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorias_index', [
                'id' => $categoria->getId(),
            ]);
        }

        return $this->render('categorias/edit.html.twig', [
            'categoria' => $categoria,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorias_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Categorias $categoria): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoria->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoria);
            $entityManager->flush();
        }

        return $this->redirectToRoute('categorias_index');
    }
}
