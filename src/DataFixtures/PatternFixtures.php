<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Pattern;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PatternFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $pattern = new Pattern();
        $pattern->setName($faker->firstNameFemale());
        $pattern->setPhoto('https://bit.ly/36QDUZN');
        $pattern->setType('Pantalon');
        $pattern->setFabricQuantity($faker->randomFloat(2,0,5));
        $manager->persist($pattern);

        $manager->flush();
    }
}
