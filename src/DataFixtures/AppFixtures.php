<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $this->loadCarFixtures($manager);
        $this->loadCarCategoryFixtures($manager);

        $manager->flush();
    }

    private function loadCarFixtures(ObjectManager $manager)
    {
        $carFixtures = new CarFixtures();
        $carFixtures->load($manager);
    }

    private function loadCarCategoryFixtures(ObjectManager $manager)
    {
        $carCategoryFixtures = new CarCategoryFixtures();
        $carCategoryFixtures->load($manager);
    }
}
