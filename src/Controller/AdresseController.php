<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Form\AdresseType;
use App\Repository\AdresseRepository;
use App\Repository\ImmeubleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/adresses')]
class AdresseController extends AbstractController
{

    #[Route('/', name: 'adresses', methods: ['GET'])]
    public function index(AdresseRepository $adresseRepository): Response
    {
        return $this->render('adresse/index.html.twig', [
            'adresses' => $adresseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'adresse_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AdresseRepository $adresseRepository)
    {
        $adresse = new Adresse();
        $form = $this->createForm(AdresseType::class, $adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adresseRepository->save($adresse, true);

            //return $this->redirectToRoute('adresses', [], Response::HTTP_SEE_OTHER);
        }

        // return $this->render('adresse/new.html.twig', [
        //     'adresse' => $adresse,
        //     'form' => $form,
        // ]);
    }

    #[Route('/{IDAdresse}', name: 'adresse_show', methods: ['GET'])]
    public function show(Adresse $adresse): Response
    {
        return $this->render('adresse/show.html.twig', [
            'adresse' => $adresse,
        ]);
    }

    #[Route('/{IDAdresse}/edit', name: 'adresse_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Adresse $adresse, AdresseRepository $adresseRepository, ImmeubleRepository $immeubleRepository): Response
    {
        $ar = $immeubleRepository->findOneBy(['IDImmeuble' => $adresse->getIDImmeuble()]);
        $adresse->setIDImmeuble($ar);
        $form = $this->createForm(AdresseType::class, $adresse);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $adresseRepository->save($adresse, true);

            return $this->redirect('/immeubles' . '/' . $ar, Response::HTTP_SEE_OTHER);
        }

        return $this->render('adresse/edit.html.twig', [
            'adresse' => $adresse,
            'form' => $form,
        ]);
    }

    #[Route('/{IDAdresse}/edit/copy', name: 'adress_copy', methods: ['GET', 'POST'])]
    public function adressCopy(Adresse $adres, AdresseRepository $adresseRepository)
    {
        $adresse = new Adresse();
        $adresse->setNumPrincipal($adres->getNumPrincipal());
        $adresse->setNumSecondaire($adres->getNumSecondaire());
        $adresse->setTypeVoie($adres->getTypeVoie());
        $adresse->setAdresse($adres->getAdresse());
        $adresse->setCP($adres->getCP());
        $adresse->setVille($adres->getVille());
        $adresse->setAdressePrincipale(0);
        $adresse->setIDImmeuble($adres->getIDImmeuble());
        $adresseRepository->save($adresse, true);
        return $this->redirect('/immeubles' . '/' . $adres->getIDImmeuble(), Response::HTTP_SEE_OTHER);
    }

    #[Route('/{IDAdresse}', name: 'adresse_delete', methods: ['POST'])]
    public function delete(Request $request, Adresse $adresse, AdresseRepository $adresseRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $adresse->getIDAdresse(), $request->request->get('_token'))) {
            $adresseRepository->remove($adresse, true);
        }

        return $this->redirect('/immeubles' . '/' . $adresse->getIDImmeuble(), Response::HTTP_SEE_OTHER);
    }
}
