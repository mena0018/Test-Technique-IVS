<?php

namespace App\DataFixtures;

use App\Entity\Building;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BuildingFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=1; $i<11; $i++) {
            $building = new Building();
            $building->setNom("Building N° " . $i);
            $building->setZipcode( $faker->postcode);
            $manager->persist($building);
        }
        $manager->flush($building);
    }
}
