<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
     {
         $this->passwordHasher = $passwordHasher;
     }

    public function load(ObjectManager $manager)
    {
        $client = new User();
        $client->setEmail('client@couture.com');
        $client->setFirstname('Client');
        $client->setLastname('Mystère');
        $client->setRoles(['User']);
        $client->setAddress('derrière chez toi');
        $client->setPassword($this->passwordHasher->hashPassword(
            $client,
            'client'
        ));
        $manager->persist($client);

        $manager->flush();
    }
}
