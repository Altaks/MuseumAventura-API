<?php

namespace App\Factory;

use App\Entity\Course;
use App\Enum\DifficultyEnum;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Course>
 */
final class CourseFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Course::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'description' => self::faker()->text(),
            'difficulty' => self::faker()->randomElement(DifficultyEnum::cases()),
            'thumbnail' => self::faker()->imageUrl(),
            'title' => self::faker()->text(50),
            'reward' => self::faker()->imageUrl(),
            'duration' => self::faker()->numberBetween(10, 45)
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this// ->afterInstantiate(function(Course $course): void {})
            ;
    }
}
