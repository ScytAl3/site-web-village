<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Evenement;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $event1 = new Evenement();
        $event1
            ->setTitre('Mon premier événement')
            ->setSlug('premier-evenement')
            ->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry.')
            ->setCorps('Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, 
            making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, 
            consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. 
            Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC.
            This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..",
            comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. 
            Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, 
            accompanied by English versions from the 1914 translation by H. Rackham.');

        $manager->persist($event1);

        $event2 = new Evenement();
        $event2
            ->setTitre('Mon deuxième événement')
            ->setSlug('deuxieme-evenement')
            ->setDescription('Exercitation ea anim laboris aliquip laboris quis duis nulla fugiat sunt anim.')
            ->setCorps('Ex adipisicing consectetur consectetur sunt mollit sunt ea ut ullamco nulla exercitation mollit commodo elit.
            Eu est enim consectetur duis nostrud minim enim occaecat exercitation anim aliqua. Veniam culpa sunt id amet. Veniam voluptate aliqua velit fugiat anim sunt in. 
            Tempor proident consequat velit in ullamco ullamco ullamco id culpa reprehenderit magna consectetur excepteur occaecat.
             Duis quis laboris incididunt officia cupidatat irure consequat ullamco non esse sunt.
             Incididunt aliquip excepteur nisi tempor labore ipsum labore ad. Eiusmod velit exercitation velit Lorem non sit ullamco velit ullamco ex irure pariatur pariatur. 
            Amet labore sint velit ut velit esse id quis aliqua. Pariatur nisi aliquip ipsum amet consequat quis nulla ut. Labore pariatur excepteur aliqua irure.');

        $manager->persist($event2);
        $manager->flush();
    }
}
