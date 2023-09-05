<?php

namespace App\Controller;

use App\Entity\ImmeubleContact;
use App\Form\ImmeubleContactType;
use App\Repository\ImmeubleContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/immeubleContact')]
class ImmeubleContactController extends AbstractController
{
    #[Route('/', name: 'immeubles_contacts', methods: ['GET'])]
    public function index(ImmeubleContactRepository $immeubleContactRepository): Response
    {
        return $this->render('immeuble_contact/index.html.twig', [
            'immeubles_contacts' => $immeubleContactRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'immeuble_contact_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ImmeubleContactRepository $immeubleContactRepository, EntityManagerInterface $entityManager): Response
    {
        $immeubleContact = new ImmeubleContact();
        $form = $this->createForm(ImmeubleContactType::class, $immeubleContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $immeubleContactRepository->save($immeubleContact, true);
            return $this->redirectToRoute('immeubles', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('immeuble_contact/new.html.twig', [
            'immeuble_contact' => $immeubleContact,
            'form' => $form,
        ]);
    }

    #[Route('/{IDImmeubleContact}', name: 'immeuble_contact_show', methods: ['GET'])]
    public function show(ImmeubleContact $immeubleContact): Response
    {
        return $this->render('immeuble_contact/show.html.twig', [
            'immeuble_contact' => $immeubleContact,
        ]);
    }

    #[Route('/{IDImmeubleContact}/edit', name: 'immeuble_contact_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ImmeubleContact $immeubleContact, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ImmeubleContactType::class, $immeubleContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('immeubles_contacts', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('immeuble_contact/edit.html.twig', [
            'immeuble_contact' => $immeubleContact,
            'form' => $form,
        ]);
    }

    #[Route('/{IDImmeubleContact}', name: 'immeuble_contact_delete', methods: ['POST'])]
    public function delete(Request $request, ImmeubleContact $immeubleContact, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $immeubleContact->getIDImmeubleContact(), $request->request->get('_token'))) {
            $entityManager->remove($immeubleContact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('immeubles_contacts', [], Response::HTTP_SEE_OTHER);
    }
}
