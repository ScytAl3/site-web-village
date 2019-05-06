<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Evenement;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // use the factory to create a Faker\Generator instance
        // create a French faker
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= 15; $i++) {
            $event = new Evenement();

            $event
                ->setTitre($faker->sentence)
                ->setDateDebutEvent($faker->dateTimeThisYear('now'))
                ->setDateFinEvent($faker->dateTimeBetween($event->getDateDebutEvent(), '+2 day'))
                ->setDescription($faker->sentence)
                ->setCorps($faker->text);

            $manager->persist($event);
        }
        $manager->flush();
    }
}
