<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Measurement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MeasurementFixtures extends Fixture
{
    public const MAX_MEASUREMENTS = 20;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < self::MAX_MEASUREMENTS; $i++) {
            $measurement = new Measurement();
            $measurement->setShoulderWidth($faker->randomFloat(2,0,3));
            $measurement->setWaist($faker->randomFloat(2, 0, 3));
            $measurement->setRise($faker->randomFloat(2, 0, 3));
            $manager->persist($measurement);
            $this->addReference('measurement' . $i, $measurement);
        }
        

        $manager->flush();
    }
}
