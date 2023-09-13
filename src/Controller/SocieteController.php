<?php

namespace App\Controller;

use App\Entity\RechercheSociete;
use App\Entity\Societe;
use App\Form\SearchSocieteType;
use App\Form\SocieteType;
use App\Repository\ActiviteRepository;
use App\Repository\ContactRepository;
use App\Repository\OpportuniteRepository;
use App\Repository\SocieteContactRepository;
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
            'societes' => $societeRepository->findBy(array(), array('IDSociete' => 'desc'), 500, null),
        ]);
    }

    #[Route('/search', name: 'societe_search')]
    public function search(SocieteRepository $societeRepository, ActiviteRepository $activiteRepository,  SocieteContactRepository $societeContactRepository, Request $request): Response
    {
        // Recherche avancée
        $rechercheSociete = new RechercheSociete();
        /** @var $form symfony\component\form\clickableinterface */
        $form = $this->createForm(SearchSocieteType::class, $rechercheSociete);
        $form->handleRequest($request);

        // $societes => Array pour afficher les activités
        $societes = [];

        // $contacts => Array pour afficher les contacts
        $contacts = [];

        // $contacts => Array pour afficher les activités
        $activites = [];
        if ($form->isSubmitted() && $form->isValid()) {

            $keyValueSociete = [];
            $keyValueContact = [];
            $keyValueActivity = [];

            // Vérifier si on rempli les champs
            for ($i = 0; $i < 1; $i++) {

                // Societe
                if (!empty($rechercheSociete->getEtatDossier())) {
                    array_push($keyValueSociete, array("etatDossier", $rechercheSociete->getEtatDossier()));
                }
                if (!empty($rechercheSociete->getResponsable())) {
                    array_push($keyValueSociete, array("responsable", $rechercheSociete->getResponsable()));
                }
                if (!empty($rechercheSociete->getOrigineContact())) {
                    array_push($keyValueSociete, array("origineContact", $rechercheSociete->getOrigineContact()));
                }
                if (!empty($rechercheSociete->getRaisonSocialeVendeur())) {
                    array_push($keyValueSociete, array("raisonSocialeVendeur", $rechercheSociete->getRaisonSocialeVendeur()));
                }
                if (!empty($rechercheSociete->getCpVendeur())) {
                    array_push($keyValueSociete, array("cpVendeur", $rechercheSociete->getCpVendeur()));
                }
                if (!empty($rechercheSociete->getRaisonSocialeAcheteur())) {
                    array_push($keyValueSociete, array("raisonSocialeAcheteur", $rechercheSociete->getRaisonSocialeAcheteur()));
                }
                if (!empty($rechercheSociete->getCpAcheteur())) {
                    array_push($keyValueSociete, array("cpAcheteur", $rechercheSociete->getCpAcheteur()));
                }
                // Contact
                if (!empty($rechercheSociete->getCiviliteContact())) {
                    array_push($keyValueContact, array("civiliteContact", $rechercheSociete->getCiviliteContact()));
                }
                if (!empty($rechercheSociete->getNomContact())) {
                    array_push($keyValueContact, array("nomContact", $rechercheSociete->getNomContact()));
                }
                if (!empty($rechercheSociete->getPrenomContact())) {
                    array_push($keyValueContact, array("prenomContact", $rechercheSociete->getPrenomContact()));
                }
                if (!empty($rechercheSociete->getAdresseContact())) {
                    array_push($keyValueContact, array("adresseContact", $rechercheSociete->getAdresseContact()));
                }
                if (!empty($rechercheSociete->getCpContact())) {
                    array_push($keyValueContact, array("cpContact", $rechercheSociete->getCpContact()));
                }
                if (!empty($rechercheSociete->getVilleContact())) {
                    array_push($keyValueContact, array("villeContact", $rechercheSociete->getVilleContact()));
                }
                if (!empty($rechercheSociete->getFonctionContact())) {
                    array_push($keyValueContact, array("fonctionContact", $rechercheSociete->getFonctionContact()));
                }
                if (!empty($rechercheSociete->getCorrespondantContact())) {
                    array_push($keyValueContact, array("correspondantContact", $rechercheSociete->getCorrespondantContact()));
                }
                if (!empty($rechercheSociete->getAntiMailingContact())) {
                    array_push($keyValueContact, array("antiMailingContact", $rechercheSociete->getAntiMailingContact()));
                }
                if (!empty($rechercheSociete->getPrincipalContact())) {
                    array_push($keyValueContact, array("principalContact", $rechercheSociete->getPrincipalContact()));
                }
                if (!empty($rechercheSociete->getSocieteContact())) {
                    array_push($keyValueContact, array("societeContact", $rechercheSociete->getSocieteContact()));
                }
                if (!empty($rechercheSociete->getNpaiContact())) {
                    array_push($keyValueContact, array("npaiContact", $rechercheSociete->getNpaiContact()));
                }
                if (!empty($rechercheSociete->getActiviteContact())) {
                    array_push($keyValueContact, array("activiteContact", $rechercheSociete->getActiviteContact()));
                }
                if (!empty($rechercheSociete->getRcsContact())) {
                    array_push($keyValueContact, array("rcsContact", $rechercheSociete->getRcsContact()));
                }
                // Activité
                if (!empty($rechercheSociete->getDateActivite())) {
                    array_push($keyValueActivity, array("dateActivite", $rechercheSociete->getDateActivite()));
                }
                if (!empty($rechercheSociete->getThemeActivite())) {
                    array_push($keyValueActivity, array("themeActivite", $rechercheSociete->getThemeActivite()));
                }
                if (!empty($rechercheSociete->getActionActivite())) {
                    array_push($keyValueActivity, array("actionActivite", $rechercheSociete->getActionActivite()));
                }
                if (!empty($rechercheSociete->getCommentaireActivite())) {
                    array_push($keyValueActivity, array("commentaireActivite", $rechercheSociete->getCommentaireActivite()));
                }
            };

            if (count($keyValueSociete) >= 1 && $form->get('rechercheSociete')->isClicked()) {
                $societes = $societeRepository->findSocieteBySearch($rechercheSociete);
            } elseif (count($keyValueContact) >= 1 && $form->get('rechercheContact')->isClicked()) {
                $contacts = $societeContactRepository->findSocieteByContact($rechercheSociete);
            } elseif (count($keyValueActivity) >= 1 && $form->get('rechercheActivite')->isClicked()) {
                $activites = $activiteRepository->findSocieteByActivite($rechercheSociete);
            } elseif (count($keyValueSociete) == 0 && count($keyValueContact) == 0 && count($keyValueActivity) == 0) {
                $societes = $societeRepository->findBy(array(), null, 500, null);
            };

            return $this->render(
                'societe/search.html.twig',
                [
                    'societes' => $societes,
                    'activites' => $activites,
                    'contacts' => $contacts,
                    'form' => $form,
                ]
            );
        }
        return $this->render(
            'societe/search.html.twig',
            [
                'societes' => $societeRepository->findBy(array(), array('IDSociete' => 'desc'), 500, null),
                'activites' => $activites,
                'contacts' => $contacts,
                'form' => $form->createView(),
            ]
        );
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
    public function show(Societe $societe, OpportuniteRepository $opportuniteRepository, SocieteContactRepository $societeContactRepository): Response
    {
        $opportunites = [];
        $opportunites = $opportuniteRepository->findBy(['IDSociete' => $societe->getIDSociete()]);

        $contacts = [];
        $contacts = $societeContactRepository->findBy(['IDSociete' => $societe->getIDSociete()]);

        return $this->render('societe/show.html.twig', [
            'contacts' => $contacts,
            'opportunites' => $opportunites,
            'societe' => $societe,
        ]);
    }

    #[Route('/{IDSociete}/edit', name: 'societe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Societe $societe, SocieteRepository $societeRepository): Response
    {
        $form = $this->createForm(SocieteType::class, $societe);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $societe->setDateModification(new \DateTime());
            $societeRepository->save($societe, true);

            return $this->redirectToRoute('societes', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('societe/edit.html.twig', [
            'societe' => $societe,
            'form' => $form,
        ]);
    }

    #[Route('/{IDSociete}', name: 'societe_delete', methods: ['POST'])]
    public function delete(Request $request, Societe $societe, SocieteRepository $societeRepository, SocieteContactRepository $societeContactRepository, ActiviteRepository $activiteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $societe->getIDSociete(), $request->request->get('_token'))) {
            $scr = $societeContactRepository->findBy(['IDSociete' => $societe->getIDSociete()]);
            $ar = $activiteRepository->findBy(['IDSociete' => $societe->getIDSociete()]);
            if ($scr != null) {
                foreach ($scr as $value) {
                    $societeContactRepository->remove($value, true);
                }
            }
            if ($ar != null) {
                foreach ($ar as $value) {
                    $activiteRepository->remove($value, true);
                }
            }

            $societeRepository->remove($societe, true);
        }

        return $this->redirectToRoute('societes', [], Response::HTTP_SEE_OTHER);
    }
}
