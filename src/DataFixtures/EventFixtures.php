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
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 15; $i++) {
            $event = new Event();

            $event
                ->setTitle($faker->sentence)
                ->setStartDateEvent($faker->dateTimeThisMonth('now'))
                ->setEndDateEvent($faker->dateTimeBetween($event->getStartDateEvent(), '+5 days'))
                ->setDescription($faker->text(100))
                ->setBody($faker->text(600));

            $manager->persist($event);
        }
        $manager->flush();
    }
}
