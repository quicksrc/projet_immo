<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\RechercheContact;
use App\Form\ContactType;
use App\Form\SaveContactSearchType;
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
use Symfony\Component\Validator\Constraints\Date;

#[Route('/contact')]
class ContactController extends AbstractController
{
    #[Route('/', name: 'contacts')]
    public function index(ContactRepository $contactRepository, RechercheContactRepository $rechercheContactRepository, ActiviteRepository $activiteRepository, ImmeubleContactRepository $immeubleContactRepository, SocieteContactRepository $societeContactRepository, Request $request): Response
    {
        /** @var $form symfony\component\form\clickableinterface */
        $form = $this->createForm(SaveContactSearchType::class);
        $form->handleRequest($request);

        $contacts = [];
        $immeubles = [];
        $adresses = [];
        $activites = [];
        $societes = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $datas = (array)$form->get('nomRecherche')->getData();
            $array =  array_values($datas);
            if ($array == []) {
                return $this->render('contact/index.html.twig', [
                    'contacts' => $contactRepository->findBy(array(), array('IDContact' => 'desc'), 100, null),
                    'immeubles' => $immeubles,
                    'activites' => $activites,
                    'adresses' => $adresses,
                    'societes' => $societes,
                    'recherchesContacts' => $rechercheContactRepository->findBy(array(), array('id' => 'desc'), 100, null),
                    'formSave' => $form->createView(),
                ]);
            }

            $id = $array[0];
            $civilite = $array[1];
            $nom =  $array[2];
            $prenom = $array[3];
            $adresseContact =  $array[4];
            $cpContact =  $array[5];
            $villeContact =  $array[6];
            $fonction = $array[7];
            $dateNaissance = $array[8];
            $correspondant = $array[9];
            $antiMailing = $array[10];
            $societeContact = $array[11];
            $npai = $array[12];
            $activiteContact = $array[13];
            $rcs = $array[14];
            $qualiteContact = $array[15];
            $neVendPas = $array[16];
            $dateActivite = $array[17];
            $actionActivite = $array[18];
            $themeActivite = $array[19];
            $commentaireActivite = $array[20];
            $refProprioImmeuble = $array[21];
            $origineContactImmeuble = $array[22];
            $ncpcfImmeuble = $array[23];
            $visiteImmeuble = $array[24];
            $numVoieAdresse = $array[25];
            $typeVoieAdresse = $array[26];
            $adresseAdresse = $array[27];
            $cpAdresse = $array[28];
            $villeAdresse = $array[29];
            $adressePrincipaleAdresse = $array[30];
            $etatDossierSociete = $array[31];
            $responsableSociete = $array[32];
            $origineContactSociete = $array[33];
            $raisonSocialeVendeurSociete = $array[34];
            $cpVendeurSociete = $array[35];
            $raisonSocialeAcheteurSociete = $array[36];
            $cpAcheteurSociete = $array[37];
            $nomRecherche = $array[38];

            if (str_contains($nomRecherche, 'Contact : ')) {
                $contacts = $contactRepository->createQueryBuilder('c')
                    ->where('c.IDContact IS NOT NULL');

                if ($civilite != null) {
                    $contacts
                        ->andWhere('c.Civilite LIKE :civilite')
                        ->setParameter('civilite', $civilite);
                }
                if ($nom != null) {
                    $contacts
                        ->andWhere('c.Nom LIKE :nom')
                        ->setParameter('nom', $nom);
                }
                if ($prenom != null) {
                    $contacts
                        ->andWhere('c.Prenom LIKE :prenom')
                        ->setParameter('prenom', $prenom);
                }
                if ($adresseContact != null) {
                    $contacts
                        ->andWhere('c.Adresse LIKE :adresseContact')
                        ->setParameter('adresseContact', $adresseContact);
                }
                if ($cpContact != null) {
                    $contacts
                        ->andWhere('c.CP LIKE :cpContact')
                        ->setParameter('cpContact', $cpContact);
                }
                if ($villeContact != null) {
                    $contacts
                        ->andWhere('c.Ville LIKE :villeContact')
                        ->setParameter('villeContact', $villeContact);
                }
                if ($fonction != null) {
                    $contacts
                        ->andWhere('c.Fonction LIKE :fonction')
                        ->setParameter('fonction', $fonction);
                }
                if ($dateNaissance != null) {
                    $contacts
                        ->andWhere('c.DateNaissance LIKE :dateNaissance')
                        ->setParameter('dateNaissance', $dateNaissance->format('Y-m-d 00:00:00'));
                }
                if ($correspondant != null) {
                    $contacts
                        ->andWhere('c.Correspondant LIKE :correspondant')
                        ->setParameter('correspondant', $correspondant);
                }
                if ($antiMailing != null) {
                    $contacts
                        ->andWhere('c.AntiMailing LIKE :antiMailing')
                        ->setParameter('antiMailing', $antiMailing);
                }
                if ($societeContact != null) {
                    $contacts
                        ->andWhere('c.Societe LIKE :societeContact')
                        ->setParameter('societeContact', $societeContact);
                }
                if ($npai != null) {
                    $contacts
                        ->andWhere('c.NPAI LIKE :npai')
                        ->setParameter('npai', $npai);
                }
                if ($activiteContact != null) {
                    $contacts
                        ->andWhere('c.activites LIKE :activiteContact')
                        ->setParameter('activiteContact', $activiteContact);
                }
                if ($rcs != null) {
                    $contacts
                        ->andWhere('c.RCS LIKE :rcs')
                        ->setParameter('rcs', $rcs);
                }
                $contacts = $contacts->getQuery()->getResult();
            }

            if (str_contains($nomRecherche, 'Activite : ')) {
                $activites = $activiteRepository->createQueryBuilder('a')
                    ->addSelect('c')
                    ->leftJoin('a.IDContact', 'c')
                    ->where('c.IDContact IS NOT NULL');

                if ($dateActivite != null) {
                    $activites
                        ->andWhere('a.DateActivite LIKE :dateActivite')
                        ->setParameter('dateActivite', $dateActivite->format('Y-m-d 00:00:00'));
                }
                if ($themeActivite != null) {
                    $activites
                        ->andWhere('a.Theme LIKE :themeActivite')
                        ->setParameter('themeActivite', $themeActivite);
                }
                if ($actionActivite != null) {
                    $activites
                        ->andWhere('a.Action LIKE :actionActivite')
                        ->setParameter('actionActivite', $actionActivite);
                }
                if ($commentaireActivite != null) {
                    $activites
                        ->andWhere('a.Commentaire LIKE :commentaireActivite')
                        ->setParameter('commentaireActivite', $commentaireActivite);
                }
                $activites = $activites->getQuery()->getResult();
            }

            if (str_contains($nomRecherche, 'Immeuble : ')) {
                $immeubles = $immeubleContactRepository->createQueryBuilder('ic')
                    ->addSelect('c')
                    ->leftJoin('ic.IDContact', 'c')
                    ->where('c.IDContact IS NOT NULL')
                    ->addSelect('i')
                    ->leftJoin('ic.IDImmeuble', 'i');

                if ($refProprioImmeuble != null) {
                    $immeubles
                        ->andWhere('i.ReferenceProprio LIKE :refProprioImmeuble')
                        ->setParameter('refProprioImmeuble', $refProprioImmeuble);
                }
                if ($origineContactImmeuble != null) {
                    $immeubles
                        ->andWhere('i.OrigineContact LIKE :origineContactImmeuble')
                        ->setParameter('origineContactImmeuble', $origineContactImmeuble);
                }
                if ($ncpcfImmeuble != null) {
                    $immeubles
                        ->andWhere('i.NCPCF LIKE :ncpcfImmeuble')
                        ->setParameter('ncpcfImmeuble', $ncpcfImmeuble);
                }
                if ($visiteImmeuble != null) {
                    $immeubles
                        ->andWhere('i.Visite LIKE :visiteImmeuble')
                        ->setParameter('visiteImmeuble', $visiteImmeuble);
                }
                // dd($qb);
                $immeubles = $immeubles->getQuery()->getResult();
            }

            if (str_contains($nomRecherche, 'Adresse : ')) {
                $adresses = $contactRepository->createQueryBuilder('c')
                    ->where('c.IDContact IS NOT NULL');

                if ($adresseAdresse != null) {
                    $adresses
                        ->andWhere('c.Adresse LIKE :adresseAdresse')
                        ->setParameter('adresseAdresse', $adresseAdresse);
                }
                if ($cpAdresse != null) {
                    $adresses
                        ->andWhere('c.CP LIKE :cpAdresse')
                        ->setParameter('cpAdresse', $cpAdresse);
                }
                if ($villeAdresse != null) {
                    $adresses
                        ->andWhere('c.Ville LIKE :villeAdresse')
                        ->setParameter('villeAdresse', $villeAdresse);
                }
                $adresses = $adresses->getQuery()->getResult();
            }

            if (str_contains($nomRecherche, 'Société : ')) {
                $societes = $societeContactRepository->createQueryBuilder('sc')
                    ->addSelect('c')
                    ->leftJoin('sc.IDContact', 'c')
                    ->addSelect('s')
                    ->leftJoin('sc.IDSociete', 's')
                    ->where('s.IDSociete IS NOT NULL');

                if ($etatDossierSociete != null) {
                    $societes
                        ->andWhere('s.EtatDossier LIKE :etatDossierSociete')
                        ->setParameter('etatDossierSociete', $etatDossierSociete);
                }
                if ($responsableSociete != null) {
                    $societes
                        ->andWhere('s.Responsable LIKE :responsableSociete')
                        ->setParameter('responsableSociete', $responsableSociete);
                }
                if ($origineContactSociete != null) {
                    $societes
                        ->andWhere('s.OrigineContact LIKE :origineContactSociete')
                        ->setParameter('origineContactSociete', $origineContactSociete);
                }
                if ($raisonSocialeVendeurSociete != null) {
                    $societes
                        ->andWhere('s.VendeurRaisonSociale LIKE :raisonSocialeVendeurSociete')
                        ->setParameter('raisonSocialeVendeurSociete', $raisonSocialeVendeurSociete);
                }
                if ($cpVendeurSociete != null) {
                    $societes
                        ->andWhere('s.VendeurCP LIKE :cpVendeurSociete')
                        ->setParameter('cpVendeurSociete', $cpVendeurSociete);
                }
                if ($raisonSocialeAcheteurSociete != null) {
                    $societes
                        ->andWhere('s.AcheteurRaisonSociale LIKE :raisonSocialeAcheteurSociete')
                        ->setParameter('raisonSocialeAcheteurSociete', $raisonSocialeAcheteurSociete);
                }
                if ($cpAcheteurSociete != null) {
                    $societes
                        ->andWhere('s.AcheteurCP LIKE :cpAcheteurSociete')
                        ->setParameter('cpAcheteurSociete', $cpAcheteurSociete);
                }
                $societes = $societes->getQuery()->getResult();
            }

            return $this->render(
                'contact/index.html.twig',
                [
                    'contacts' => $contacts,
                    'activites' => $activites,
                    'immeubles' => $immeubles,
                    'adresses' => $adresses,
                    'societes' => $societes,
                    'formSave' => $form->createView(),
                ]
            );
        } else {
            return $this->render('contact/index.html.twig', [
                'contacts' => $contactRepository->findBy(array(), array('IDContact' => 'desc'), 500, null),
                'activites' => $activites,
                'immeubles' => $immeubles,
                'adresses' => $adresses,
                'societes' => $societes,
                'recherchesImmeubles' => $rechercheContactRepository->findBy(array(), array('id' => 'desc'), 100, null),
                'formSave' => $form->createView(),
            ]);
        }
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

            if (count($keyValueContact) >= 1 && $form->get('rechercheContact')->isClicked() || $form->get('saveRechercheContact')->isClicked()) {
                $contacts = $contactRepository->findContactBySearch($rechercheContact);

                if ($form->get('saveRechercheContact')->isClicked() && $rechercheContact->getNomRecherche() != "") {
                    $savedContactName = "Contact : " . $rechercheContact->getNomRecherche();
                    $rechercheContact->setNomRecherche($savedContactName);
                    $rechercheContactRepository->save($rechercheContact, true);
                }
            } elseif (count($keyValueActivity) >= 1 && $form->get('rechercheActivite')->isClicked() || $form->get('saveRechercheActivite')->isClicked()) {
                $activites = $activiteRepository->findContactByActivity($rechercheContact);
                if ($form->get('saveRechercheActivite')->isClicked() && $rechercheContact->getNomRecherche() != "") {
                    $savedActiviteName = "Activite : " . $rechercheContact->getNomRecherche();
                    $rechercheContact->setNomRecherche($savedActiviteName);
                    $rechercheContactRepository->save($rechercheContact, true);
                }
            } elseif (count($keyValueImmeuble) >= 1 && $form->get('rechercheImmeuble')->isClicked() || $form->get('saveRechercheImmeuble')->isClicked()) {
                $immeublesContacts = $immeubleContactRepository->findContactByImmeuble($rechercheContact);
                if ($form->get('saveRechercheImmeuble')->isClicked() && $rechercheContact->getNomRecherche() != "") {
                    $savedImmeubleName = "Immeuble : " . $rechercheContact->getNomRecherche();
                    $rechercheContact->setNomRecherche($savedImmeubleName);
                    $rechercheContactRepository->save($rechercheContact, true);
                }
            } elseif (count($keyValueAdress) >= 1 && $form->get('rechercheAdresse')->isClicked() || $form->get('saveRechercheAdresse')->isClicked()) {
                $adresses = $contactRepository->findContactByAdress($rechercheContact);
                if ($form->get('saveRechercheAdresse')->isClicked() && $rechercheContact->getNomRecherche() != "") {
                    $savedAdresseName = "Adresse : " . $rechercheContact->getNomRecherche();
                    $rechercheContact->setNomRecherche($savedAdresseName);
                    $rechercheContactRepository->save($rechercheContact, true);
                }
            } elseif (count($keyValueSociete) >= 1 && $form->get('rechercheSociete')->isClicked() || $form->get('saveRechercheSociete')) {
                $societes = $societeContactRepository->findContactBySociete($rechercheContact);
                if ($form->get('saveRechercheSociete')->isClicked() && $rechercheContact->getNomRecherche() != "") {
                    $savedSocieteName = "Société : " . $rechercheContact->getNomRecherche();
                    $rechercheContact->setNomRecherche($savedSocieteName);
                    $rechercheContactRepository->save($rechercheContact, true);
                }
            } elseif (count($keyValueImmeuble) == 0 && count($keyValueContact) == 0 && count($keyValueActivity) == 0 && count($keyValueSociete) == 0 && count($keyValueAdress) == 0) {
                $contacts = $contactRepository->findBy(array(), null, 500, null);
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
                'contacts' => $contactRepository->findBy(array(), array('IDContact' => 'desc'), 500, null),
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
        if ($form->isSubmitted()) {
            $pays = $form->get('Pays')->getData();
            // dd($pays);
            $contact = $form->getData();
            // // Récupération des données du select
            $civilite = $form->get('Civilite')->getData();
            $fonction = $form->get('Fonction')->getData();
            $pays = $form->get('Pays')->getData();
            // dd($form->get('Pays')->getData());
            // // Set du libelle en bdd
            if ($civilite != null) {
                $contact->setCivilite($civilite->getLibelle());
            }
            if ($fonction != null) {
                $contact->setFonction($fonction->getLibelle());
            }
            if ($pays != null) {
                $contact->setPays($pays->getLibelle());
            }
            //dd($form->getData());

            $contact->setDateModification(new \DateTime());
            // dd($contact);
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

    public function getDefaultOptions(array $options)
    {
        return array(
            'csrf_protection' => false,
            // Rest of options omitted
        );
    }

    #[Route('/{IDContact}/edit', name: 'contact_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contact $contact, ContactRepository $contactRepository): Response
    {
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        //dd($form->isValid());
        if ($form->isSubmitted()) {
            // Modification des selects en bdd

            // // Récupération des données du form
            $contact = $form->getData();
            // // Récupération des données du select
            $civilite = $form->get('Civilite')->getData();
            $fonction = $form->get('Fonction')->getData();
            $pays = $form->get('Pays')->getData();
            // dd($form->get('Pays')->getData());
            // // Set du libelle en bdd
            if ($civilite != null) {
                $contact->setCivilite($civilite->getLibelle());
            }
            if ($fonction != null) {
                $contact->setFonction($fonction->getLibelle());
            }
            if ($pays != null) {
                $contact->setPays($pays->getLibelle());
            }

            $contact->setDateModification(new \DateTime());
            $contactRepository->save($contact, true);

            return $this->redirectToRoute('contact_show', ['IDContact' => $contact->getIDContact()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contact/edit.html.twig', [
            'contact' => $contact,
            'form' => $form,
        ]);
    }

    #[Route('/{IDContact}', name: 'contact_delete', methods: ['POST'])]
    public function delete(Request $request, Contact $contact, ContactRepository $contactRepository, ImmeubleContactRepository $immeubleContactRepository): Response
    {
        // dd($contact->getIDContact());
        // $toto = $immeubleContactRepository->findBy(['IDContact' => $contact->getIDContact()]);
        // $titi = [];
        // $titi = array_search('IDImmeubleContact', $toto);
        // dd($titi);
        // for ($i = 0; $i < count($toto); $i++) {
        //     dd($toto[$i] . IDImmeubleContact);
        //     //array_push($titi, $toto[$i] . IDImmeubleContact);
        // }
        //$immeubleContactRepository->remove
        if ($this->isCsrfTokenValid('delete' . $contact->getIDContact(), $request->request->get('_token'))) {
            $contactRepository->remove($contact, true);
        }

        return $this->redirectToRoute('contacts', [], Response::HTTP_SEE_OTHER);
    }
}
