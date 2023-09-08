<?php

namespace App\Controller;

use App\Entity\Civilite;
use App\Form\CiviliteType;
use App\Repository\CiviliteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/civilite')]
class CiviliteController extends AbstractController
{
    #[Route('/', name: 'civilites', methods: ['GET'])]
    public function index(CiviliteRepository $civiliteRepository): Response
    {
        return $this->render('civilite/index.html.twig', [
            'civilites' => $civiliteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'civilite_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $civilite = new Civilite();
        $form = $this->createForm(CiviliteType::class, $civilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($civilite);
            $entityManager->flush();

            return $this->redirectToRoute('civilites', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('civilite/new.html.twig', [
            'civilite' => $civilite,
            'form' => $form,
        ]);
    }

    #[Route('/{IDCivilite}', name: 'civilite_show', methods: ['GET'])]
    public function show(Civilite $civilite): Response
    {
        return $this->render('civilite/show.html.twig', [
            'civilite' => $civilite,
        ]);
    }

    #[Route('/{IDCivilite}/edit', name: 'civilite_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Civilite $civilite, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CiviliteType::class, $civilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('civilites', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('civilite/edit.html.twig', [
            'civilite' => $civilite,
            'form' => $form,
        ]);
    }

    #[Route('/{IDCivilite}', name: 'civilite_delete', methods: ['POST'])]
    public function delete(Request $request, Civilite $civilite, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $civilite->getIDCivilite(), $request->request->get('_token'))) {
            $entityManager->remove($civilite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('civilites', [], Response::HTTP_SEE_OTHER);
    }
}
