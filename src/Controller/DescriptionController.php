<?php

namespace App\Controller;

use App\Entity\Description;
use App\Form\DescriptionType;
use App\Repository\DescriptionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/description')]
class DescriptionController extends AbstractController
{
    #[Route('/', name: 'descriptions', methods: ['GET'])]
    public function index(DescriptionRepository $descriptionRepository): Response
    {
        return $this->render('description/index.html.twig', [
            'descriptions' => $descriptionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'description_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $description = new Description();
        $form = $this->createForm(DescriptionType::class, $description);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($description);
            $entityManager->flush();

            // return $this->redirectToRoute('descriptions', [], Response::HTTP_SEE_OTHER);

            echo '<script>history.go(-2);</script>';
        }

        return $this->render('description/new.html.twig', [
            'description' => $description,
            'form' => $form,
        ]);
    }

    #[Route('/{IDDescription}', name: 'description_show', methods: ['GET'])]
    public function show(Description $description): Response
    {
        return $this->render('description/show.html.twig', [
            'description' => $description,
        ]);
    }

    #[Route('/{IDDescription}/edit', name: 'description_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Description $description, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DescriptionType::class, $description);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('descriptions', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('description/edit.html.twig', [
            'description' => $description,
            'form' => $form,
        ]);
    }

    #[Route('/{IDDescription}', name: 'description_delete', methods: ['POST'])]
    public function delete(Request $request, Description $description, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $description->getIDDescription(), $request->request->get('_token'))) {
            $entityManager->remove($description);
            $entityManager->flush();
        }

        return $this->redirectToRoute('descriptions', [], Response::HTTP_SEE_OTHER);
    }
}
