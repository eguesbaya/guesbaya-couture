<?php

namespace App\DataFixtures;

use App\Entity\Status;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class StatusFixtures extends Fixture
{
    public const STATE = [
        'pending',
        'completed',
        'shipped',
        'claim opened',
        'closed'
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::STATE as $state) {
            $status = new Status();
            $status->setStatus($state);
            $manager->persist($status);
        }

        $manager->flush();
    }
}
