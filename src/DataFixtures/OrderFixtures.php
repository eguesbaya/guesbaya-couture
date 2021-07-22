<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Order;
use App\DataFixtures\FabricFixtures;
use App\DataFixtures\PatternFixtures;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\MeasurementFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class OrderFixtures extends Fixture implements DependentFixtureInterface
{
    public const MAX_ORDERS = 15;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < self::MAX_ORDERS; $i ++) {
            $order = new Order();
            $order->setFabric($this->getReference('fabric' . rand(1,5)));
            $order->setPattern($this->getReference('pattern' . rand(1,4)));
            $order->setMeasurements($this->getReference('measurement' . $i));
            $order->setShippingAddress($faker->address());
            $order->setPrice($faker->randomNumber(3, false));
            $order->setStatus($this->getReference('pending'));
            $manager->persist($order);
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            FabricFixtures::class,
            PatternFixtures::class,
            MeasurementFixtures::class,
        ];
    }
}
