<?php

namespace App\Controller;

use App\Entity\Immeuble;
use App\Form\ImmeubleType;
use App\Repository\ContactRepository;
use App\Repository\ImmeubleRepository;
use Doctrine\ORM\EntityManager;
use Normalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/immeubles')]
class ImmeubleController extends AbstractController
{
    #[Route('/', name: 'immeubles', methods: ['GET'])]
    public function index(ImmeubleRepository $immeubleRepository, ContactRepository $contactRepository): Response
    {
        return $this->render('immeuble/index.html.twig', [
            'immeubles' => $immeubleRepository->findBy(array(), null, 100, null),
            'contacts' => $contactRepository->findBy(array(), null, 100, null),
        ]);
    }

    #[Route('/search', name: 'immeuble_search')]
    public function search(ImmeubleRepository $immeubleRepository): Response
    {
        return $this->render(
            'immeuble/search.html.twig',
            [
                'queryRefProprio' => $immeubleRepository->findByAllFields()
            ]
        );
    }

    #[Route('/new', name: 'immeuble_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ImmeubleRepository $immeubleRepository): Response
    {
        $immeuble = new Immeuble();
        $form = $this->createForm(ImmeubleType::class, $immeuble);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $immeubleRepository->save($immeuble, true);

            return $this->redirectToRoute('immeubles', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('immeuble/new.html.twig', [
            'immeuble' => $immeuble,
            'form' => $form,
        ]);
    }

    #[Route('/{IDImmeuble}', name: 'immeuble_show', methods: ['GET'])]
    public function show(Immeuble $immeuble): Response
    {
        return $this->render('immeuble/show.html.twig', [
            'immeuble' => $immeuble,
        ]);
    }

    #[Route('/{IDImmeuble}/edit', name: 'immeuble_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Immeuble $immeuble, ImmeubleRepository $immeubleRepository): Response
    {
        $form = $this->createForm(ImmeubleType::class, $immeuble);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $immeubleRepository->save($immeuble, true);

            return $this->redirectToRoute('immeubles', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('immeuble/edit.html.twig', [
            'immeuble' => $immeuble,
            'form' => $form,
        ]);
    }

    #[Route('/{IDImmeuble}', name: 'immeuble_delete', methods: ['POST'])]
    public function delete(Request $request, Immeuble $immeuble, ImmeubleRepository $immeubleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $immeuble->getIDImmeuble(), $request->request->get('_token'))) {
            $immeubleRepository->remove($immeuble, true);
        }

        return $this->redirectToRoute('immeubles', [], Response::HTTP_SEE_OTHER);
    }
}
