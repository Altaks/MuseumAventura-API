<?php

namespace App\Factory;

use App\Entity\Step;
use App\Enum\PuzzleTypeEnum;
use SebastianBergmann\LinesOfCode\IllogicalValuesException;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Step>
 */
final class StepFactory extends PersistentProxyObjectFactory
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
        return Step::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        // generate random mascot images and keep them to avoid incoherence
        $firstMascot = self::faker()->imageUrl(256, 256); // 256 px by 256 px
        $secondMascot = self::faker()->imageUrl(256, 256);

        // generate both type and activity content according to the chosen type
        $type = self::faker()->randomElement(PuzzleTypeEnum::cases());
        $activity = match ($type) {
            PuzzleTypeEnum::GUESSIMAGE_EASY => [
                'answers' => [
                    [
                        'type' => 'TEXT',
                        'src' => self::faker()->text(255),
                    ],
                    [
                        'type' => 'TEXT',
                        'src' => self::faker()->text(255),
                    ],
                    [
                        'type' => 'TEXT',
                        'src' => self::faker()->text(255),
                    ],
                    [
                        'type' => 'TEXT',
                        'src' => self::faker()->text(255),
                    ]
                ],
                'hints' => [
                    [
                        'text' => 'Hint ' . self::faker()->text(255),
                        'image' => self::faker()->imageUrl(),
                    ],
                    [
                        'text' => 'Hint ' . self::faker()->text(255),
                        'image' => self::faker()->imageUrl(),
                    ],
                ],
                'solution' => self::faker()->numberBetween(0, 4),
                'question' => self::faker()->text(255),
            ],
            PuzzleTypeEnum::AMONGUS => [
                'answers' => [
                    [
                        'type' => 'IMAGE',
                        'src' => self::faker()->imageUrl(),
                    ],
                    [
                        'type' => 'IMAGE',
                        'src' => self::faker()->imageUrl(),
                    ],
                    [
                        'type' => 'IMAGE',
                        'src' => self::faker()->imageUrl(),
                    ],
                    [
                        'type' => 'IMAGE',
                        'src' => self::faker()->imageUrl(),
                    ]
                ],
                'hints' => [
                    [
                        'text' => 'Hint ' . self::faker()->text(255),
                        'image' => self::faker()->imageUrl(),
                    ],
                    [
                        'text' => 'Hint ' . self::faker()->text(255),
                        'image' => self::faker()->imageUrl(),
                    ]
                ],
                'solution' => self::faker()->numberBetween(0, 4),
                'question' => 'Question ? : ' . self::faker()->text(255) . '?'
            ],
            default => throw new IllogicalValuesException('Puzzle type not supported'),
        };

        return [
            'activity' => $activity,
            'course' => CourseFactory::new(),
            'failure' => [
                [
                    'image' => $firstMascot,
                    'text' => 'Failure dialog : ' . self::faker()->text(),
                ],
                [
                    'image' => $secondMascot,
                    'text' => 'Failure dialog : ' . self::faker()->text(),
                ],
                [
                    'image' => $firstMascot,
                    'text' => 'Failure dialog : ' . self::faker()->text(),
                ]
            ],
            'reward' => self::faker()->text(255),
            'room' => RoomFactory::new(),
            'story' => [
                [
                    'image' => $firstMascot,
                    'text' => 'Story :' . self::faker()->text(),
                ],
                [
                    'image' => $secondMascot,
                    'text' => 'Story :' . self::faker()->text(),
                ],
                [
                    'image' => $firstMascot,
                    'text' => 'Story : ' . self::faker()->text(),
                ],
                [
                    'image' => $secondMascot,
                    'text' => 'Story : ' . self::faker()->text(),
                ],
                [
                    'image' => $firstMascot,
                    'text' => 'Story : ' . self::faker()->text(),
                ]
            ],
            'success' => [
                [
                    'image' => $firstMascot,
                    'text' => 'Success dialog : ' . self::faker()->text(),
                ],
                [
                    'image' => $secondMascot,
                    'text' => 'Success dialog : ' . self::faker()->text(),
                ],
                [
                    'image' => $firstMascot,
                    'text' => 'Success dialog : ' . self::faker()->text(),
                ]
            ],
            'title' => self::faker()->text(255),
            'type' => $type,
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this// ->afterInstantiate(function(Step $step): void {})
            ;
    }
}
