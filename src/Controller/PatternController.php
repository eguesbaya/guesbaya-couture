<?php

namespace App\Controller;

use App\Entity\Pattern;
use App\Form\PatternType;
use App\Repository\PatternRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/pattern")
 * @IsGranted("ROLE_ADMIN")
 */
class PatternController extends AbstractController
{
    /**
     * @Route("/", name="pattern_index", methods={"GET"})
     */
    public function index(PatternRepository $patternRepository): Response
    {
        return $this->render('admin/pattern/index.html.twig', [
            'patterns' => $patternRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pattern_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pattern = new Pattern();
        $form = $this->createForm(PatternType::class, $pattern);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pattern);
            $entityManager->flush();

            return $this->redirectToRoute('pattern_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/pattern/new.html.twig', [
            'pattern' => $pattern,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="pattern_show", methods={"GET"})
     */
    public function show(Pattern $pattern): Response
    {
        return $this->render('admin/pattern/show.html.twig', [
            'pattern' => $pattern,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pattern_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pattern $pattern): Response
    {
        $form = $this->createForm(PatternType::class, $pattern);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pattern_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/pattern/edit.html.twig', [
            'pattern' => $pattern,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="pattern_delete", methods={"POST"})
     */
    public function delete(Request $request, Pattern $pattern): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pattern->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pattern);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pattern_index', [], Response::HTTP_SEE_OTHER);
    }
}
