<?php

namespace App\Controller;

use App\Entity\TypeVoie;
use App\Form\TypeVoieType;
use App\Repository\TypeVoieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/type/voie')]
class TypeVoieController extends AbstractController
{
    #[Route('/', name: 'types_voie', methods: ['GET'])]
    public function index(TypeVoieRepository $typeVoieRepository): Response
    {
        return $this->render('type_voie/index.html.twig', [
            'type_voies' => $typeVoieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'type_voie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typeVoie = new TypeVoie();
        $form = $this->createForm(TypeVoieType::class, $typeVoie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typeVoie);
            $entityManager->flush();

            return $this->redirectToRoute('types_voie', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_voie/new.html.twig', [
            'type_voie' => $typeVoie,
            'form' => $form,
        ]);
    }

    #[Route('/{IDTypeVoie}', name: 'type_voie_show', methods: ['GET'])]
    public function show(TypeVoie $typeVoie): Response
    {
        return $this->render('type_voie/show.html.twig', [
            'type_voie' => $typeVoie,
        ]);
    }

    #[Route('/{IDTypeVoie}/edit', name: 'type_voie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeVoie $typeVoie, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypeVoieType::class, $typeVoie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('types_voie', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_voie/edit.html.twig', [
            'type_voie' => $typeVoie,
            'form' => $form,
        ]);
    }

    #[Route('/{IDTypeVoie}', name: 'type_voie_delete', methods: ['POST'])]
    public function delete(Request $request, TypeVoie $typeVoie, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $typeVoie->getIDTypeVoie(), $request->request->get('_token'))) {
            $entityManager->remove($typeVoie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('types_voie', [], Response::HTTP_SEE_OTHER);
    }
}
