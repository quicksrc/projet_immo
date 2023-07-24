<?php

namespace App\Controller;

use App\Entity\Immeuble;
use App\Entity\RechercheImmeuble;
use App\Form\ImmeubleType;
use App\Form\SearchImmeubleType;
use App\Repository\ContactRepository;
use App\Repository\ImmeubleRepository;
use Doctrine\ORM\EntityManagerInterface;
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
            'immeubles' => $immeubleRepository->findBy(array(), null, 100, null),
            'contacts' => $contactRepository->findBy(array(), null, 100, null),
        ]);
    }

    #[Route('/search', name: 'immeuble_search')]
    public function search(ImmeubleRepository $immeubleRepository, ContactRepository $contactRepository, Request $request, EntityManagerInterface $em): Response
    {
        $rechercheImmeuble = new RechercheImmeuble();
        $form = $this->createForm(SearchImmeubleType::class, $rechercheImmeuble);
        $form->handleRequest($request);

        $immeubles = [];

        if ($form->isSubmitted() && $form->isValid()) {
            // $immeubles = $immeubleRepository->findBySearch($rechercheImmeuble, $em);
            $keyValue = [];
            $findByField = [];
            for ($i = 0; $i < 1; $i++) {
                if (!empty($rechercheImmeuble->getRefProprioImmeuble())) {
                    array_push($keyValue, array("ReferenceProprio", $rechercheImmeuble->getRefProprioImmeuble()));
                    // $immeubles = $immeubleRepository->findBy([$keyValue[0][0] => $keyValue[0][1]]);
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
            };

            $nameProperty = [];
            $valueProperty = [];
            for ($i = 0; $i < count($keyValue); $i++) {
                // array_push($findByField, "'" . $keyValue[$i][0] . "' => '" . $keyValue[$i][1] . "'");
                array_push($nameProperty, $keyValue[$i][0]);
                array_push($valueProperty, $keyValue[$i][1]);
                // $immeubles = $immeubleRepository->findBy([$keyValue[$i][0] => $keyValue[$i][1]]);
            }
            // dd(count($keyValue));
            if (count($keyValue) == 1) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0]));
            } elseif (count($keyValue) == 2) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1]));
            } elseif (count($keyValue) == 3) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2]));
            } elseif (count($keyValue) == 4) {
                $immeubles = $immeubleRepository->findBy(array($nameProperty[0] => $valueProperty[0], $nameProperty[1] => $valueProperty[1], $nameProperty[2] => $valueProperty[2], $nameProperty[3] => $valueProperty[3]));
            } else {
                $immeubles = $immeubleRepository->findBy(array(), null, 100, null);
            };


            return $this->render(
                'immeuble/search.html.twig',
                [
                    // 'list_immeubles' => $immeubleRepository->findBy(array(), null, 100, null),
                    'contacts' => $contactRepository->findBy(array(), null, 100, null),
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
                // 'list_immeubles' => $immeubleRepository->findBy(array(), null, 100, null),
                'contacts' => $contactRepository->findBy(array(), null, 100, null),
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
