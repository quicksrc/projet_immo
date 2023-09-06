<?php

namespace App\Controller;

use App\Entity\Enquete;
use App\Form\EnqueteType;
use App\Repository\EnqueteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/enquete')]
class EnqueteController extends AbstractController
{
    #[Route('/', name: 'enquetes', methods: ['GET'])]
    public function index(EnqueteRepository $enqueteRepository): Response
    {
        return $this->render('enquete/index.html.twig', [
            'enquetes' => $enqueteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'enquete_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $enquete = new Enquete();
        $form = $this->createForm(EnqueteType::class, $enquete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($enquete);
            $entityManager->flush();

            // return $this->redirectToRoute('', [], Response::HTTP_SEE_OTHER);

            echo '<script>history.go(-2);</script>';
            echo '<script>location.reload();</script>';
        }

        return $this->render('enquete/new.html.twig', [
            'enquete' => $enquete,
            'form' => $form,
        ]);
    }

    #[Route('/{IDEnquete}', name: 'enquete_show', methods: ['GET'])]
    public function show(Enquete $enquete): Response
    {
        return $this->render('enquete/show.html.twig', [
            'enquete' => $enquete,
        ]);
    }

    #[Route('/{IDEnquete}/edit', name: 'enquete_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Enquete $enquete, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EnqueteType::class, $enquete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('enquetes', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('enquete/edit.html.twig', [
            'enquete' => $enquete,
            'form' => $form,
        ]);
    }

    #[Route('/{IDEnquete}', name: 'enquete_delete', methods: ['POST'])]
    public function delete(Request $request, Enquete $enquete, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $enquete->getIDEnquete(), $request->request->get('_token'))) {
            $entityManager->remove($enquete);
            $entityManager->flush();
        }

        return $this->redirectToRoute('enquetes', [], Response::HTTP_SEE_OTHER);
    }
}
