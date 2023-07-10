<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\CarCategory;
use Faker\Factory;

class CarCategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));

        $uniqueCategories = [];

        for ($i = 0; $i < 5; $i++) {
            $carCategory = new CarCategory();
            $name = $faker->unique()->vehicleType;

            // Vérifiez que le nom de catégorie est unique
            while (in_array($name, $uniqueCategories)) {
                $name = $faker->unique()->vehicleType;
            }

            $carCategory->setName($name);
            $uniqueCategories[] = $name;

            $manager->persist($carCategory);
        }

        $manager->flush();
    }
}
