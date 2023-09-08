<?php

namespace App\Controller;

use App\Entity\Fonction;
use App\Form\FonctionType;
use App\Repository\FonctionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/fonction')]
class FonctionController extends AbstractController
{
    #[Route('/', name: 'fonctions', methods: ['GET'])]
    public function index(FonctionRepository $fonctionRepository): Response
    {
        return $this->render('fonction/index.html.twig', [
            'fonctions' => $fonctionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'fonction_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fonction = new Fonction();
        $form = $this->createForm(FonctionType::class, $fonction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fonction);
            $entityManager->flush();

            return $this->redirectToRoute('fonctions', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fonction/new.html.twig', [
            'fonction' => $fonction,
            'form' => $form,
        ]);
    }

    #[Route('/{IDFonction}', name: 'fonction_show', methods: ['GET'])]
    public function show(Fonction $fonction): Response
    {
        return $this->render('fonction/show.html.twig', [
            'fonction' => $fonction,
        ]);
    }

    #[Route('/{IDFonction}/edit', name: 'fonction_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fonction $fonction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FonctionType::class, $fonction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('fonctions', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fonction/edit.html.twig', [
            'fonction' => $fonction,
            'form' => $form,
        ]);
    }

    #[Route('/{IDFonction}', name: 'fonction_delete', methods: ['POST'])]
    public function delete(Request $request, Fonction $fonction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $fonction->getIDFonction(), $request->request->get('_token'))) {
            $entityManager->remove($fonction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fonctions', [], Response::HTTP_SEE_OTHER);
    }
}
