<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{
    private $passwordHasher;
    public const ROLES = [
        'ROLE_ADMIN',
        'ROLE_USER'
    ];

    public function __construct(UserPasswordHasherInterface $passwordHasher)
     {
         $this->passwordHasher = $passwordHasher;
     }

    public function load(ObjectManager $manager)
    {
        //DEMO CLIENT
        $client = new User();
        $client->setEmail('client@couture.com');
        $client->setFirstname('Client');
        $client->setLastname('Mystère');
        $client->setRoles([self::ROLES[1]]);
        $client->setAddress('derrière chez toi');
        $client->setPassword($this->passwordHasher->hashPassword(
            $client,
            'client'
        ));
        $manager->persist($client);

        //DEMO ADMIN
        $admin = new User();
        $admin->setEmail('admin@guesbaya-couture.com');
        $admin->setFirstname('Emma');
        $admin->setLastname('Guesbaya');
        $admin->setRoles([self::ROLES[0]]);
        $admin->setAddress('chez moi');
        $admin->setPassword($this->passwordHasher->hashPassword(
            $admin,
            'admin'
        ));
        $manager->persist($admin);


        $manager->flush();
    }
}
