<?php

namespace App\Mailer;

use App\Entity\Contact;

class ContactMailer
{
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}
