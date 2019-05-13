<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Event;
use App\Repository\EventRepository;
use App\Form\EventType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController
{

    private $entityManager;
    private $EventRepository;

    public function __construct(ObjectManager $entityManager, EventRepository $EventRepository)
    {
        $this->EventRepository = $EventRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/admin", name="admin.event.index")
     */
    public function index()
    {
        $listEvent = $this->EventRepository->findAll();
        return $this->render('admin/event/index.html.twig', [
            'eventList' => $listEvent
        ]);
    }

    /**
     * @Route("/admin/event/{id}", name="admin.event.edit", methods="GET|POST")
     * @param Event $event
     * @param Request $request
     * @return Response
     */
    public function edit(Event $event, Request $request): Response
    {
        $editForm = $this->createForm(EventType::class, $event);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->entityManager->flush();
            $this->addFlash('success', 'The event has been successfully changed');
            return $this->redirectToRoute('admin.event.index');
        }
        return $this->render('admin/event/edit.html.twig', [
            'monEvent' => $event,
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
        $event = new Event();
        $createForm = $this->createForm(EventType::class, $event);
        $createForm->handleRequest($request);

        if ($createForm->isSubmitted() && $createForm->isValid()) {
            $this->entityManager->persist($event);
            $this->entityManager->flush();
            $this->addFlash('success', 'The event was successfully created');
            return $this->redirectToRoute('admin.event.index');
        }
        return $this->render('admin/event/create.html.twig', [
            'createEvent' => $event,
            'form' => $createForm->createView()
        ]);
    }

    /**
     * @Route("/admin/event/{id}", name="admin.event.delete", methods="DELETE")
     * @param Event $Event
     * @param Request $request
     * @return Response
     */
    public function delete(Event $Event, Request $request): Response
    {
        // On verifie si  le token associe au bouton Delete est valide
        if ($this->isCsrfTokenValid('delete' . $Event->getIdEvent(), $request->get('_token'))) {
            // On prepare la  suppression de l entite Event selectionne
            $this->entityManager->remove($Event);
            // On execute la requete de suppression - transaction
            $this->entityManager->flush();
            $this->addFlash('success', 'The event has been successfully deleted');
        };
        return $this->redirectToRoute('admin.event.index');
    }
}
