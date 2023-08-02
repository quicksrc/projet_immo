<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\RechercheContact;
use App\Form\ContactType;
use App\Form\SearchContactType;
use App\Repository\ActiviteRepository;
use App\Repository\ContactRepository;
use App\Repository\ImmeubleContactRepository;
use App\Repository\ImmeubleRepository;
use App\Repository\OpportuniteRepository;
use App\Repository\RechercheContactRepository;
use App\Repository\SocieteContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contact')]
class ContactController extends AbstractController
{
    #[Route('/', name: 'contacts', methods: ['GET'])]
    public function index(ContactRepository $contactRepository): Response
    {
        return $this->render('contact/index.html.twig', [
            'contacts' => $contactRepository->findBy(array(), array('IDContact' => 'desc'), 1000, null),
        ]);
    }
    #[Route('/search', name: 'contact_search')]
    public function search(ContactRepository $contactRepository, ActiviteRepository $activiteRepository, RechercheContactRepository $rechercheContactRepository, ImmeubleContactRepository $immeubleContactRepository, SocieteContactRepository $societeContactRepository, ImmeubleRepository $immeubleRepository, Request $request): Response
    {
        // Recherche avancée
        $rechercheContact = new RechercheContact();
        /** @var $form symfony\component\form\clickableinterface */
        $form = $this->createForm(SearchContactType::class, $rechercheContact);
        $form->handleRequest($request);
        // $immeubles => Array pour afficher les immeubles
        $immeubles = [];

        // $immeublesContacts => Array pour afficher les immeublesContacts
        $immeublesContacts = [];

        // $contacts => Array pour afficher les contacts
        $contacts = [];

        // $contacts => Array pour afficher les adresses
        $adresses = [];

        // $contacts => Array pour afficher les activités
        $activites = [];

        // $societes => Array pour afficher les activités
        $societes = [];

        if ($form->isSubmitted() && $form->isValid()) {

            $keyValueImmeuble = [];
            $keyValueContact = [];
            $keyValueAdress = [];
            $keyValueActivity = [];
            $keyValueSociete = [];

            // Vérifier si on rempli les champs
            for ($i = 0; $i < 1; $i++) {

                if (!empty($rechercheContact->getCivilite())) {
                    array_push($keyValueContact, array("Civilite", $rechercheContact->getCivilite()));
                }
                if (!empty($rechercheContact->getNom())) {
                    array_push($keyValueContact, array("Nom", $rechercheContact->getNom()));
                }
                if (!empty($rechercheContact->getPrenom())) {
                    array_push($keyValueContact, array("Prenom", $rechercheContact->getPrenom()));
                }
                if (!empty($rechercheContact->getAdresseContact())) {
                    array_push($keyValueContact, array("Adresse", $rechercheContact->getAdresseContact()));
                }
                if (!empty($rechercheContact->getCpContact())) {
                    array_push($keyValueContact, array("CP", $rechercheContact->getCpContact()));
                }
                if (!empty($rechercheContact->getVilleContact())) {
                    array_push($keyValueContact, array("Ville", $rechercheContact->getVilleContact()));
                }
                if (!empty($rechercheContact->getFonction())) {
                    array_push($keyValueContact, array("Fonction", $rechercheContact->getFonction()));
                }
                if (!empty($rechercheContact->getDateNaissance())) {
                    array_push($keyValueContact, array("DateNaissance", $rechercheContact->getDateNaissance()));
                }
                if (!empty($rechercheContact->getCorrespondant())) {
                    array_push($keyValueContact, array("Correspondant", $rechercheContact->getCorrespondant()));
                }
                if (!empty($rechercheContact->getAntiMailing())) {
                    array_push($keyValueContact, array("AntiMailing", $rechercheContact->getAntiMailing()));
                }
                if (!empty($rechercheContact->getSocieteContact())) {
                    array_push($keyValueContact, array("Societe", $rechercheContact->getSocieteContact()));
                }
                if (!empty($rechercheContact->getNpai())) {
                    array_push($keyValueContact, array("NPAI", $rechercheContact->getNpai()));
                }
                if (!empty($rechercheContact->getActiviteContact())) {
                    array_push($keyValueContact, array("Activite", $rechercheContact->getActiviteContact()));
                }
                if (!empty($rechercheContact->getRcs())) {
                    array_push($keyValueContact, array("RCS", $rechercheContact->getRcs()));
                }
                if (!empty($rechercheContact->getDateActivite())) {
                    array_push($keyValueActivity, array("DateActivite", $rechercheContact->getDateActivite()));
                }
                if (!empty($rechercheContact->getThemeActivite())) {
                    array_push($keyValueActivity, array("Theme", $rechercheContact->getThemeActivite()));
                }
                if (!empty($rechercheContact->getActionActivite())) {
                    array_push($keyValueActivity, array("Action", $rechercheContact->getActionActivite()));
                }
                if (!empty($rechercheContact->getCommentaireActivite())) {
                    array_push($keyValueActivity, array("Commentaire", $rechercheContact->getCommentaireActivite()));
                }
                if (!empty($rechercheContact->getRefProprioImmeuble())) {
                    array_push($keyValueImmeuble, array("ReferenceProprio", $rechercheContact->getRefProprioImmeuble()));
                }
                if (!empty($rechercheContact->getOrigineContactImmeuble())) {
                    array_push($keyValueImmeuble, array("OrigineContact", $rechercheContact->getOrigineContactImmeuble()));
                }
                if (!empty($rechercheContact->getNcpcfImmeuble())) {
                    array_push($keyValueImmeuble, array("NCPCF", $rechercheContact->getNcpcfImmeuble()));
                }
                if (!empty($rechercheContact->getVisiteImmeuble())) {
                    array_push($keyValueImmeuble, array("Visite", $rechercheContact->getVisiteImmeuble()));
                }
                if (!empty($rechercheContact->getAdresseAdresse())) {
                    array_push($keyValueAdress, array("adresseAdresse", $rechercheContact->getAdresseAdresse()));
                }
                if (!empty($rechercheContact->getCpAdresse())) {
                    array_push($keyValueAdress, array("cpAdresse", $rechercheContact->getCpAdresse()));
                }
                if (!empty($rechercheContact->getVilleAdresse())) {
                    array_push($keyValueAdress, array("villeAdresse", $rechercheContact->getVilleAdresse()));
                }
                if (!empty($rechercheContact->getEtatDossierSociete())) {
                    array_push($keyValueSociete, array("getEtatDossierSociete", $rechercheContact->getEtatDossierSociete()));
                }
                if (!empty($rechercheContact->getResponsableSociete())) {
                    array_push($keyValueSociete, array("responsableSociete", $rechercheContact->getResponsableSociete()));
                }
                if (!empty($rechercheContact->getOrigineContactSociete())) {
                    array_push($keyValueSociete, array("origineContactSociete", $rechercheContact->getOrigineContactSociete()));
                }
                if (!empty($rechercheContact->getRaisonSocialeVendeurSociete())) {
                    array_push($keyValueSociete, array("raisonSocialeVendeurSociete", $rechercheContact->getRaisonSocialeVendeurSociete()));
                }
                if (!empty($rechercheContact->getCpVendeurSociete())) {
                    array_push($keyValueSociete, array("cpVendeurSociete", $rechercheContact->getCpVendeurSociete()));
                }
                if (!empty($rechercheContact->getRaisonSocialeAcheteurSociete())) {
                    array_push($keyValueSociete, array("raisonSocialeAcheteurSociete", $rechercheContact->getRaisonSocialeAcheteurSociete()));
                }
                if (!empty($rechercheContact->getCpAcheteurSociete())) {
                    array_push($keyValueSociete, array("cpAcheteurSociete", $rechercheContact->getCpAcheteurSociete()));
                }
            };
            if (count($keyValueContact) >= 1 && $form->get('rechercheContact')->isClicked()) {
                $contacts = $contactRepository->findContactBySearch($rechercheContact);
            } elseif (count($keyValueActivity) >= 1 && $form->get('rechercheActivite')->isClicked()) {
                $activites = $activiteRepository->findContactByActivity($rechercheContact);
            } elseif (count($keyValueImmeuble) >= 1 && $form->get('rechercheImmeuble')->isClicked()) {
                $immeublesContacts = $immeubleContactRepository->findContactByImmeuble($rechercheContact);
            } elseif (count($keyValueAdress) >= 1 && $form->get('rechercheAdresse')->isClicked()) {
                $adresses = $contactRepository->findContactByAdress($rechercheContact);
            } elseif (count($keyValueSociete) >= 1 && $form->get('rechercheSociete')->isClicked()) {
                $societes = $societeContactRepository->findContactBySociete($rechercheContact);
            } elseif (count($keyValueImmeuble) == 0 && count($keyValueContact) == 0 && count($keyValueActivity) == 0 && count($keyValueSociete) == 0 && count($keyValueAdress) == 0) {
                $contacts = $contactRepository->findBy(array(), null, 500, null);
                dd($keyValueAdress);
            };

            return $this->render(
                'contact/search.html.twig',
                [
                    'societes' => $societes,
                    'immeublesContacts' => $immeublesContacts,
                    'activites' => $activites,
                    'adresses' => $adresses,
                    'contacts' => $contacts,
                    'immeubles' => $immeubles,
                    'form' => $form,
                ]
            );
        }
        return $this->render(
            'contact/search.html.twig',
            [
                'societes' => $societes,
                'immeublesContacts' => $immeublesContacts,
                'activites' => $activites,
                'adresses' => $adresses,
                'contacts' => $contactRepository->findBy(array(), array('IDContact' => 'desc'), 1000, null),
                'immeubles' => $immeubles,
                'form' => $form->createView(),
            ]
        );
    }

    #[Route('/new', name: 'contact_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ContactRepository $contactRepository): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactRepository->save($contact, true);

            return $this->redirectToRoute('contacts', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contact/new.html.twig', [
            'contact' => $contact,
            'form' => $form,
        ]);
    }

    #[Route('/{IDContact}', name: 'contact_show', methods: ['GET'])]
    public function show(Contact $contact, OpportuniteRepository $opportuniteRepository, ActiviteRepository $activiteRepository, ImmeubleContactRepository $immeubleContactRepository): Response
    {
        $activites = [];
        $activites = $activiteRepository->findBy(['IDContact' => $contact->getIDContact()]);

        $immeubles = [];
        $immeubles = $immeubleContactRepository->findBy(['IDContact' => $contact->getIDContact()]);

        $opportunites = [];
        $opportunites = $opportuniteRepository->findBy(['IDContact' => $contact->getIDContact()]);

        return $this->render('contact/show.html.twig', [
            'immeubles' => $immeubles,
            'opportunites' => $opportunites,
            'activites' => $activites,
            'contact' => $contact,
        ]);
    }

    #[Route('/{IDContact}/edit', name: 'contact_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contact $contact, ContactRepository $contactRepository): Response
    {
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactRepository->save($contact, true);

            return $this->redirectToRoute('contacts', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contact/edit.html.twig', [
            'contact' => $contact,
            'form' => $form,
        ]);
    }

    #[Route('/{IDContact}', name: 'contact_delete', methods: ['POST'])]
    public function delete(Request $request, Contact $contact, ContactRepository $contactRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $contact->getIDContact(), $request->request->get('_token'))) {
            $contactRepository->remove($contact, true);
        }

        return $this->redirectToRoute('contacts', [], Response::HTTP_SEE_OTHER);
    }
}
