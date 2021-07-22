<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Measurement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MeasurementFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $measurement = new Measurement();
        $measurement->setShoulderWidth($faker->randomFloat(2,0,3));
        $measurement->setWaist($faker->randomFloat(2, 0, 3));
        $measurement->setRise($faker->randomFloat(2, 0, 3));
        $manager->persist($measurement);

        $manager->flush();
    }
}
