<?php

namespace App\Controller;

use App\Entity\Documents;
use App\Entity\Images;
use App\Entity\Immeuble;
use App\Entity\RechercheImmeuble;
use App\Form\ImmeubleType;
use App\Form\SaveSearchType;
use App\Form\SearchImmeubleType;
use App\Repository\ActiviteRepository;
use App\Repository\AdresseRepository;
use App\Repository\ContactRepository;
use App\Repository\DocumentsRepository;
use App\Repository\ImagesRepository;
use App\Repository\ImmeubleContactRepository;
use App\Repository\ImmeubleRepository;
use App\Repository\OpportuniteRepository;
use App\Repository\RechercheImmeubleRepository;
use App\Service\PdfService;
use Doctrine\Common\Collections\Expr\Value;
use Doctrine\ORM\Mapping\Id;
use Reflector;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/immeubles')]
class ImmeubleController extends AbstractController
{

    #[Route('/', name: 'immeubles')]
    public function index(ImmeubleRepository $immeubleRepository, RechercheImmeubleRepository $rechercheImmeubleRepository, Request $request, AdresseRepository $adresseRepository, ImmeubleContactRepository $immeubleContactRepository, ActiviteRepository $activiteRepository): Response
    {
        /** @var $form symfony\component\form\clickableinterface */
        $form = $this->createForm(SaveSearchType::class);
        $form->handleRequest($request);

        $immeubles = [];
        $contacts = [];
        $adresses = [];
        $activites = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $datas = (array)$form->get('nomRecherche')->getData();
            $array =  array_values($datas);
            if ($array == []) {
                return $this->render('immeuble/index.html.twig', [
                    'immeubles' => $immeubleRepository->findBy(array(), array('ReferenceProprio' => 'desc'), 100, null),
                    'adresses' => $adresses,
                    'contacts' => $contacts,
                    'activites' => $activites,
                    'recherchesImmeubles' => $rechercheImmeubleRepository->findBy(array(), array('id' => 'desc'), 100, null),
                    'formSave' => $form->createView(),
                ]);
            }
            $id = $array[0];
            $refProprioImmeuble = $array[1];
            $numPlanchCada = $array[2];
            $etatDossier = $array[3];
            $enquete = $array[4];
            $dateEnquete = $array[5];
            $description = $array[6];
            $suiviPar = $array[7];
            $vendu = $array[8];
            $ncpcf = $array[9];
            $origineContact = $array[10];
            $visite = $array[11];
            $commentaire = $array[12];
            $numPrincipal = $array[13];
            $typeVoie = $array[14];
            $nomRue = $array[15];
            $adresse = $array[16];
            $cp = $array[17];
            $ville = $array[18];
            $nomContact = $array[19];
            $RCS = $array[20];
            $email = $array[21];
            $civiliteContact = $array[22];
            $prenomContact = $array[23];
            $dateActivite = $array[24];
            $theme = $array[25];
            $nomRecherche = $array[26];

            if (str_contains($nomRecherche, 'Immeuble : ')) {
                $immeubles = $immeubleRepository->createQueryBuilder('i')
                    ->where('i.IDImmeuble IS NOT NULL');
                if ($refProprioImmeuble != null) {
                    $immeubles
                        ->andWhere('i.ReferenceProprio LIKE :refProprioImmeuble')
                        ->setParameter('refProprioImmeuble', $refProprioImmeuble);
                }
                if ($origineContact != null) {
                    $immeubles
                        ->andWhere('i.OrigineContact LIKE :origineContact')
                        ->setParameter('origineContact', $origineContact);
                }
                if ($ncpcf != null) {
                    $immeubles
                        ->andWhere('i.NCPCF LIKE :ncpcf')
                        ->setParameter('ncpcf', $ncpcf);
                }
                if ($visite != null) {
                    $immeubles
                        ->andWhere('i.Visite LIKE :visite')
                        ->setParameter('visite', $visite);
                }
                if ($etatDossier != null) {
                    $immeubles
                        ->andWhere('i.EtatDossier LIKE :etatDossier')
                        ->setParameter('etatDossier', $etatDossier);
                }

                $immeubles = $immeubles->getQuery()->getResult();
            } elseif (str_contains($nomRecherche, 'Adresse : ')) {

                $adresses = $adresseRepository->createQueryBuilder('a')
                    ->addSelect('i')
                    ->leftJoin('a.IDImmeuble', 'i')
                    ->where('i.IDImmeuble IS NOT NULL');


                if ($numPrincipal != null) {
                    $adresses
                        ->andWhere('a.NumPrincipal LIKE :numPrincipal')
                        ->setParameter('numPrincipal', $numPrincipal);
                }
                if ($typeVoie != null) {
                    $adresses
                        ->andWhere('a.TypeVoie LIKE :typeVoie')
                        ->setParameter('typeVoie', $typeVoie);
                }
                if ($nomRue != null) {
                    $adresses
                        ->andWhere('a.Adresse LIKE :nomRue')
                        ->setParameter('nomRue', $nomRue);
                }
                if ($cp != null) {
                    $adresses
                        ->andWhere('a.CP LIKE :cp')
                        ->setParameter('cp', $cp);
                }
                if ($ville != null) {
                    $adresses
                        ->andWhere('a.Ville LIKE :ville')
                        ->setParameter('ville', $ville);
                }

                $adresses = $adresses->getQuery()->getResult();
            } elseif (str_contains($nomRecherche, 'Contact : ')) {

                $contacts = $immeubleContactRepository->createQueryBuilder('ic')
                    ->addSelect('c')
                    ->leftJoin('ic.IDContact', 'c')
                    ->addSelect('i')
                    ->leftJoin('ic.IDImmeuble', 'i')
                    ->where('i.IDImmeuble IS NOT NULL');

                if ($nomContact != null) {
                    $contacts
                        ->andWhere('c.Nom LIKE :nomContact')
                        ->setParameter('nomContact', $nomContact);
                }
                if ($prenomContact != null) {
                    $contacts
                        ->andWhere('c.Prenom LIKE :prenomContact')
                        ->setParameter('prenomContact', $prenomContact);
                }
                if ($RCS != null) {
                    $contacts
                        ->andWhere('c.RCS LIKE :RCS')
                        ->setParameter('RCS', $RCS);
                }
                if ($email != null) {
                    $contacts
                        ->andWhere('c.Email LIKE :Email')
                        ->setParameter('Email', $email);
                }
                if ($civiliteContact != null) {
                    $contacts
                        ->andWhere('c.Civilite LIKE :civiliteContact')
                        ->setParameter('civiliteContact', $civiliteContact);
                }

                $contacts = $contacts->getQuery()->getResult();
            } elseif (str_contains($nomRecherche, 'Activite : ')) {

                $activites = $activiteRepository->createQueryBuilder('a')
                    ->addSelect('i')
                    ->leftJoin('a.IDImmeuble', 'i')
                    ->where('i.IDImmeuble IS NOT NULL');

                if ($dateActivite != null) {
                    $activites
                        ->andWhere('a.DateActivite LIKE :dateActivite')
                        ->setParameter('dateActivite', $dateActivite->format('Y-m-d 00:00:00'));
                }
                if ($theme != null) {
                    $activites
                        ->andWhere('a.Theme LIKE :theme')
                        ->setParameter('theme', $theme);
                }

                $activites = $activites->getQuery()->getResult();
            }
            return $this->render(
                'immeuble/index.html.twig',
                [
                    'immeubles' => $immeubles,
                    'adresses' => $adresses,
                    'contacts' => $contacts,
                    'activites' => $activites,
                    'formSave' => $form->createView(),
                ]
            );
        } else {
            return $this->render('immeuble/index.html.twig', [
                'immeubles' => $immeubleRepository->findBy(array(), array('ReferenceProprio' => 'desc'), 100, null),
                'adresses' => $adresses,
                'contacts' => $contacts,
                'activites' => $activites,
                'recherchesImmeubles' => $rechercheImmeubleRepository->findBy(array(), array('id' => 'desc'), 100, null),
                'formSave' => $form->createView(),
            ]);
        }
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
                if (!empty($rechercheImmeuble->getEtatDossier())) {
                    array_push($keyValue, array("EtatDossier", $rechercheImmeuble->getEtatDossier()));
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

            if (count($keyValue) >= 1 && $form->get('rechercheImmeuble')->isClicked() || $form->get('saveRechercheImmeuble')->isClicked()) {
                $immeubles = $immeubleRepository->findImmeubleBySearch($rechercheImmeuble);
                if ($form->get('saveRechercheImmeuble')->isClicked() && $rechercheImmeuble->getNomRecherche() != "") {
                    $savedImmeubleName = "Immeuble : " . $rechercheImmeuble->getNomRecherche();
                    $rechercheImmeuble->setNomRecherche($savedImmeubleName);
                    $rechercheImmeubleRepository->enregistrer($rechercheImmeuble, true);
                }
            } elseif (count($keyValueAdress) >= 1 && $form->get('rechercheAdresse')->isClicked() || $form->get('saveRechercheImmeubleAdress')->isClicked()) {
                $adresses = $adresseRepository->findImmeubleByAdress($rechercheImmeuble);
                if ($form->get('saveRechercheImmeubleAdress')->isClicked() && $rechercheImmeuble->getNomRecherche() != "") {
                    $savedAdressName = "Adresse : " . $rechercheImmeuble->getNomRecherche();
                    $rechercheImmeuble->setNomRecherche($savedAdressName);
                    $rechercheImmeubleRepository->enregistrer($rechercheImmeuble, true);
                }
            } elseif (count($keyValueContact) >= 1 && $form->get('rechercheContact')->isClicked() || $form->get('saveRechercheImmeubleContact')->isClicked()) {
                $contacts = $immeubleContactRepository->findImmeubleByFieldsContact($rechercheImmeuble);
                if ($form->get('saveRechercheImmeubleContact')->isClicked() && $rechercheImmeuble->getNomRecherche() != "") {
                    $savedContactName = "Contact : " . $rechercheImmeuble->getNomRecherche();
                    $rechercheImmeuble->setNomRecherche($savedContactName);
                    $rechercheImmeubleRepository->enregistrer($rechercheImmeuble, true);
                }
            } elseif (count($keyValueActivity) >= 1 && $form->get('rechercheActivite')->isClicked() || $form->get('saveRechercheImmeubleActivite')->isClicked()) {
                $activites = $activiteRepository->findImmeubleByActivity($rechercheImmeuble);
                if ($form->get('saveRechercheImmeubleActivite')->isClicked() && $rechercheImmeuble->getNomRecherche() != "") {
                    $savedActiviteName = "Activite : " . $rechercheImmeuble->getNomRecherche();
                    $rechercheImmeuble->setNomRecherche($savedActiviteName);
                    $rechercheImmeubleRepository->enregistrer($rechercheImmeuble, true);
                }
            } elseif (count($keyValue) == 0 && count($keyValueContact) == 0 && count($keyValueActivity) == 0) {
                $immeubles = $immeubleRepository->findBy(array(), null, 100, null);
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
                'immeubles' => $immeubleRepository->findBy(array(), array('IDImmeuble' => 'desc'), 100, null),
                'recherchesImmeubles' => $rechercheImmeubleRepository->findBy(array(), array('id' => 'desc'), 100, null),
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

    #[Route('/img/delete/{id}', name: 'immeubles_delete_img', methods: ['DELETE'])]
    public function deleteImage(Images $image, Request $request, ImagesRepository $imagesRepository)
    {
        $data = json_decode($request->getContent(), true);

        // On vérifie si le token est valide
        if ($this->isCsrfTokenValid('delete' . $image->getId(), $data['_token'])) {
            // On récupère le nom de l'image
            $nom = $image->getName();
            // On supprime le fichier
            unlink($this->getParameter('img_immeuble_directory') . '/' . $nom);

            // On supprime l'entrée de la base
            $imagesRepository->remove($image, true);

            // On répond en json
            return new JsonResponse(['success' => 1]);
        } else {
            return new JsonResponse(['error' => 'Token Invalide'], 400);
        }
    }

    #[Route('/doc/delete/{id}', name: 'immeubles_delete_doc', methods: ['DELETE'])]
    public function deleteDocument(Documents $document, Request $request, DocumentsRepository $documentsRepository)
    {
        $data = json_decode($request->getContent(), true);

        // On vérifie si le token est valide
        if ($this->isCsrfTokenValid('delete' . $document->getId(), $data['_token'])) {
            // On récupère le nom de l'image
            $nom = $document->getName();
            // On supprime le fichier
            unlink($this->getParameter('doc_immeuble_directory') . '/' . $nom);

            // On supprime l'entrée de la base
            $documentsRepository->remove($document, true);

            // On répond en json
            return new JsonResponse(['success' => 1]);
        } else {
            return new JsonResponse(['error' => 'Token Invalide'], 400);
        }
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


            // Upload Image
            $images = $form->get('images')->getData();
            foreach ($images as $image) {
                $imageName = md5('IMG' . '_' . uniqid()) . '-' . $immeuble->getIDImmeuble() . '.' . $image->guessExtension();
                $image->move($this->getParameter('img_immeuble_directory'), $imageName);

                $img = new Images();
                $img->setName($imageName);
                $immeuble->addImage($img);
            }
            // dd($photos);

            // Upload PDF
            $documents = $form->get('documents')->getData();
            foreach ($documents as $document) {
                $documentName = 'PDF' . '_' . $immeuble->getIDImmeuble() . $document->getClientOriginalName();
                $document->move($this->getParameter('doc_immeuble_directory'), $documentName);
                $doc = new Documents();
                $doc->setName($documentName);
                $immeuble->addDocument($doc);
            }


            $immeubleRepository->save($immeuble, true);

            return $this->redirectToRoute('immeuble_show', ['IDImmeuble' => $immeuble->getIDImmeuble()], Response::HTTP_SEE_OTHER);
        };

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
