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
                'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/room/room" .
                "/2etage/r24.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9yb29tL3" .
                "Jvb20vMmV0YWdlL3IyNC53ZWJwIiwiaWF0IjoxNzM0NjgyNzAwLCJleHAiOjE3NjYyMTg3MDB9.APt4mS7LHZ5n" .
                "t3hQjnMPZmHEkRA2TEu4GrKkNUWEJQM&t=2024-12-20T08%3A18%3A20.320Z',
            ],
            [
                'id' => 2,
                'floor' => 1,
                'name' => 'Galerie de zoologie',
                'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/room/room/1et" .
                "age/r9.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9yb29tL3Jvb20vMWV0YW" .
                "dlL3I5LndlYnAiLCJpYXQiOjE3MzQ2ODI3NTcsImV4cCI6MTc2NjIxODc1N30.aA-YYZOr8dgLr0_N8z0-uanq0j1mT2c5U-g" .
                "NCET0hPI&t=2024-12-20T08%3A19%3A17.880Z',
            ],
            [
                'id' => 3,
                'floor' => 2,
                'name' => 'Salle des arts décoratifs extra-européens',
                'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/room/ro" .
                "om/2etage/r23.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9yb29tL3" .
                "Jvb20vMmV0YWdlL3IyMy53ZWJwIiwiaWF0IjoxNzM0NjgyNzQ1LCJleHAiOjE3NjYyMTg3NDV9.BG-NRj0u" .
                "Dt-UEqMoINZ7yCaLbs0y5zWXDP0-ckRTMKk&t=2024-12-20T08%3A19%3A05.434Z
',
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
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Nous voilà dans la galerie de zoologie !',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Je ne sais malheuresement pas à quoi ressemble l\'animal que nous recherchons...',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'En revanche, j\'ai une plume appartenant à ce dernier.',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Sauras-tu retrouver à quel animal il appartient ?',
                    ],
                ],
                'activity' => [
                    'ref_image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/plum" .
                    "e_hibou_hulotte.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9wbHVtZV9" .
                    "oaWJvdV9odWxvdHRlLndlYnAiLCJpYXQiOjE3MzQ2ODI1ODUsImV4cCI6MTc2NjIxODU4NX0.t-pUD-s80pYiLmS-QWN6N_" .
                    "DoRhUCn4V_vybzXWBRTQQ&t=2024-12-20T08%3A16%3A25.989Z ',
                    'answers' => [
                        ['type' => 'IMAGE', 'src' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/si" .
                        "gn/Musee/heron_cendre.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZ" .
                        "S9oZXJvbl9jZW5kcmUud2VicCIsImlhdCI6MTczNDY4Mjg3OSwiZXhwIjoxNzY2MjE4ODc5fQ.0ne32ExtN" .
                        "HZbdqzCtanx6IEzfDStzkLa4Gtz-qA6qDs&t=2024-12-20T08%3A21%3A19.822Z'],
                        ['type' => 'IMAGE', 'src' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sig" .
                        "n/Musee/piaf1-1.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9waW" .
                        "FmMS0xLndlYnAiLCJpYXQiOjE3MzQ2ODI4OTYsImV4cCI6MTc2NjIxODg5Nn0.jsCaa-YpwYYrTREoy0" .
                        3XIKOUXCNg1ItwSzACgcJk_TM&t=2024-12-20T08%3A21%3A37.032Z'],
                        ['type' => 'IMAGE', 'src' => ' https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/s" .
                        ign/Musee/chouette_hulotte.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNl" .
                        "ZS9jaG91ZXR0ZV9odWxvdHRlLndlYnAiLCJpYXQiOjE3MzQ2ODI5MjksImV4cCI6MTc2NjIxODkyOX0.rC6pT" .
                        "JtV2CfEf3DWL9VK0gsP34GOFahjwakcarNyMj4&t=2024-12-20T08%3A22%3A09.288Z'],
                        ['type' => 'IMAGE', 'src' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object" .
                        "/sign/Musee/coracine_casquee.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNd" .
                        "XNlZS9jb3JhY2luZV9jYXNxdWVlLndlYnAiLCJpYXQiOjE3MzQ2ODI5NDUsImV4cCI6MTc2NjIxODk0N" .
                        "X0.Yl7ljAWpZ-VQ2eb1xzSZB602HRoFeUrxqKpnV6LH6fM&t=2024-12-20T08%3A22%3A26.078Z'],
                    ],
                    'hints' => [
                        ['image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z', 'text' => ' Je crois que notre an" .
                        "imal adore prendre de la hauteur dès qu\'il peut'],
                    ],
                    'solution' => 2,
                    'question' => "À quelle plume appartient cet animal ?",
                ],
                'success' => [
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Bravo, tu as raison !',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Cette plume appartient effectivement à XXX',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Tâchons de ne pas oublier son nom, nous en aurons besoin pour lever la malédicti" .
                        "on !',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Maintenant, allons chercher notre instrument ! Rendez-vous dans la salle des art" .
                        "s musicaux (salle 24) à l\'étage 2',
                    ],
                ],
                'failure' => [
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
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
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Tous ces instruments sont vraiment impressionants !',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Pourtant, l\'un d\'entre eux est un leurre, et n\'est qu\'une illusion lancée par" .
                         " le masque gélédé !',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Mais lequel peut-il être bien être ?',
                    ],
                ],
                'activity' => [
                    'answers' => [
                        ['type' => 'IMAGE', 'src' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object" .
                        "/sign/Musee/flute.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9m" .
                        "bHV0ZS53ZWJwIiwiaWF0IjoxNzM0NjgzMDM0LCJleHAiOjE3NjYyMTkwMzR9.qGAmeFChNfzNzzsAIFxeBqe" .
                        O7lW3ZDVIhd7Ur7ybcb4&t=2024-12-20T08%3A23%3A54.772Z'],
                        ['type' => 'IMAGE', 'src' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/" .
                        "sign/Musee/instrument_inconnue.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwi" .
                        "OiJNdXNlZS9pbnN0cnVtZW50X2luY29ubnVlLndlYnAiLCJpYXQiOjE3MzQ2ODI4MjIsImV4cCI6MTc2NjIxODg" .
                        "yMn0.gXwS4bE--590dkvt4UVMhbiHGuy5JbrSo6Mw3NpE4wQ&t=2024-12-20T08%3A20%3A22.602Z'],
                        ['type' => 'IMAGE', 'src' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/si" .
                        "gn/Musee/truc.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS90cnVjLnd" .
                        "lYnAiLCJpYXQiOjE3MzQ2ODM3ODUsImV4cCI6MTc2NjIxOTc4NX0.QdAk38-xy5XKPmoLQ1a9GsNyrJ_S9ghoLSjhJI" .
                        4hyYY&t=2024-12-20T08%3A36%3A25.560Z'],
                        ['type' => 'IMAGE', 'src' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/s" .
                        "ign/Musee/20241218_165950.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJN" .
                        "dXNlZS8yMDI0MTIxOF8xNjU5NTAud2VicCIsImlhdCI6MTczNDY4MzgxNSwiZXhwIjoxNzY2MjE5ODE1fQ.LBf" .
                        "b-oGa1aGCXGhzPsfblPUGVauKX2fIkLZrT34XTTM&t=2024-12-20T08%3A36%3A55.258Z '],
                    ],
                    'hints' => [
                        ['image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z', 'text' => 'Je ne crois pas qu\'i" .
                        "l y avait autant d\'instruments à cordes avant.'],
                    ],
                    'solution' => 1,
                    'question' => "Quel instrument n\'est pas présent dans la salle ?",
                ],
                'success' => [
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Oui, c\'est celui-là ! Cet instrument n\'a rien à faire ici !',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'C\'est un piège du masque gélédé !',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Je m\'occupe de le faire disparaître, tu peux te rendre à la salle suivant" .
                        "e en attendant.',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => ' Direction la salle des arts décoratifs extra-européens, qui se situe juste e" .
                        "n face de notre salle actuelle, à l\'étage 2.',
                    ],
                ],
                'failure' => [
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Mince, tu t\'es trompé, réessaie',
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
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Le dernier élèment dont nous avons besoin se situe dans cette salle.',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Nous devons trouver la statue qui nous permettra de lever la malédiction.',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Pourras-tu retrouver la statue à partir de sa forme  ?',
                    ],
                ],
                'activity' => [
                    'ref_image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/Marg" .
                    "uerite.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9NYXJndWVyaXRlLnd" .
                    "lYnAiLCJpYXQiOjE3MzQ2ODIxNzQsImV4cCI6MTc2NjIxODE3NH0.K1K_lz931Os-LOwjZnFPH89jxR6qNR6q9OofAGc4" .
                    "tjM&t=2024-12-20T08%3A09%3A35.051Z7',
                    'answers' => [
                        ['type' => 'IMAGE', 'src' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/objec" .
                        "t/sign/Musee/20241218_170626.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiO" .
                        "iJNdXNlZS8yMDI0MTIxOF8xNzA2MjYud2VicCIsImlhdCI6MTczNDY4MzkzOCwiZXhwIjoxNzY2MjE5OTM4fQ.lMQ7" .
                        "HyhKy5OGfVOomuMP8or-GXSLzn9ZbhfVCtw9RfU&t=2024-12-20T08%3A38%3A58.190Z'],
                        ['type' => 'IMAGE', 'src' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/s" .
                        "ign/Musee/animaux_jouet_2.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNl" .
                        "ZS9hbmltYXV4X2pvdWV0XzIud2VicCIsImlhdCI6MTczNDY4Mzk0OSwiZXhwIjoxNzY2MjE5OTQ5fQ.KUsW8" .
                        jkOSMKFvzuzkFlYSsSCQ8v-OYSWt9KUX6A6xCg&t=2024-12-20T08%3A39%3A10.011Z'],
                        ['type' => 'IMAGE', 'src' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/o" .
                        "bject/sign/Musee/massue_patu_wahaika.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.ey" .
                        "J1cmwiOiJNdXNlZS9tYXNzdWVfcGF0dV93YWhhaWthLndlYnAiLCJpYXQiOjE3MzQ2ODI5ODksImV4cCI6MTc2NjIx" .
                        "ODk4OX0.gFx4jzR5aRtEry27LOJsqPN7rAMlczswGVuqKJxguGo&t=2024-12-20T08%3A23%3A10.109Z '],
                        ['type' => 'IMAGE', 'src' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/s" .
                        "ign/Musee/20241218_170318.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXN" .
                        "lZS8yMDI0MTIxOF8xNzAzMTgud2VicCIsImlhdCI6MTczNDY4NDAxNywiZXhwIjoxNzY2MjIwMDE" .
                        "3fQ.y1yBASxy5V39RA2hlWBG5E8MTL1AEgUJBKO3UHoyg6g&t=2024-12-20T08%3A40%3A17.393Z '],
                    ],
                    'hints' => [
                        ['image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z', 'text' => 'Je ne crois pas qu\'il" .
                         "y avait autant d\'instruments à cordes avant.'],
                    ],
                    'solution' => 0,
                    'question' => "À quelle statue appartient cette ombre ?",
                ],
                'success' => [
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Félicitations, tu as de très bons yeux !',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'C\'est la statue XXX que nous cherchons.',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Nous pouvons enfin nous rendre devant le masque gélédé pour lever la malédiction !',
                    ],
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Allons au dernier étage, dans la salle des masques !',
                    ],
                ],
                'failure' => [
                    [
                        'image' => 'https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/sign/Musee/icon/zar" .
                        "afa_icon.webp?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1cmwiOiJNdXNlZS9pY29uL3ph" .
                        "cmFmYV9pY29uLndlYnAiLCJpYXQiOjE3MzQ2ODI3NzgsImV4cCI6MTc2NjIxODc3OH0.XGxJFgTyKTPSIBbuHic" .
                        "JT3eJ6pbksjob8_I6DH3N8WI&t=2024-12-20T08%3A19%3A38.764Z',
                        'text' => 'Mince, tu t\'es trompé, réessaie',
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
