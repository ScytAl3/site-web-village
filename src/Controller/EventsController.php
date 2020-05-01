<?php

namespace App\Controller;

use App\Entity\Event;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventsController extends AbstractController
{

    private $entityManager;
    private $EventRepository;

    /**
     * Constructeur
     *
     * @param EntityManagerInterface $entityManager
     * @param EventRepository $EventRepository
     */
    public function __construct(EntityManagerInterface $entityManager, EventRepository $EventRepository)
    {
        // Initialisation du Repository Event
        $this->EventRepository = $EventRepository;
        // Initialisation de l entityManager
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/{_locale}/events/list", name="events.list", requirements={"_locale"="%app.locales%"})
     *
     * @return Response
     */
    public function showAllEvent(PaginatorInterface $paginatorInterface, Request $request): Response
    {
        $listEvent = $paginatorInterface->paginate(
            $this->EventRepository-> findAllQuery(),    /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            6   /*limit per page*/
        );
        return $this->render('events/list.html.twig', [
            'theEvents' => $listEvent,
            'current_menu' => 'eventsList'
        ]);
    }

    /**
     * @Route("/{_locale}/events/{slug}-{id}",  name="events.show", requirements={"slug": "[a-z0-9\-]*", "_locale"="%app.locales%"})
     * @param Event $Event
     * @return Response
     */
    public function show(Event $Event, string $slug): Response
    {
        $leSlug = $Event->getSlug();
        if ($leSlug !== $slug) {
            return $this->redirectToRoute('events.show', [
                'id' => $Event->getIdEvent(),
                'slug' => $leSlug,
                'current_menu' => 'eventsList'
            ], 301);
        }
        return $this->render('events/show.html.twig', [
            'myEvent' => $Event,
            'current_menu' => 'eventsList'
        ]);
    }
}
