<?php

namespace App\DataFixtures;

use App\Entity\Immeuble;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 100; $i++) {
            $immeuble = new Immeuble;
            $immeuble->setDescription($faker->sentence())
                ->setReferenceProprio(mt_rand(100, 200));

            $manager->persist($immeuble);
        }

        $manager->flush();
    }
}
