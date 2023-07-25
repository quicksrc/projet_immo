<?php

namespace App\Controller;

use App\Entity\Immeuble;
use App\Entity\RechercheImmeuble;
use App\Form\ImmeubleType;
use App\Form\SearchImmeubleType;
use App\Repository\ContactRepository;
use App\Repository\ImmeubleContactRepository;
use App\Repository\ImmeubleRepository;
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
    public function search(ImmeubleRepository $immeubleRepository, ImmeubleContactRepository $immeubleContactRepository, Request $request): Response
    {
        // Recherche avancée
        $rechercheImmeuble = new RechercheImmeuble();
        $form = $this->createForm(SearchImmeubleType::class, $rechercheImmeuble);
        $form->handleRequest($request);

        // $immeubles => Array pour afficher les immeubles
        $immeubles = [];

        // $contacts => Array pour afficher les contacts
        $contacts = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $contacts = $immeubleContactRepository->findImmeubleByContact($rechercheImmeuble);
            dd($contacts);
            $keyValue = [];

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
                    array_push($keyValue, array("NumPrincipal", $rechercheImmeuble->getNumPrincipal()));
                }
                if (!empty($rechercheImmeuble->getTypeVoie())) {
                    array_push($keyValue, array("TypeVoie", $rechercheImmeuble->getTypeVoie()));
                }
                if (!empty($rechercheImmeuble->getNomRue())) {
                    array_push($keyValue, array("NomRue", $rechercheImmeuble->getNomRue()));
                }
                if (!empty($rechercheImmeuble->getCp())) {
                    array_push($keyValue, array("CP", $rechercheImmeuble->getCp()));
                }
                if (!empty($rechercheImmeuble->getVille())) {
                    array_push($keyValue, array("Ville", $rechercheImmeuble->getVille()));
                }
            };

            // Push les noms et valeurs des propriétés dans un Array
            $nameProperty = [];
            $valueProperty = [];
            for ($i = 0; $i < count($keyValue); $i++) {
                array_push($nameProperty, $keyValue[$i][0]);
                array_push($valueProperty, $keyValue[$i][1]);
            }
            // Requête pour afficher les immeubles par recherche générale/par adresse
            if (count($keyValue) == 1) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0]));
            } elseif (count($keyValue) == 2) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1]));
            } elseif (count($keyValue) == 3) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2]));
            } elseif (count($keyValue) == 4) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2], $nameProperty[3] => $valueProperty[3]));
            } elseif (count($keyValue) == 5) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2], $nameProperty[3] => $valueProperty[3], $nameProperty[4] => $valueProperty[4]));
            } elseif (count($keyValue) == 6) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2], $nameProperty[3] => $valueProperty[3], $nameProperty[4] => $valueProperty[4], $nameProperty[5] => $valueProperty[5]));
            } elseif (count($keyValue) == 7) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2], $nameProperty[3] => $valueProperty[3], $nameProperty[4] => $valueProperty[4], $nameProperty[5] => $valueProperty[5], $nameProperty[6] => $valueProperty[6]));
            } elseif (count($keyValue) == 8) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2], $nameProperty[3] => $valueProperty[3], $nameProperty[4] => $valueProperty[4], $nameProperty[5] => $valueProperty[5], $nameProperty[6] => $valueProperty[6], $nameProperty[7] => $valueProperty[7]));
            } elseif (count($keyValue) == 9) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2], $nameProperty[3] => $valueProperty[3], $nameProperty[4] => $valueProperty[4], $nameProperty[5] => $valueProperty[5], $nameProperty[6] => $valueProperty[6], $nameProperty[7] => $valueProperty[7], $nameProperty[8] => $valueProperty[8]));
            } else {
                $immeubles = $immeubleRepository->findBy(array(), null, 100, null);
            };

            // Requête pour afficher les immeubles par recherche générale/par adresse
            if (count($keyValue) == 1) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0]));
            } elseif (count($keyValue) == 2) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1]));
            } elseif (count($keyValue) == 3) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2]));
            } elseif (count($keyValue) == 4) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2], $nameProperty[3] => $valueProperty[3]));
            } elseif (count($keyValue) == 5) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2], $nameProperty[3] => $valueProperty[3], $nameProperty[4] => $valueProperty[4]));
            } elseif (count($keyValue) == 6) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2], $nameProperty[3] => $valueProperty[3], $nameProperty[4] => $valueProperty[4], $nameProperty[5] => $valueProperty[5]));
            } elseif (count($keyValue) == 7) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2], $nameProperty[3] => $valueProperty[3], $nameProperty[4] => $valueProperty[4], $nameProperty[5] => $valueProperty[5], $nameProperty[6] => $valueProperty[6]));
            } elseif (count($keyValue) == 8) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2], $nameProperty[3] => $valueProperty[3], $nameProperty[4] => $valueProperty[4], $nameProperty[5] => $valueProperty[5], $nameProperty[6] => $valueProperty[6], $nameProperty[7] => $valueProperty[7]));
            } elseif (count($keyValue) == 9) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2], $nameProperty[3] => $valueProperty[3], $nameProperty[4] => $valueProperty[4], $nameProperty[5] => $valueProperty[5], $nameProperty[6] => $valueProperty[6], $nameProperty[7] => $valueProperty[7], $nameProperty[8] => $valueProperty[8]));
            } else {
                $immeubles = $immeubleRepository->findBy(array(), null, 100, null);
            };


            return $this->render(
                'immeuble/search.html.twig',
                [
                    // 'list_immeubles' => $immeubleRepository->findBy(array(), null, 100, null),
                    'contacts' => $contacts,
                    'immeubles' => $immeubles,
                    'form' => $form,
                ]
            );
        }

        // $referenceProprio = $rechercheImmeuble->getRefProprioImmeuble();
        // $numPlanchCada = $rechercheImmeuble->getNumPlanchCada();
        // $etatDossier = $rechercheImmeuble->getEtatDossier();
        // $enquete = $rechercheImmeuble->getEnquete();
        // $dateEnquete = $rechercheImmeuble->getDateEnquete();
        // $description = $rechercheImmeuble->getDescription();
        // $suiviPar = $rechercheImmeuble->getSuiviPar();
        // $vendu = $rechercheImmeuble->isVendu();
        // $ncpcf = $rechercheImmeuble->isNcpcf();
        // $origineContact = $rechercheImmeuble->getOrigineContact();
        // $visite = $rechercheImmeuble->isVisite();
        // $commentaire = $rechercheImmeuble->getCommentaire();
        // if ($description != "" && $referenceProprio != "" && $vendu != "") {
        //     $immeubles = $immeubleRepository->findBy(['Description' => $description, 'ReferenceProprio' => $referenceProprio, 'Vendu' => $vendu]);
        // } elseif ($description != "" && $referenceProprio != "") {
        //     $immeubles = $immeubleRepository->findBy(['Description' => $description, 'ReferenceProprio' => $referenceProprio]);
        // } elseif ($description != "" && $vendu != "") {
        //     $immeubles = $immeubleRepository->findBy(['Description' => $description, 'Vendu' => $vendu]);
        // } elseif ($referenceProprio != "" && $vendu != "") {
        //     $immeubles = $immeubleRepository->findBy(['ReferenceProprio' => $referenceProprio, 'Vendu' => $vendu]);
        // } elseif ($description != "") {
        //     $immeubles = $immeubleRepository->findBy(['Description' => $description]);
        // } elseif ($referenceProprio != "") {
        //     $immeubles = $immeubleRepository->findBy(['ReferenceProprio' => $referenceProprio]);
        // } elseif ($vendu != "") {
        //     $immeubles = $immeubleRepository->findBy(['Vendu' => $vendu]);
        // $immeubles = $immeubleRepository->createQueryBuilder('i')
        //     ->where('i.SuiviPar LIKE :suiviPar')
        //     ->setParameter()
        //     ->getQuery()
        //     ->getResult();
        // } else {
        //     $immeubles = $immeubleRepository->findBy(array(), null, 100, null);
        // }
        return $this->render(
            'immeuble/search.html.twig',
            [
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
    public function show(Immeuble $immeuble): Response
    {
        return $this->render('immeuble/show.html.twig', [
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

    #[Route('/{IDImmeuble}', name: 'immeuble_delete', methods: ['POST'])]
    public function delete(Request $request, Immeuble $immeuble, ImmeubleRepository $immeubleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $immeuble->getIDImmeuble(), $request->request->get('_token'))) {
            $immeubleRepository->remove($immeuble, true);
        }

        return $this->redirectToRoute('immeubles', [], Response::HTTP_SEE_OTHER);
    }
}
