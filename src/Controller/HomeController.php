<?php

namespace App\Controller;

use App\Entity\Measurement;
use App\Form\MeasurementType;
use App\Repository\FabricRepository;
use App\Repository\PatternRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(FabricRepository $fabricRepository, PatternRepository $patternRepository, Request $request): Response
    {
        $fabrics = $fabricRepository->findAll();
        $patterns = $patternRepository->findAll();
        $measurement = new Measurement();

        $form = $this->createForm(MeasurementType::class, $measurement);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$measurement` variable has also been updated
            $measurement = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($measurement);
            $entityManager->flush();
            $this->addFlash('success', 'Vos mesures ont bien été enregistrées.');

            return $this->redirectToRoute('home');
        }

        return $this->render('home/index.html.twig', [
            'fabrics' => $fabrics,
            'patterns' => $patterns,
            'form' => $form->createView(),
        ]);
    }
}
