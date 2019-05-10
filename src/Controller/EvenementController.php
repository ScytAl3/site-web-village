<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Evenement;

class EvenementController extends AbstractController
{
    private $entityManager;
    private $evenementRepository;

    public function __construct(ObjectManager $entityManager, EvenementRepository $evenementRepository)
    {
        // Initialisation du Repository Evenement
        $this->evenementRepository = $evenementRepository;
        // Initialisation de l entityManager
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/events", name="events.index")
     *
     * @return Response
     */
    public function showAllEvent(): Response
    {
        $listEvent = $this->evenementRepository->findAll();
        return $this->render('events/index.html.twig', [
            'theEvents' => $listEvent
        ]);
    }

    /**
     *@Route("/events/{slug}-{id}", name="events.show", requirements={"slug": "[a-z0-9\-]*"})
     *@param Evenement $evenement
     * @return Response
     */
    public function show(Evenement $evenement, string $slug): Response
    {
        $leSlug = $evenement->getSlug();
        if ($leSlug !== $slug) {
            return $this->redirectToRoute('events.show', [
                'id' => $evenement->getIdEvent(),
                'slug' => $leSlug
            ], 301);
        }
        return $this->render('events/show.html.twig', [
            'myEvent' => $evenement
        ]);
    }
}
