<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EventRepository;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use App\Notification\ContactNotification;

class MainWebsiteController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(EventRepository $EventRepository)
    {
        $currentEvent = $EventRepository->findCurrent();
        $nextEvent  = $EventRepository-> findNext();
        return $this->render('main_website/accueil.html.twig', [           
            'currentEvent' => $currentEvent,
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
     * @Route("/find-us", name="find-us")
     */
    public function findUs()
    {
        return $this->render('find-us/index.html.twig', [
            'current_menu' => 'find-us',
        ]);
    }

    /**
     * Call contact form
     * 
     * @Route("/contact", name="contact")
     * @param Request $request
     */
    public function contact(Request $request, ContactNotification $contactNotification)
    {
        // On instancie un nouvel  objet Contact
        $contact = new Contact();
        // On recupere le builder du formulaire associe a l entity contact
        $contactForm = $this->createForm(ContactType::class, $contact);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $contactNotification->notify($contact);
            $this->addFlash('success', 'Your message has been sent successfully');
            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'current_menu' => 'contact',
            'contactForm' => $contactForm->createView()
        ]);
    }
}
