<?php

namespace App\Controller;

use App\Entity\Immeuble;
use App\Entity\Recherche;
use App\Form\SearchType;
use App\Repository\ImmeubleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuildingController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ImmeubleRepository $immeubleRepository, Request $request): Response
    {
        $recherche = new Recherche();
        $form = $this->createForm(SearchType::class, $recherche);
        $form->handleRequest($request);

        $immeubles = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $description = $recherche->getDescription();
            if ($description != "") {
                $immeubles = $immeubleRepository->findBy(['Description' => $description]);
            } else {
                $immeubles = $immeubleRepository->findAll();
            }
            // dd($immeubles);
        }
        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
            'immeubles' => $immeubles
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
