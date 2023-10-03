<?php

namespace App\Controller;

use App\Entity\ImmeubleContact;
use App\Entity\RechercheImmeuble;
use App\Form\ImmeubleContactType;
use App\Repository\ContactRepository;
use App\Repository\ImmeubleContactRepository;
use App\Repository\ImmeubleRepository;
use App\Repository\QualiteProprietaireRepository;
use App\Repository\QualiteRepository;
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
    public function new(Request $request, ImmeubleContactRepository $immeubleContactRepository, ImmeubleRepository $immeubleRepository, EntityManagerInterface $entityManager, ContactRepository $contactRepository, QualiteRepository $qualiteRepository, QualiteProprietaireRepository $qualiteProprietaireRepository): Response
    {
        $immeubleContact = new ImmeubleContact();
        $form = $this->createForm(ImmeubleContactType::class, $immeubleContact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $ar = $immeubleRepository->findOneBy(['IDImmeuble' => $request->query->get("immeuble")]);

            $imcon = $form->getData();
            $immeubleContactt = $form->get('IDContact')->getData();
            $qualite = $form->get('Qualite')->getData();
            $qualiteProprietaire = $form->get('QualiteProprietaire')->getData();
            $genre = $form->get('Genre')->getData();
            if ($qualiteProprietaire != null) {
                $imcon->setQualiteProprietaire($qualiteProprietaire->getLibelle());
            }
            if ($genre != null) {
                $imcon->setGenre($genre->getLibelle());
            }
            if ($qualite != null) {
                $imcon->setQualite($qualite->getLibelle());
            }
            if ($immeubleContactt != null) {
                $idC = $contactRepository->findOneBy(['IDContact' => $immeubleContactt]);
                $immeubleContact->setIDContact($idC);
            }
            $immeubleContactRepository->save($immeubleContact, true);
            return $this->redirect('/immeubles' . '/' . $ar, Response::HTTP_SEE_OTHER);
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
    public function delete(Request $request, ImmeubleContact $immeubleContact, ImmeubleRepository $immeubleRepository, EntityManagerInterface $entityManager): Response
    {
        $ar = $immeubleContact->getIDImmeuble();
        if ($this->isCsrfTokenValid('delete' . $immeubleContact->getIDImmeubleContact(), $request->request->get('_token'))) {
            $entityManager->remove($immeubleContact, true);
            $entityManager->flush();
        }
        //dd($ar);
        return $this->redirect('/immeubles' . '/' . $ar, Response::HTTP_SEE_OTHER);
        // return $this->redirectToRoute('immeubles', [], Response::HTTP_SEE_OTHER);
    }
}
