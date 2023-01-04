<?php

namespace App\DataFixtures;

use App\Entity\Point;
use App\Entity\ServiceLocator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $point = new Point();
            $point->setName('Spain_'.$i);
            $point->setLatitude(mt_rand(10, 100));
            $point->setLongitude(mt_rand(10, 100));
            $manager->persist($point);
        }

        for ($i = 1; $i <= 10; $i++) {
            $point = new ServiceLocator();
            $point->setName('service_locator_'.$i);
            $manager->persist($point);
        }

        $manager->flush();
    }
}
