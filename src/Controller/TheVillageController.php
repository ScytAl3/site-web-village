<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EventRepository;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use App\Notification\ContactNotification;

class TheVillageController extends AbstractController
{
    /**
     * @Route("/{_locale}/home", name="home", requirements={"_locale"="%app.locales%"})
     */
    public function home(EventRepository $EventRepository)
    {
        $currentEvent = $EventRepository->findCurrent();
        $nextEvent  = $EventRepository->findNext();
        return $this->render('thevillage/home.html.twig', [
            'currentEvent' => $currentEvent,
            'nextEvent' => $nextEvent,
            'current_menu' => 'home'
        ]);
    }

    /**
     * @Route("/{_locale}/history", name="history", requirements={"_locale"="%app.locales%"})
     */
    public function history()
    {
        return $this->render('history/history.html.twig', [
            'current_menu' => 'history',
        ]);
    }

    /**
     * @Route("/{_locale}/find-us", name="find-us", requirements={"_locale"="%app.locales%"})
     */
    public function findUs()
    {
        return $this->render('find-us/findus.html.twig', [
            'current_menu' => 'find-us',
        ]);
    }

    /**
     * Call contact form
     * 
     * @Route("/{_locale}/contact", name="contact", requirements={"_locale"="%app.locales%"})
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

        return $this->render('contact/contact.html.twig', [
            'current_menu' => 'contact',
            'contactForm' => $contactForm->createView()
        ]);
    }
}
