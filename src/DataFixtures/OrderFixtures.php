<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Order;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class OrderFixtures extends Fixture
{
    public const MAX_ORDERS = 15;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < self::MAX_ORDERS; $i ++) {
            $order = new Order();
            $order->setFabric();
            $order->setPattern($this->getReference('pattern' . rand(1,4)));
            $order->setMeasurement();
            $order->setShippingAddress($faker->address());
            $manager->persist($order);
        }


        $manager->flush();
    }
}
