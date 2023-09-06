<?php

namespace App\Controller;

use App\Entity\OrigineContactImmeuble;
use App\Form\OrigineContactImmeubleType;
use App\Repository\OrigineContactImmeubleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/origine/contact/immeuble')]
class OrigineContactImmeubleController extends AbstractController
{
    #[Route('/', name: 'origines_contact_immeuble', methods: ['GET'])]
    public function index(OrigineContactImmeubleRepository $origineContactImmeubleRepository): Response
    {
        return $this->render('origine_contact_immeuble/index.html.twig', [
            'origine_contact_immeubles' => $origineContactImmeubleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'origine_contact_immeuble_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $origineContactImmeuble = new OrigineContactImmeuble();
        $form = $this->createForm(OrigineContactImmeubleType::class, $origineContactImmeuble);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($origineContactImmeuble);
            $entityManager->flush();

            return $this->redirectToRoute('origines_contact_immeuble', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('origine_contact_immeuble/new.html.twig', [
            'origine_contact_immeuble' => $origineContactImmeuble,
            'form' => $form,
        ]);
    }

    #[Route('/{IDOrigineContactImmeuble}', name: 'app_origine_contact_immeuble_show', methods: ['GET'])]
    public function show(OrigineContactImmeuble $origineContactImmeuble): Response
    {
        return $this->render('origine_contact_immeuble/show.html.twig', [
            'origine_contact_immeuble' => $origineContactImmeuble,
        ]);
    }

    #[Route('/{IDOrigineContactImmeuble}/edit', name: 'origine_contact_immeuble_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OrigineContactImmeuble $origineContactImmeuble, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OrigineContactImmeubleType::class, $origineContactImmeuble);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('origines_contact_immeuble', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('origine_contact_immeuble/edit.html.twig', [
            'origine_contact_immeuble' => $origineContactImmeuble,
            'form' => $form,
        ]);
    }

    #[Route('/{IDOrigineContactImmeuble}', name: 'origine_contact_immeuble_delete', methods: ['POST'])]
    public function delete(Request $request, OrigineContactImmeuble $origineContactImmeuble, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $origineContactImmeuble->getIDOrigineContactImmeuble(), $request->request->get('_token'))) {
            $entityManager->remove($origineContactImmeuble);
            $entityManager->flush();
        }

        return $this->redirectToRoute('origines_contact_immeuble', [], Response::HTTP_SEE_OTHER);
    }
}
