<?php

namespace App\DataFixtures;

use App\Entity\Piece;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PieceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=1; $i<11; $i++) {
            $piece = new Piece();
            $piece->setNom("Pièce N° " . $i);
            $piece->setNbPers($faker->numberBetween(1, 5));
            $manager->persist($piece);
        }
        $manager->flush($piece);
    }
}
