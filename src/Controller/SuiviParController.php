<?php

namespace App\Controller;

use App\Entity\SuiviPar;
use App\Form\SuiviParType;
use App\Repository\SuiviParRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/suivi/par')]
class SuiviParController extends AbstractController
{
    #[Route('/', name: 'suivis_par', methods: ['GET'])]
    public function index(SuiviParRepository $suiviParRepository): Response
    {
        return $this->render('suivi_par/index.html.twig', [
            'suivi_pars' => $suiviParRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'suivi_par_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $suiviPar = new SuiviPar();
        $form = $this->createForm(SuiviParType::class, $suiviPar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($suiviPar);
            $entityManager->flush();

            // return $this->redirectToRoute('suivis_par', [], Response::HTTP_SEE_OTHER);

            echo '<script>history.go(-2);</script>';
        }

        return $this->render('suivi_par/new.html.twig', [
            'suivi_par' => $suiviPar,
            'form' => $form,
        ]);
    }

    #[Route('/{IDSuiviPar}', name: 'suivi_par_show', methods: ['GET'])]
    public function show(SuiviPar $suiviPar): Response
    {
        return $this->render('suivi_par/show.html.twig', [
            'suivi_par' => $suiviPar,
        ]);
    }

    #[Route('/{IDSuiviPar}/edit', name: 'suivi_par_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SuiviPar $suiviPar, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SuiviParType::class, $suiviPar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('suivis_par', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('suivi_par/edit.html.twig', [
            'suivi_par' => $suiviPar,
            'form' => $form,
        ]);
    }

    #[Route('/{IDSuiviPar}', name: 'suivi_par_delete', methods: ['POST'])]
    public function delete(Request $request, SuiviPar $suiviPar, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $suiviPar->getIDSuiviPar(), $request->request->get('_token'))) {
            $entityManager->remove($suiviPar);
            $entityManager->flush();
        }

        return $this->redirectToRoute('suivis_par', [], Response::HTTP_SEE_OTHER);
    }
}
