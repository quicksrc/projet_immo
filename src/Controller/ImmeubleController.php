<?php

namespace App\Controller;

use App\Entity\Immeuble;
use App\Entity\RechercheImmeuble;
use App\Form\ImmeubleType;
use App\Form\SearchImmeubleType;
use App\Repository\ActiviteRepository;
use App\Repository\AdresseRepository;
use App\Repository\ContactRepository;
use App\Repository\ImmeubleContactRepository;
use App\Repository\ImmeubleRepository;
use App\Repository\OpportuniteRepository;
use App\Repository\RechercheImmeubleRepository;
use App\Service\PdfService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/immeubles')]
class ImmeubleController extends AbstractController
{
    #[Route('/', name: 'immeubles', methods: ['GET'])]
    public function index(ImmeubleRepository $immeubleRepository, ContactRepository $contactRepository): Response
    {

        return $this->render('immeuble/index.html.twig', [
            'immeubles' => $immeubleRepository->findBy(array(), array('ReferenceProprio' => 'desc'), 1000, null),
            'contacts' => $contactRepository->findBy(array(), null, 1000, null),
        ]);
    }



    #[Route('/search', name: 'immeuble_search')]
    public function search(ImmeubleRepository $immeubleRepository, RechercheImmeubleRepository $rechercheImmeubleRepository, ImmeubleContactRepository $immeubleContactRepository, AdresseRepository $adresseRepository, ActiviteRepository $activiteRepository, Request $request): Response
    {
        // Recherche avancée
        $rechercheImmeuble = new RechercheImmeuble();
        /** @var $form symfony\component\form\clickableinterface */
        $form = $this->createForm(SearchImmeubleType::class, $rechercheImmeuble);
        $form->handleRequest($request);
        //$form->get('block_john')->isClicked();
        // $immeubles => Array pour afficher les immeubles
        $immeubles = [];

        // $contacts => Array pour afficher les contacts
        $contacts = [];

        // $contacts => Array pour afficher les adresses
        $adresses = [];

        // $contacts => Array pour afficher les activités
        $activites = [];

        if ($form->isSubmitted() && $form->isValid()) {

            $keyValue = [];
            $keyValueContact = [];
            $keyValueAdress = [];
            $keyValueActivity = [];

            // Vérifier si on rempli les champs
            for ($i = 0; $i < 1; $i++) {
                if (!empty($rechercheImmeuble->getRefProprioImmeuble())) {
                    array_push($keyValue, array("ReferenceProprio", $rechercheImmeuble->getRefProprioImmeuble()));
                }
                if (!empty($rechercheImmeuble->isNcpcf())) {
                    array_push($keyValue, array("NCPCF", $rechercheImmeuble->isNcpcf()));
                }
                if (!empty($rechercheImmeuble->getOrigineContact())) {
                    array_push($keyValue, array("OrigineContact", $rechercheImmeuble->getOrigineContact()));
                }
                if (!empty($rechercheImmeuble->isVisite())) {
                    array_push($keyValue, array("Visite", $rechercheImmeuble->isVisite()));
                }
                if (!empty($rechercheImmeuble->getNumPrincipal())) {
                    array_push($keyValueAdress, array("NumPrincipal", $rechercheImmeuble->getNumPrincipal()));
                }
                if (!empty($rechercheImmeuble->getTypeVoie())) {
                    array_push($keyValueAdress, array("TypeVoie", $rechercheImmeuble->getTypeVoie()));
                }
                if (!empty($rechercheImmeuble->getNomRue())) {
                    array_push($keyValueAdress, array("NomRue", $rechercheImmeuble->getNomRue()));
                }
                if (!empty($rechercheImmeuble->getCp())) {
                    array_push($keyValueAdress, array("CP", $rechercheImmeuble->getCp()));
                }
                if (!empty($rechercheImmeuble->getVille())) {
                    array_push($keyValueAdress, array("Ville", $rechercheImmeuble->getVille()));
                }
                if (!empty($rechercheImmeuble->getNomContact())) {
                    array_push($keyValueContact, array("Nom", $rechercheImmeuble->getNomContact()));
                }
                if (!empty($rechercheImmeuble->getRCS())) {
                    array_push($keyValueContact, array("RCS", $rechercheImmeuble->getRCS()));
                }
                if (!empty($rechercheImmeuble->getEmail())) {
                    array_push($keyValueContact, array("Email", $rechercheImmeuble->getEmail()));
                }
                if (!empty($rechercheImmeuble->getCiviliteContact())) {
                    array_push($keyValueContact, array("Civilite", $rechercheImmeuble->getCiviliteContact()));
                }
                if (!empty($rechercheImmeuble->getPrenomContact())) {
                    array_push($keyValueContact, array("Prenom", $rechercheImmeuble->getPrenomContact()));
                }
                if (!empty($rechercheImmeuble->getDateActivite())) {
                    array_push($keyValueActivity, array("DateActivite", $rechercheImmeuble->getDateActivite()));
                }
                if (!empty($rechercheImmeuble->getTheme())) {
                    array_push($keyValueActivity, array("Theme", $rechercheImmeuble->getTheme()));
                }
            };

            if (count($keyValue) >= 1 && $form->get('rechercheImmeuble')->isClicked()) {
                $immeubles = $immeubleRepository->findImmeubleBySearch($rechercheImmeuble);
            } elseif (count($keyValueAdress) >= 1 && $form->get('rechercheAdresse')->isClicked()) {
                $adresses = $adresseRepository->findImmeubleByAdress($rechercheImmeuble);
            } elseif (count($keyValueContact) >= 1 && $form->get('rechercheContact')->isClicked()) {
                $contacts = $immeubleContactRepository->findImmeubleByFieldsContact($rechercheImmeuble);
            } elseif (count($keyValueActivity) >= 1 && $form->get('rechercheActivite')->isClicked()) {
                $activites = $activiteRepository->findImmeubleByActivity($rechercheImmeuble);
            } elseif (count($keyValue) == 0 && count($keyValueContact) == 0 && count($keyValueActivity) == 0) {
                $immeubles = $immeubleRepository->findBy(array(), null, 500, null);
            };

            return $this->render(
                'immeuble/search.html.twig',
                [
                    // 'list_immeubles' => $immeubleRepository->findBy(array(), null, 100, null),
                    'activites' => $activites,
                    'adresses' => $adresses,
                    'contacts' => $contacts,
                    'immeubles' => $immeubles,
                    'form' => $form,
                ]
            );
        }
        return $this->render(
            'immeuble/search.html.twig',
            [
                'activites' => $activites,
                'adresses' => $adresses,
                'contacts' => $contacts,
                'immeubles' => $immeubleRepository->findBy(array(), null, 100, null),
                'form' => $form->createView(),
            ]
        );
    }

    #[Route('/new', name: 'immeuble_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ImmeubleRepository $immeubleRepository): Response
    {
        $immeuble = new Immeuble();
        $form = $this->createForm(ImmeubleType::class, $immeuble);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $immeubleRepository->save($immeuble, true);

            return $this->redirectToRoute('immeubles', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('immeuble/new.html.twig', [
            'immeuble' => $immeuble,
            'form' => $form,
        ]);
    }

    #[Route('/{IDImmeuble}', name: 'immeuble_show', methods: ['GET'])]
    public function show(Immeuble $immeuble, AdresseRepository $adresseRepository, ImmeubleContactRepository $immeubleContactRepository, ActiviteRepository $activiteRepository, OpportuniteRepository $opportuniteRepository): Response
    {

        $adresses = [];
        $adresses = $adresseRepository->findBy(['IDImmeuble' => $immeuble->getIDImmeuble()]);

        $contacts = [];
        $contacts = $immeubleContactRepository->findBy(['IDImmeuble' => $immeuble->getIDImmeuble()]);

        $activites = [];
        $activites = $activiteRepository->findBy(['IDImmeuble' => $immeuble->getIDImmeuble()]);

        $opportunites = [];
        $opportunites = $opportuniteRepository->findBy(['IDImmeuble' => $immeuble->getIDImmeuble()]);

        return $this->render('immeuble/show.html.twig', [
            'opportunites' => $opportunites,
            'activites' => $activites,
            'contacts' => $contacts,
            'adresses' => $adresses,
            'immeuble' => $immeuble,
        ]);
    }



    #[Route('/{IDImmeuble}/edit', name: 'immeuble_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Immeuble $immeuble, ImmeubleRepository $immeubleRepository): Response
    {
        $form = $this->createForm(ImmeubleType::class, $immeuble);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $immeubleRepository->save($immeuble, true);

            return $this->redirectToRoute('immeubles', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('immeuble/edit.html.twig', [
            'immeuble' => $immeuble,
            'form' => $form,
        ]);
    }

    #[Route('/{IDImmeuble}/edit/pdf', name: 'immeuble.pdf')]
    public function generatePdfImmeuble(Immeuble $immeuble = null, PdfService $pdf)
    {
        $html = $this->render('immeuble/edit.html.twig', [
            'immeuble' => $immeuble,
        ]);
        $pdf->showPdfFile($html);
    }

    #[Route('/{IDImmeuble}', name: 'immeuble_delete', methods: ['POST'])]
    public function delete(Request $request, Immeuble $immeuble, ImmeubleRepository $immeubleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $immeuble->getIDImmeuble(), $request->request->get('_token'))) {
            $immeubleRepository->remove($immeuble, true);
        }

        return $this->redirectToRoute('immeubles', [], Response::HTTP_SEE_OTHER);
    }
}
