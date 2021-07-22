<?php

namespace App\Controller;

use App\Repository\FabricRepository;
use App\Repository\PatternRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(FabricRepository $fabricRepository, PatternRepository $patternRepository): Response
    {
        $fabrics = $fabricRepository->findAll();
        $patterns = $patternRepository->findAll();

        return $this->render('home/index.html.twig', [
            'fabrics' => $fabrics,
            'patterns' => $patterns,
        ]);
    }
}
