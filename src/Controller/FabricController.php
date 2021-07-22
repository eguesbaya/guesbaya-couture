<?php

namespace App\Controller;

use App\Entity\Fabric;
use App\Form\FabricType;
use App\Repository\FabricRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fabric")
 */
class FabricController extends AbstractController
{
    /**
     * @Route("/", name="fabric_index", methods={"GET"})
     */
    public function index(FabricRepository $fabricRepository): Response
    {
        return $this->render('admin/fabric/index.html.twig', [
            'fabrics' => $fabricRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fabric_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fabric = new Fabric();
        $form = $this->createForm(FabricType::class, $fabric);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fabric);
            $entityManager->flush();

            return $this->redirectToRoute('fabric_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/fabric/new.html.twig', [
            'fabric' => $fabric,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="fabric_show", methods={"GET"})
     */
    public function show(Fabric $fabric): Response
    {
        return $this->render('admin/fabric/show.html.twig', [
            'fabric' => $fabric,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fabric_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fabric $fabric): Response
    {
        $form = $this->createForm(FabricType::class, $fabric);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fabric_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/fabric/edit.html.twig', [
            'fabric' => $fabric,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="fabric_delete", methods={"POST"})
     */
    public function delete(Request $request, Fabric $fabric): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fabric->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fabric);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fabric_index', [], Response::HTTP_SEE_OTHER);
    }
}
