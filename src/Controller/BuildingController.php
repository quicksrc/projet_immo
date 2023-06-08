<?php

namespace App\Controller;

use App\Entity\Immeuble;
use App\Repository\ImmeubleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuildingController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'BuildingController',
        ]);
    }

    #[Route('/buildings', name: 'immeubles')]
    public function immeubles(ImmeubleRepository $immeubleRepository): Response
    {
        $immeubles = $immeubleRepository->findAll();

        return $this->render('immeubles/buildings.html.twig', [
            'immeubles' => $immeubles
        ]);
    }

    #[Route('/buildings/{id}', name: 'immeubles_detail')]
    public function detail(Immeuble $immeuble): Response
    {
        return $this->redirectToRoute('immeubles_detail', ['id' => $immeuble->getId()]);
    }
}
