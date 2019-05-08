<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Evenement;
use App\Repository\EvenementRepository;
use App\Form\EvenementType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController
{

    private $entityManager;
    private $evenementRepository;

    public function __construct(ObjectManager $entityManager, EvenementRepository $evenementRepository)
    {
        $this->evenementRepository = $evenementRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/admin", name="admin.evenement.index")
     */
    public function index()
    {
        $listEvent = $this->evenementRepository->findAll();
        return $this->render('admin/evenement/index.html.twig', [
            'lesEvenements' => $listEvent
        ]);
    }

    /**
     * @Route("/admin/evenement/{id}", name="admin.evenement.edit")
     * @param Evenement $evenement
     * @param Request $request
     * @return Response
     */
    public function edit(Evenement $evenement, Request $request): Response
    {
        $editForm = $this->createForm(EvenementType::class, $evenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->entityManager->flush();
            $this->addFlash('success', 'L\'événement à été modifié avec succès');
            return $this->redirectToRoute('admin.evenement.index');
        }
        return $this->render('admin/evenement/edit.html.twig', [
            'monEvenement' => $evenement,
            'form' => $editForm->createView()
        ]);
    }

    /**
     * @Route("/admin/evenement", name="admin.evenement.create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $evenement = new Evenement();
        $createForm = $this->createForm(EvenementType::class, $evenement);
        $createForm->handleRequest($request);

        if ($createForm->isSubmitted() && $createForm->isValid()) {
            $this->entityManager->persist($evenement);
            $this->entityManager->flush();
            $this->addFlash('success', 'L\'événement à été créé avec succès');
            return $this->redirectToRoute('admin.evenement.index');
        }
        return $this->render('admin/evenement/create.html.twig', [
            'createEvent' => $evenement,
            'form' => $createForm->createView()
        ]);
    }
}
