<?php

namespace App\Tests\Entity;
use Cocur\Slugify\Slugify;

use PHPUnit\Framework\TestCase;
use App\Entity\Event;

class EventTest extends TestCase
{
    public function testgetSlug()
    {
        $event = new Event();
        $event->setTitle('Un Titre SANS tiret');
        $this->assertEquals('un titre sans tiret', $event->getSlug());
        $event->setTitle('Un Titre AVEC tiret');
        $this->assertEquals('un-titre-avec-tiret', $event->getSlug());
    }
}
