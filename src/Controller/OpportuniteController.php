<?php

namespace App\Controller;

use App\Entity\Opportunite;
use App\Form\OpportuniteType;
use App\Repository\OpportuniteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/opportunites')]
class OpportuniteController extends AbstractController
{
    #[Route('/', name: 'opportunites', methods: ['GET'])]
    public function index(OpportuniteRepository $opportuniteRepository): Response
    {
        return $this->render('opportunite/index.html.twig', [
            'opportunites' => $opportuniteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'opportunite_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OpportuniteRepository $opportuniteRepository): Response
    {
        $idm = $request->query->get("immeuble");
        $opportunite = new Opportunite();
        $form = $this->createForm(OpportuniteType::class, $opportunite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $opportuniteRepository->save($opportunite, true);

            return $this->redirect('/immeubles' . '/' . $idm, Response::HTTP_SEE_OTHER);
        }

        return $this->render('opportunite/new.html.twig', [
            'opportunite' => $opportunite,
            'form' => $form,
        ]);
    }

    #[Route('/{IDOpportunite}', name: 'opportunite_show', methods: ['GET'])]
    public function show(Opportunite $opportunite): Response
    {
        return $this->render('opportunite/show.html.twig', [
            'opportunite' => $opportunite,
        ]);
    }

    #[Route('/{IDOpportunite}/edit', name: 'opportunite_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Opportunite $opportunite, OpportuniteRepository $opportuniteRepository): Response
    {
        $form = $this->createForm(OpportuniteType::class, $opportunite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $opportuniteRepository->save($opportunite, true);

            return $this->redirectToRoute('immeubles', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('opportunite/edit.html.twig', [
            'opportunite' => $opportunite,
            'form' => $form,
        ]);
    }

    #[Route('/{IDOpportunite}', name: 'opportunite_delete', methods: ['POST'])]
    public function delete(Request $request, Opportunite $opportunite, OpportuniteRepository $opportuniteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $opportunite->getIDOpportunite(), $request->request->get('_token'))) {
            $opportuniteRepository->remove($opportunite, true);
        }

        return $this->redirectToRoute('immeubles', [], Response::HTTP_SEE_OTHER);
    }
}
