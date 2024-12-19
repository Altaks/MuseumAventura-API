<?php

namespace App\DataFixtures;

use App\Entity\Course;
use App\Entity\Room;
use App\Entity\Step;
use App\Enum\DifficultyEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Zenstruck\Foundry\Test\ResetDatabase;
use App\Enum\PuzzleTypeEnum;

class AppFixtures extends Fixture
{
    use ResetDatabase;

    public function load(ObjectManager $manager): void
    {
        $course = new Course();
        $course->setTitle('La malédiction du masque Gélédé')
            ->setDescription(
                "Marguerite a besoin de vous pour lever la malédiction du masque gélédé. Des monstres " .
                "attirés par le masque " .
                "viennent voler les œuvres du musée. Parcourir le musée à la recherche des objets permettant de " .
                "lever la malédiction avant qu'il ne soit trop tard. Réunir un instrument, un poil d'animal et une " .
                "statue.Une fois réunie, le rituel pour lever la malédiction peut se faire."
            )
            ->setDifficulty(DifficultyEnum::EASY)
            ->setThumbnail('https://www.alienor.org/media/synchro/391463/image1000.jpeg')
            ->setReward('https://www.alienor.org/media/synchro/391463/image1000.jpeg')
            ->setDuration(60);

        $manager->persist($course);

        $rooms = [];

        $roomsData = [
            [
                'id' => 1,
                'floor' => 2,
                'name' => 'Salle des arts musicaux',
                'image' => 'https://drive.google.com/file/d/1bUXUTjeoz4bvNQYGVmbcyS4wiSmNE6Dx/view?usp=drive_link',
            ],
            [
                'id' => 2,
                'floor' => 1,
                'name' => 'Galerie de zoologie',
                'image' => 'https://drive.google.com/file/d/1Yp1M-mx7hcOgAGKt_My0WKdHgNI58BXP/view?usp=drive_link',
            ],
            [
                'id' => 3,
                'floor' => 2,
                'name' => 'Salle des arts décoratifs extra-européens',
                'image' => 'https://drive.google.com/file/d/1zVyNhVzucsWLjc9UL6pML2JrkgteE5gq/view?usp=drive_link',
            ],
        ];

        foreach ($roomsData as $roomData) {
            $room = new Room();
            $room->setFloor($roomData['floor'])
                ->setName($roomData['name'])
                ->setImage($roomData['image']);
            $manager->persist($room);
            $rooms[$roomData['id']] = $room;
        }

        $stepsData = [
            [
                'title' => 'Retrouve l\animal avec la plume',
                'room' => 2,
                'reward' => 'https://upload.wikimedia.org/wikipedia/commons/2/28/Latimeria_chalumnae.jpg',
                'type' => PuzzleTypeEnum::GUESSIMAGE_EASY,
                'story' => [
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view?" .
                        "usp=drive_link',
                        'text' => 'Nous voilà dans la galerie de zoologie !',
                    ],
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view?" .
                        "usp=drive_link',
                        'text' => 'Je ne sais malheuresement pas à quoi ressemble l\'animal que nous recherchons...',
                    ],
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view?" .
                        "usp=drive_link',
                        'text' => 'En revanche, j\'ai une plume appartenant à ce dernier.',
                    ],
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view?" .
                        "usp=drive_link',
                        'text' => 'Sauras-tu retrouver à quel animal il appartient ?',
                    ],
                ],
                'activity' => [
                    'ref_image' => 'https://drive.google.com/file/d/1G1Dg4p3Z60GhitkGEnon0flZjpivFhYI/view?" .
                        "usp=drive_link',
                    'answers' => [
                        ['type' => 'IMAGE', 'src' => 'https://drive.google.com/file/d/1c_y8wdyrQODC_pJaakgQ77TiZl" .
                        "JORBu_/view?usp=drive_link'],
                        ['type' => 'IMAGE', 'src' => 'https://drive.google.com/file/d/1GzwJPYTQLTiB61QepQTCpUfCfja" .
                        "sg4sd/view?usp=drive_link'],
                        ['type' => 'IMAGE', 'src' => 'https://drive.google.com/file/d/1yTo0fbWavOJQut_MejGqd4pKE7" .
                        "AFA_zZ/view?usp=drive_link'],
                        ['type' => 'IMAGE', 'src' => 'https://drive.google.com/file/d/1yywsoFJKLkbIXe2vB2XAyZUH1" .
                        "33nSp6-/view?usp=drive_link'],
                    ],
                    'hints' => [
                        ['image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view" .
                        "?usp=drive_link', 'text' => ' Je crois que notre animal adore prendre de la hauteur" .
                         " dès qu\'il peut'],
                    ],
                    'solution' => 2,
                    'question' => "À quelle plume appartient cet animal ?",
                ],
                'success' => [
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view" .
                        "?usp=drive_link',
                        'text' => 'Bravo, tu as raison !',
                    ],
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view" .
                        "?usp=drive_link',
                        'text' => 'Cette plume appartient effectivement à XXX',
                    ],
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view" .
                        "?usp=drive_link',
                        'text' => 'Tâchons de ne pas oublier son nom, nous en aurons besoin pour" .
                         " lever la malédiction !',
                    ],
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view" .
                        "?usp=drive_link',
                        'text' => 'Maintenant, allons chercher notre instrument ! Rendez-vous dans la salle" .
                         " des arts musicaux (salle 24) à l\'étage 2',
                    ],
                ],
                'failure' => [
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view" .
                        "?usp=drive_link',
                        'text' => 'Mince, tu t\'es trompé, réessaie',
                    ],
                ],
            ],
            [
                'title' => 'Instrument en trop',
                'room' => 1,
                'reward' => 'https://upload.wikimedia.org/wikipedia/commons/2/28/Latimeria_chalumnae.jpg',
                'type' => PuzzleTypeEnum::AMONGUS,
                'story' => [
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view" .
                        "?usp=drive_link',
                        'text' => 'Tous ces instruments sont vraiment impressionants !',
                    ],
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view" .
                        "?usp=drive_link',
                        'text' => 'Pourtant, l\'un d\'entre eux est un leurre, et n\'est qu\'une illusion" .
                         " lancée par le masque gélédé !',
                    ],
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view" .
                        "?usp=drive_link',
                        'text' => 'Mais lequel peut-il être bien être ?',
                    ],
                ],
                'activity' => [
                    'answers' => [
                        ['type' => 'IMAGE', 'src' => 'https://drive.google.com/file/d/1dU158cFV74phSf0wobc-yN" .
                        "VL79kIrPdS/view?usp=drive_link'],
                        ['type' => 'IMAGE', 'src' => 'https://drive.google.com/file/d/1IIAEn3skLmXjwij43GH0VC1" .
                        "VMeucRMp0/view?usp=drive_link'],
                        ['type' => 'IMAGE', 'src' => 'https://drive.google.com/file/d/1lqpDO5Dsnl-DM4WiSwoQkHYu" .
                        "1otFUstU/view?usp=drive_link'],
                        ['type' => 'IMAGE', 'src' => 'https://drive.google.com/file/d/1z2WW4X935pymcnAkmSl6mx6ZtW4" .
                        "oPmft/view?usp=drive_link'],
                    ],
                    'hints' => [
                        ['image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view?" .
                        "usp=drive_link', 'text' => 'Je ne crois pas qu\'il y avait autant d\'instruments à cordes" .
                         "dans la salle avant !'],
                    ],
                    'solution' => 3,
                    'question' => 'Quel instrument est une illusion créée par le masque gélédé ?',
                ],
                'success' => [
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view" .
                        "?usp=drive_link',
                        'text' => 'Bravo, tu as trouvé le bon instrument !',
                    ],
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view" .
                        "?usp=drive_link',
                        'text' => 'Ce n\'est effectivement pas un instrument musical !',
                    ],
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view" .
                        "?usp=drive_link',
                        'text' => 'N\'oublie pas de bien examiner les autres objets de la salle !',
                    ],
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view" .
                        "?usp=drive_link',
                        'text' => 'Continuons de notre quête !',
                    ],
                ],
                'failure' => [
                    [
                        'image' => 'https://drive.google.com/file/d/12BeWqQm7wv9iKHLhM08swWayu7_Txz-7/view" .
                        "?usp=drive_link',
                        'text' => 'Mince, tu t\'es trompé, réessaie',
                    ],
                ],
            ],
        ];

        foreach ($roomsData as $roomData) {
            $room = new Room();
            $room->setFloor($roomData['floor'])
                ->setName($roomData['name'])
                ->setImage($roomData['image']);
            $manager->persist($room);
        }

        foreach ($stepsData as $stepData) {
            $step = new Step();
            $step->setTitle($stepData['title'])
                ->setReward($stepData['reward'])
                ->setType($stepData['type'])
                ->setStory($stepData['story'])
                ->setActivity($stepData['activity'])
                ->setSuccess($stepData['success'])
                ->setFailure($stepData['failure'])
                ->setCourse($course)
                ->setRoom($rooms[$stepData['room']]);

            $manager->persist($step);
        }

        $manager->flush();
    }
}
