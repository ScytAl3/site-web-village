<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $pwdEncoder;

    /**     
     * @param UserPasswordEncoderInterface $pwdEncoder
     */
    public function __construct(UserPasswordEncoderInterface $pwdEncoder)
    {
        $this->pwdEncoder = $pwdEncoder;
    }

    /**
     * @param ObjectManager $manager
     * @return User
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user
            ->setUsername('Admin')
            ->setRoles(array('ROLE_ADMIN'))
            ->setPassword($this->pwdEncoder->encodePassword($user, 'azerty'));

        $manager->persist($user);
        $manager->flush();
    }
}
