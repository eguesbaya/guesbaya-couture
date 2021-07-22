<?php

namespace App\DataFixtures;

use App\Entity\Fabric;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class FabricFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
            $linen = new Fabric();
            $linen->setName('Feuilles bleues');
            $linen->setPhoto('https://bit.ly/3ivs24K');
            $linen->setPriceByMetre(20);
            $linen->setType('lin');
            $manager->persist($linen);

            $cotton = new Fabric();
            $cotton->setName('Tie and dye');
            $cotton->setPhoto('https://bit.ly/2TwmkqW');
            $cotton->setPriceByMetre(8);
            $cotton->setType('cotton');
            $manager->persist($cotton);

            $viscose = new Fabric();
            $viscose->setName('Printemps');
            $viscose->setPhoto('https://bit.ly/2V1f3zF');
            $viscose->setPriceByMetre(12);
            $viscose->setType('viscose');
            $manager->persist($viscose);

            $denim = new Fabric();
            $denim->setName('Double Denim');
            $denim->setPhoto('https://bit.ly/2V3Sn1I');
            $denim->setPriceByMetre(15);
            $denim->setType('denim');
            $manager->persist($denim);

            $cotton = new Fabric();
            $cotton->setName('Blanc');
            $cotton->setPhoto('https://bit.ly/3iEbLKM');
            $cotton->setPriceByMetre(8);
            $cotton->setType('cotton');
            $manager->persist($cotton);

            $manager->flush();
    }
}
