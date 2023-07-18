<?php

namespace App\Controller;

use App\Entity\Societe;
use App\Form\SocieteType;
use App\Repository\SocieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/societe')]
class SocieteController extends AbstractController
{
    #[Route('/', name: 'societes', methods: ['GET'])]
    public function index(SocieteRepository $societeRepository): Response
    {
        return $this->render('societe/index.html.twig', [
            'societes' => $societeRepository->findBy(array(), null, 100, null),
        ]);
    }

    #[Route('/new', name: 'societe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SocieteRepository $societeRepository): Response
    {
        $societe = new Societe();
        $form = $this->createForm(SocieteType::class, $societe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $societeRepository->save($societe, true);

            return $this->redirectToRoute('societes', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('societe/new.html.twig', [
            'societe' => $societe,
            'form' => $form,
        ]);
    }

    #[Route('/{IDSociete}', name: 'societe_show', methods: ['GET'])]
    public function show(Societe $societe): Response
    {
        return $this->render('societe/show.html.twig', [
            'societe' => $societe,
        ]);
    }

    #[Route('/{IDSociete}/edit', name: 'societe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Societe $societe, SocieteRepository $societeRepository): Response
    {
        $form = $this->createForm(SocieteType::class, $societe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $societeRepository->save($societe, true);

            return $this->redirectToRoute('societes', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('societe/edit.html.twig', [
            'societe' => $societe,
            'form' => $form,
        ]);
    }

    #[Route('/{IDSociete}', name: 'societe_delete', methods: ['POST'])]
    public function delete(Request $request, Societe $societe, SocieteRepository $societeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $societe->getIDSociete(), $request->request->get('_token'))) {
            $societeRepository->remove($societe, true);
        }

        return $this->redirectToRoute('societes', [], Response::HTTP_SEE_OTHER);
    }
}
