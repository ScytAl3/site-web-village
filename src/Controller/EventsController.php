<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Event;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

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
