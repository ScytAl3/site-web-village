<?php

namespace App\Notification;

use App\Entity\Contact;
use Twig\Environment;

class ContactNotification
{

    /** 
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var Environment
     */
    private $renderer;

    public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;;
    }

    public function notify(Contact $contact)
    {
        $message = (new \Swift_Message( 'You have received a new message from'. $contact->getFirstName().' ' . $contact->getLastName()))
            ->setFrom('noreply@notre-dame-des-landes.fr')
            ->setTo('contact@notre-dame-des-landes.fr')
            ->setReplyTo($contact->getEmail())
            ->setBody($this->renderer->render( 'emails/contact.html.twig', [
                'contact' => $contact
            ]), 'text/html');

            $this->mailer->send($message);
     }
}
