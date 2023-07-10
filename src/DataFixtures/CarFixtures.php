<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Car;
use App\Entity\CarCategory;
use Faker\Factory;

class CarFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));

        $carCategories = $manager->getRepository(CarCategory::class)->findAll();


        for ($i = 0; $i < 10; $i++) {
            $car = new Car();
            $car->setNbSeats($faker->numberBetween(2, 5));
            $car->setNbDoors($faker->numberBetween(2, 4));
            $car->setName($faker->vehicle);
            $car->setCost($faker->randomFloat(2, 10000, 50000));

            $carCategory = $faker->randomElement($carCategories);
            $car->setCategory($carCategory);

            $manager->persist($car);
        }

        $manager->flush();
    }
}
