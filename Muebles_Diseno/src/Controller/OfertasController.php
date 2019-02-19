<?php

namespace App\Controller;

use App\Entity\Ofertas;
use App\Form\OfertasType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/ofertas")
 */
class OfertasController extends AbstractController
{
    /**
     * @Route("/", name="ofertas_index", methods={"GET"})
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $repository = $this->getDoctrine()->getRepository(Ofertas::class);
        $query = $repository->createQueryBuilder('p')->getQuery();
        $ofertas = $paginator->paginate($query,$request->query->getInt('page',1),6);
        /*$ofertas = $this->getDoctrine()
            ->getRepository(Ofertas::class)
            ->findAll();*/

        return $this->render('ofertas/index.html.twig', [
            'ofertas' => $ofertas,
        ]);
    }

    /**
     * @Route("/new", name="ofertas_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $oferta = new Ofertas();
        $form = $this->createForm(OfertasType::class, $oferta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($oferta);
            $entityManager->flush();

            return $this->redirectToRoute('ofertas_index');
        }

        return $this->render('ofertas/new.html.twig', [
            'oferta' => $oferta,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ofertas_show", methods={"GET"})
     */
    public function show(Ofertas $oferta): Response
    {
        return $this->render('ofertas/show.html.twig', [
            'oferta' => $oferta,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ofertas_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ofertas $oferta): Response
    {
        $form = $this->createForm(OfertasType::class, $oferta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ofertas_index', [
                'id' => $oferta->getId(),
            ]);
        }

        return $this->render('ofertas/edit.html.twig', [
            'oferta' => $oferta,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ofertas_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ofertas $oferta): Response
    {
        if ($this->isCsrfTokenValid('delete'.$oferta->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($oferta);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ofertas_index');
    }
}
