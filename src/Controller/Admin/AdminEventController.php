<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;

class AdminEventController extends AbstractController
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
     * 
     * @return Response
     */
    public function index( PaginatorInterface $paginatorInterface, Request $request): Response
    {
        $listEvent = $paginatorInterface->paginate(
            $this->EventRepository->findAllQuery(),    /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10   /*limit per page*/
        );
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
            'myEvent' => $event,
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
            'myEvent' => $event,
            'form' => $createForm->createView()
        ]);
    }

    /**
     * @Route("/admin/event/{id}", name="admin.event.delete", methods="DELETE")
     * @param Event $event
     * @param Request $request
     * @return Response
     */
    public function delete(Event $event, Request $request): Response
    {
        // On verifie si  le token associe au bouton Delete est valide
        if ($this->isCsrfTokenValid('delete' . $event->getIdEvent(), $request->get('_token'))) {
            // On prepare la  suppression de l entite Event selectionne
            $this->entityManager->remove($event);
            // On execute la requete de suppression - transaction
            $this->entityManager->flush();
            $this->addFlash('success', 'The event has been successfully deleted');
        };
        return $this->redirectToRoute('admin.event.index');
    }
}
