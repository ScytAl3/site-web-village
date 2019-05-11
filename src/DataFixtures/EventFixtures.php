<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Event;
use Faker;

class EventFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // use the factory to create a Faker\Generator instance
        // create a French faker
        $faker = Faker\Factory::create('en_Us');

        for ($i = 1; $i <= 15; $i++) {
            $event = new Event();

            $event
                ->setTitle($faker->title)
                ->setStartDateEvent($faker->dateTimeThisMonth('now'))
                ->setEndDateEvent($faker->dateTimeBetween($event->getStartDateEvent(), '+5 day'))
                ->setDescription($faker->text(100))
                ->setBody($faker->text(600));

            $manager->persist($event);
        }
        $manager->flush();
    }
}
