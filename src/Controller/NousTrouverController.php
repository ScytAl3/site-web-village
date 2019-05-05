<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NousTrouverController extends AbstractController
{
    /**
     * @Route("/nous/trouver", name="nous_trouver")
     */
    public function index()
    {
        return $this->render('nous_trouver/index.html.twig', [
            'controller_name' => 'NousTrouverController',
        ]);
    }
}
