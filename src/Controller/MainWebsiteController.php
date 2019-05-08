<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EvenementRepository;

class MainWebsiteController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(EvenementRepository $evenementRepository)
    {
        $nextEvent  = $evenementRepository->findLatest();
        return $this->render('main_website/accueil.html.twig', [
            'prochain_evenement' => $nextEvent,
            'current_menu' => 'accueil'
        ]);
    }
}
