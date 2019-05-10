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
     * @Route("/admin", name="admin.event.index")
     */
    public function index()
    {
        $listEvent = $this->evenementRepository->findAll();
        return $this->render('admin/event/index.html.twig', [
            'eventList' => $listEvent
        ]);
    }

    /**
     * @Route("/admin/event/{id}", name="admin.event.edit", methods="GET|POST")
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
            $this->addFlash('success', 'The event has been successfully changed');
            return $this->redirectToRoute('admin.event.index');
        }
        return $this->render('admin/event/edit.html.twig', [
            'monEvenement' => $evenement,
            'form' => $editForm->createView()
        ]);
    }

    /**
     * @Route("/admin/event", name="admin.event.create")
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
            $this->addFlash('success', 'The event was successfully created');
            return $this->redirectToRoute('admin.event.index');
        }
        return $this->render('admin/event/create.html.twig', [
            'createEvent' => $evenement,
            'form' => $createForm->createView()
        ]);
    }

    /**
     * @Route("/admin/event/{id}", name="admin.event.delete", methods="DELETE")
     * @param Evenement $evenement
     * @param Request $request
     * @return Response
     */
    public function delete(Evenement $evenement, Request $request): Response
    {
        // On verifie si  le token associe au bouton Delete est valide
        if ($this->isCsrfTokenValid('delete' . $evenement->getIdEvent(), $request->get('_token'))) {
            // On prepare la  suppression de l entite evenement selectionne
            $this->entityManager->remove($evenement);
            // On execute la requete de suppression - transaction
            $this->entityManager->flush();
            $this->addFlash('success', 'The event has been successfully deleted');            
        };
        return $this->redirectToRoute('admin.event.index');
    }
}
