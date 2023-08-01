<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Entity\Immeuble;
use App\Form\ActiviteType;
use App\Repository\ActiviteRepository;
use App\Repository\ImmeubleRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function Symfony\Component\DependencyInjection\Loader\Configurator\param;

#[Route('/activites')]
class ActiviteController extends AbstractController
{
    #[Route('/', name: 'activites', methods: ['GET'])]
    public function index(ActiviteRepository $activiteRepository): Response
    {
        return $this->render('activite/index.html.twig', [
            'activites' => $activiteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'activite_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ActiviteRepository $activiteRepository): Response
    {
        $activite = new Activite();
        $form = $this->createForm(ActiviteType::class, $activite);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $activiteRepository->save($activite, true);
            return $this->redirectToRoute('immeubles', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('activite/new.html.twig', [
            'activite' => $activite,
            'form' => $form,
        ]);
    }

    #[Route('/{IDActivite}', name: 'activite_show', methods: ['GET'])]
    public function show(Activite $activite): Response
    {
        return $this->render('activite/show.html.twig', [
            'activite' => $activite,
        ]);
    }

    #[Route('/{IDActivite}/edit', name: 'activite_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Activite $activite, ActiviteRepository $activiteRepository): Response
    {
        $form = $this->createForm(ActiviteType::class, $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $activiteRepository->save($activite, true);

            return $this->redirectToRoute('immeubles', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('activite/edit.html.twig', [
            'activite' => $activite,
            'form' => $form,
        ]);
    }

    #[Route('/{IDActivite}', name: 'activite_delete', methods: ['POST'])]
    public function delete(Request $request, Activite $activite, ActiviteRepository $activiteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $activite->getIDActivite(), $request->request->get('_token'))) {
            $activiteRepository->remove($activite, true);
        }

        return $this->redirectToRoute('immeubles', [], Response::HTTP_SEE_OTHER);
    }
}
