<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Secutity\LoginFormAuthenticator;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="security.login")
     * @param Request $request
     */
    public function login(Request $request)
    {
        return $this->render('security/login.html.twig', [
            'current_menu' => 'security'
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    { }
}
