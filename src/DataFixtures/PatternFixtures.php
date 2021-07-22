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
        $this->addReference('pattern1', $pattern);

        $pattern = new Pattern();
        $pattern->setName($faker->firstNameFemale());
        $pattern->setPhoto('http://bit.ly/2W9OsB9');
        $pattern->setType('Robe');
        $pattern->setFabricQuantity($faker->randomFloat(2, 0, 5));
        $manager->persist($pattern);
        $this->addReference('pattern2', $pattern);


        $pattern = new Pattern();
        $pattern->setName($faker->firstNameFemale());
        $pattern->setPhoto('http://bit.ly/3rw8qBx');
        $pattern->setType('Tunique');
        $pattern->setGender('Femme');
        $pattern->setFabricQuantity($faker->randomFloat(2, 0, 5));
        $manager->persist($pattern);
        $this->addReference('pattern3', $pattern);


        $pattern = new Pattern();
        $pattern->setName($faker->firstNameMale());
        $pattern->setPhoto('http://bit.ly/2V2yfNF');
        $pattern->setType('Chemise');
        $pattern->setGender('Homme');
        $pattern->setFabricQuantity($faker->randomFloat(2, 0, 5));
        $manager->persist($pattern);
        $this->addReference('pattern4', $pattern);





        $manager->flush();
    }
}
