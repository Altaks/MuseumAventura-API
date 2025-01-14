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
                "Zarafa a besoin de vous pour lever la malédiction du masque gélédé. Des monstres attirés par le" .
                " masque viennent voler les œuvres du musée. Parcourez le musée à la recherche des objets permettant " .
                "de lever la malédiction avant qu'il ne soit trop tard. Réunissez un instrument, un poil d'animal et " .
                "une statue. Une fois réunis, le rituel pour lever la malédiction pourra se faire."
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
                'code' => '12345',
                'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/room/room/2etage" .
                    "/r24.webp",
            ],
            [
                'id' => 2,
                'floor' => 1,
                'name' => 'Galerie de zoologie',
                'code' => '12345',
                'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/room/room/1etage" .
                    "/r9.webp",
            ],
            [
                'id' => 3,
                'floor' => 2,
                'name' => 'Salle des arts décoratifs extra-européens',
                'code' => '12345',
                'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/room/room/2etage" .
                    "/r23.webp",
            ],
        ];

        foreach ($roomsData as $roomData) {
            $room = new Room();
            $room->setFloor($roomData['floor'])
                ->setName($roomData['name'])
                ->setCode($roomData['code'])
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
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Nous voilà dans la galerie de zoologie !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Il y a vraiment beaucoup d\'animaux aussi !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Malheuresement, je ne sais pas à quoi ressemble l\'animal que nous recherchons...',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'En revanche, j\'ai une plume appartenant à ce dernier.',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Sauras-tu retrouver à quel animal il appartient ?',
                    ],
                ],
                'activity' => [
                    'ref_image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/plume_hi" .
                        "bou_hulotte.webp",
                    'answers' => [
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pub" .
                            "lic/Musee/heron_cendre.webp"],
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pub" .
                            "lic/Musee/piaf1-1.webp"],
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pub" .
                            "lic/Musee/chouette_hulotte.webp"],
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pub" .
                            "lic/Musee/coracine_casquee.webp"],
                    ],
                    'hints' => [
                        [
                            'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon" .
                                "/zarafa_icon.webp",
                            'text' => 'Je crois que notre animal adore prendre de la hauteur dès qu\'il le peut !'
                        ],
                    ],
                    'solution' => 2,
                    'question' => "À quel animal appartient cette plume ?",
                ],
                'success' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Bravo, tu as raison !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Cette plume appartient effectivement à une chouette hulotte.',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => "Tâchons de ne pas oublier son nom, nous en aurons besoin pour lever la malédictio" .
                            "n !",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => "Maintenant, allons chercher l'instrument dont nous avons besoin ! ",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => "Rendez-vous dans la salle des arts musicaux (salle 24) à l'étage 2 !",
                    ],
                ],
                'failure' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Non, ce n\'est pas cet animal on dirait... Réessaie !',
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
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Tous ces instruments sont vraiment impressionants !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => "Pourtant, l'un d'entre eux est un leurre, et n'est qu'une illusion lancée par" .
                            " le masque gélédé !",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Mais lequel peut-il être bien être ?',
                    ],
                ],
                'activity' => [
                    'answers' => [
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pub" .
                            "lic/Musee/flute.webp"],
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pub" .
                            "lic/Musee/instrument_inconnue.webp"],
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pub" .
                            "lic/Musee/truc.webp"],
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pub" .
                            "lic/Musee/20241218_165950.webp"],
                    ],
                    'hints' => [
                        ['image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/za" .
                            "rafa_icon.webp",
                            'text' => 'Je ne crois pas qu\'il y avait autant d\'instruments à cordes avant...'],
                    ],
                    'solution' => 1,
                    'question' => 'Quel instrument n\'est pas présent dans la salle ?',
                ],
                'success' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Oui, c\'est celui-là ! Cet instrument n\'a rien à faire ici !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'C\'est un piège du masque gélédé !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => "Je m'occupe de le faire disparaître, tu peux te rendre à la salle suivante en at" .
                            "tendant.",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => "Direction la salle des arts décoratifs extra-européens, qui se situe juste en fa" .
                            "ce de notre salle actuelle, à l'étage 2.",
                    ],
                ],
                'failure' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Non, cet instrument est bien présent dans la salle, essayons un autre !',
                    ],
                ],
            ],
            [
                'title' => 'Retrouve la statue',
                'room' => 3,
                'reward' => 'https://upload.wikimedia.org/wikipedia/commons/2/28/Latimeria_chalumnae.jpg',
                'type' => PuzzleTypeEnum::GUESSIMAGE_EASY,
                'story' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Le dernier élèment dont nous avons besoin se situe dans cette salle.',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Nous devons trouver la statue qui nous permettra de lever la malédiction.',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Pourras-tu retrouver la statue à partir de sa forme ?',
                    ],
                ],
                'activity' => [
                    'ref_image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/statue_c" .
                        "ache.webp",
                    'answers' => [
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pub" .
                            "lic/Musee/20241218_170626.webp"],
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pub" .
                            "lic/Musee/animaux_jouet_2.webp"],
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pub" .
                            "lic/Musee/massue_patu_wahaika.webp"],
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pub" .
                            "lic/Musee/20241218_170318.webp"],
                    ],
                    'hints' => [
                        [
                            'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon" .
                                "/zarafa_icon.webp",
                            'text' => 'En regardant la taille de l\'ombre de plus près, c\'est une statue grande et large.',
                        ],
                    ],
                    'solution' => 0,
                    'question' => "À quelle statue appartient cette ombre ?",
                ],
                'success' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Félicitations, tu as de très bons yeux !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'C\'est la statue que nous cherchons.',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => "Grâce à toi, la malédiction du masque pourra être levée pour de bon ! " ,
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'Merci à toi Visiteur, le musée peut désormais continuer à vivre sereinement !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'N\'hésite pas à venir au troisième étage pour admirer l\'inoffensif masque Gélédé',
                    ],
                ],
                'failure' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/zar" .
                            "afa_icon.webp",
                        'text' => 'On ne dirait pas que cette statue correspond à l\'ombre présentée...',
                    ],
                ],
            ],
        ];

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
