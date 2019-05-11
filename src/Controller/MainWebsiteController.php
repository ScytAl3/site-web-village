<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EventRepository;

class MainWebsiteController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(EventRepository $EventRepository)
    {
        $nextEvent  = $EventRepository->findLatest();
        return $this->render('main_website/accueil.html.twig', [
            'nextEvent' => $nextEvent,
            'current_menu' => 'home'
        ]);
    }

    /**
     * @Route("/history", name="history")
     */
    public function history()
    {
        return $this->render('history/index.html.twig', [
            'current_menu' => 'history',
        ]);
    }

    /**
     * @Route("/find/us", name="find_us")
     */
    public function findUs()
    {
        return $this->render('find_us/index.html.twig', [
            'current_menu' => 'find_us',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('contact/index.html.twig', [
            'current_menu' => 'contact',
        ]);
    }
}
