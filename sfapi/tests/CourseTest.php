<?php

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use App\Factory\CourseFactory;
use App\Factory\RoomFactory;
use App\Factory\StepFactory;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class CourseTest extends ApiTestCase
{

    // Use of the ResetDatabase and Factories traits to reset the database before starting and use factories during the test suite execution
    use ResetDatabase, Factories;


    /**
     * Test on the GetCollection operation on the Course ApiResource
     * Asserts the route `/api/courses` returns a 200 status code
     * @covers \App\Entity\Course
     */
    public function test_course_get_collection()
    {
        // Generate data
        CourseFactory::createMany(10);
        RoomFactory::createMany(50);
        StepFactory::createMany(50, function () {
            return [
                'course' => CourseFactory::random(),
                'room' => RoomFactory::random(),
            ];
        });

        // Execute the request
        static::createClient()->request('GET', '/api/courses');

        // Asserts chain
        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(200);
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
        $this->assertJsonContains([
            'totalItems' => 10
        ]);
    }


    /**
     * Test on the Get operation on the Course ApiResource
     * Asserts the route `/api/courses/{id}` returns a 200 status code
     * @covers \App\Entity\Course
     */
    public function test_course_get_unique_valid_domain()
    {
        // Generate data
        $courses = CourseFactory::createMany(1);
        RoomFactory::createMany(50);
        StepFactory::createMany(50, function () {
            return [
                'course' => CourseFactory::random(),
                'room' => RoomFactory::random(),
            ];
        });

        // Execute the request
        static::createClient()->request('GET', '/api/courses/'.$courses[0]->getId());

        // Asserts chain
        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(200);
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
    }

    /**
     * Test on the Get operation for a non-existing Course ApiResource
     * Asserts the route `/api/courses/{id}` with an invalid id returns a 404 status code
     * @covers \App\Entity\Course
     */
    public function test_course_get_unique_invalid_domain()
    {
        // Execute the request
        static::createClient()->request('GET', '/api/courses/-1');

        // Asserts chain
        $this->assertResponseStatusCodeSame(404);
    }

}