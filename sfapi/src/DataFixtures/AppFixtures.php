<?php

namespace App\DataFixtures;

use App\Factory\CourseFactory;
use App\Factory\RoomFactory;
use App\Factory\StepFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Zenstruck\Foundry\Test\ResetDatabase;

class AppFixtures extends Fixture
{
    // use the trait to reset the database before loading the fixtures
    use ResetDatabase;

    public function load(ObjectManager $manager): void
    {

        // $product = new Product();
        // $manager->persist($product);

        CourseFactory::createMany(10);

        RoomFactory::createMany(50);

        StepFactory::createMany(50, function () {
            return [
                'course' => CourseFactory::random(),
                'room' => RoomFactory::random(),
            ];
        });

        $manager->flush();
    }
}
