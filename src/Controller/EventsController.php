<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Event;

class EventsController extends AbstractController
{

    private $entityManager;
    private $EventRepository;

    /**
     * Constructeur
     *
     * @param ObjectManager $entityManager
     * @param EventRepository $EventRepository
     */
    public function __construct(ObjectManager $entityManager, EventRepository $EventRepository)
    {
        // Initialisation du Repository Event
        $this->EventRepository = $EventRepository;
        // Initialisation de l entityManager
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/events/list", name="events.list")
     *
     * @return Response
     */
    public function showAllEvent(): Response
    {
        $listEvent = $this->EventRepository->findAll();
        return $this->render('events/list.html.twig', [
            'theEvents' => $listEvent,
            'current_menu' => 'eventsList'
        ]);
    }

    /**
     *@Route("/events/{slug}-{id}", name="events.show", requirements={"slug": "[a-z0-9\-]*"})
     *@param Event $Event
     * @return Response
     */
    public function show(Event $Event, string $slug): Response
    {
        $leSlug = $Event->getSlug();
        if ($leSlug !== $slug) {
            return $this->redirectToRoute('events.show', [
                'id' => $Event->getIdEvent(),
                'slug' => $leSlug
            ], 301);
        }
        return $this->render('events/show.html.twig', [
            'myEvent' => $Event
        ]);
    }
}
