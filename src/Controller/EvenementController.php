<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Response;

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
     * @Route("/evenement", name="evenement")
     *
     * @return Response
     */
    public function showAllEvent(): Response
    {
        $listEvent = $this->evenementRepository->findAll();
        return $this->render('evenement/index.html.twig', [
            'properties' => $listEvent
        ]);
    }
}
