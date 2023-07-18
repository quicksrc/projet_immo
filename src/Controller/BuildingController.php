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
        return $this->render('home/index.html.twig');
    }

    #[Route('/buildings', name: 'immeubles')]
    public function immeubles(ImmeubleRepository $immeubleRepository): Response
    {
        $immeubles = $immeubleRepository->findBy(array(), null, 100, null);

        return $this->render('immeubles/buildings.html.twig', [
            'immeubles' => $immeubles
        ]);
    }

    // #[Route('/buildings/search', name: 'immeubles_recherche')]
    // public function searchBuilding(ImmeubleRepository $immeubleRepository, Request $request): Response
    // {
    //     $recherche = new Recherche();
    //     $form = $this->createForm(SearchType::class, $recherche);
    //     $form->handleRequest($request);

    //     $immeubles = [];

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $description = $recherche->getDescription();
    //         $referenceProprio = $recherche->getReferenceProprio();
    //         $vendu = $recherche->isVendu();
    //         if ($description != "" && $referenceProprio != "" && $vendu != "") {
    //             $immeubles = $immeubleRepository->findBy(['Description' => $description, 'ReferenceProprio' => $referenceProprio, 'Vendu' => $vendu]);
    //         } elseif ($description != "" && $referenceProprio != "") {
    //             $immeubles = $immeubleRepository->findBy(['Description' => $description, 'ReferenceProprio' => $referenceProprio]);
    //         } elseif ($description != "" && $vendu != "") {
    //             $immeubles = $immeubleRepository->findBy(['Description' => $description, 'Vendu' => $vendu]);
    //         } elseif ($referenceProprio != "" && $vendu != "") {
    //             $immeubles = $immeubleRepository->findBy(['ReferenceProprio' => $referenceProprio, 'Vendu' => $vendu]);
    //         } elseif ($description != "") {
    //             $immeubles = $immeubleRepository->findBy(['Description' => $description]);
    //         } elseif ($referenceProprio != "") {
    //             $immeubles = $immeubleRepository->findBy(['ReferenceProprio' => $referenceProprio]);
    //         } elseif ($vendu != "") {
    //             $immeubles = $immeubleRepository->findBy(['Vendu' => $vendu]);
    //         } else {
    //             $immeubles = $immeubleRepository->findAll();
    //         }
    //     }
    //     return $this->render('immeubles/search.html.twig', [
    //         'immeubles' => $immeubles,
    //         'form' => $form->createView(),
    //     ]);
    // }

    #[Route('/buildings/{id}', name: 'immeubles_detail')]
    public function detail(Immeuble $immeuble): Response
    {
        return $this->render('immeubles/detail.html.twig', [
            'immeuble' => $immeuble
        ]);
    }
}
