<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Evenement;
use App\Repository\EvenementRepository;
use App\Form\EvenementType;
use Symfony\Component\HttpFoundation\Request;

class EvenementController extends AbstractController
{
    private $entityManager;
    private $evenementRepository;

    public function __construct(ObjectManager $entityManager, EvenementRepository $evenementRepository)
    {
        $this->evenementRepository = $evenementRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/evenement", name="evenement")
     */
    public function showEvent()
    {
        $listEvent = $this->evenementRepository->findAll();
        return $this->render('evenement/index.html.twig', [
            'properties' => $listEvent
        ]);
    }
}
