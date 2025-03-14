<?php

namespace App\DataFixtures;

use App\Entity\Course;
use App\Entity\Room;
use App\Entity\Step;
use App\Enum\DifficultyEnum;
use App\Enum\PuzzleTypeEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Zenstruck\Foundry\Test\ResetDatabase;

class AppFixtures extends Fixture
{
    use ResetDatabase;

    public function load(ObjectManager $manager): void
    {
        $course = new Course();
        $course->setTitle('La malédiction du masque Gélédé')
            ->setDescription(
                "Le musée a besoin de nous pour lever la malédiction du masque Gélédé. Des monstres attirés" .
                " par le masque viennent voler les œuvres du musée. Partons à la recherche des objets " .
                "permettant de lever la malédiction avant qu'il ne soit trop tard. Réunissons un instrument, un poil" .
                " d'animal et une statue. Une fois les éléments réunis, le rituel pour faire cesser la malédiction" .
                " à tout jamais pourra être accompli !"
            )
            ->setDifficulty(DifficultyEnum::EASY)
            ->setThumbnail('https://www.alienor.org/media/synchro/391463/image1000.jpeg')
            ->setReward('https://www.alienor.org/media/synchro/391463/image1000.jpeg')
            ->setDuration(60);

        $course2 = new Course();
        $course2->setTitle('La carte au trésor')
            ->setDescription(
                "Il y a peu, un historien est venu déposer au musée un objet entouré de mystères : une " .
                "carte au trésor. Malgré tous ses efforts, il n`a jamais pu en percer les secrets. Pourtant, je" .
                " suis convaincue que cette carte dissimule des richesses inestimables, encore jamais découvertes. " .
                "Mais seule, je suis incapable de révéler ses secrets. Visiteur, accepterez-vous de joindre vos " .
                "forces aux miennes pour élucider les mystères de cette carte et partir à la découverte de " .
                "ses trésors cachés ?"
            )
            ->setDifficulty(DifficultyEnum::MEDIUM)
            ->setThumbnail("https://dbgjqsyfbgqboyomqfjr.supabase.co/stor" .
                "age/v1/object/public/Musee/treasure_map.webp")
            ->setReward('https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/stone3-1.webp')
            ->setDuration(90);

        $manager->persist($course);
        $manager->persist($course2);

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
            [
                'id' => 4,
                'floor' => 3,
                'name' => 'Salle de l\'ethnologie océanienne',
                'code' => '12345',
                'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/room/room/3etage/" .
                    "r25.webp",
            ],
            [
                'id' => 5,
                'floor' => -1,
                'name' => 'Salle des pierres précieuses',
                'code' => '12345',
                'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/room/room/s" .
                    "ous-sol/r6.webp",
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

        $stepsData2 = [
            [
                'title' => 'Quel masque ne correspond pas à l\'une des 4 descriptions ?',
                'room' => 4,
                'reward' => 'https://upload.wikimedia.org/wikipedia/commons/2/28/Latimeria_chalumnae.jpg',
                'type' => PuzzleTypeEnum::AMONGUS,
                'story' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Merci de me prêter ton aide, Visiteur !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Cette mystèrieuse carte semble nous amener dans cette salle.',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Il y a un très grand nombre de masques !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "La carte indique également ceci : \"Le chemin vers le trésor se cache derrière " .
                            "la fausse description.\"",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Je ne sais pas ce que cela peut vouloir dire, mais 4 phrases suivent ce message :',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "\"A : Je suis peint en rouge éclatant, avec des yeux ronds blancs cerclés de noir," .
                            " un visage expressif, et je porte un bandeau décoré de motifs bleus et dorés.\"",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "\"B : Je suis peint en blanc, avec des traits noirs et jaunes subtils sur les " .
                            "joues et le front, et je porte sur ma tête pas moins de 12 bosses variant " .
                            "entre 2 apparences.\"",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "\"C : Je suis peint en jaune, mes yeux ont une couleur rappelant celle du ciel," .
                            " tandis que mon couvre-chef rappelle un métier de la mer.\"",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "\"D : Je suis peint en bleu et blanc avec des rayures horizontales sur le visage, " .
                            "et j'ai, sur la tête, des pointes orientées vers la même direction.\"",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Je dois bien avouer que je suis perdue... Peux-tu m'aider Visiteur ?",
                    ],
                ],
                'activity' => [
                    'answers' => [
                        ['type' => 'IMAGE', 'src' => "https://www.alienor.org/media/synchro/386746/image1000.jpeg"],
                        ['type' => 'IMAGE', 'src' => "https://www.alienor.org/media/synchro/386728/image1000.jpeg"],
                        ['type' => 'IMAGE', 'src' => "https://www.alienor.org/media/synchro/386714/image1000.jpeg"],
                        ['type' => 'IMAGE', 'src' => "https://www.alienor.org/media/synchro/386729/image1000.jpeg"],
                    ],
                    'hints' => [
                        ['image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                            'text' => 'Je n\'arrive pas à retrouver la description D parmi les masques présentés...'],
                    ],
                    'solution' => 2,
                    'question' => 'Quel masque ne correspond à aucune description ?',
                ],
                'given' => 'J\'ai trouvé ! C\'est le masque avec les pointes sur la tête !',
                'success' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Bravo, tu as raison !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Ce masque était semblable à la description D, mais des failles s\'y trouvaient !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Regarde ! On dirait que la carte s'est mise à jour !",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Nous devons apparemment nous rendre dans la salle 9 à l'étage 1. Allons-y !",
                    ],
                ],
                'failure' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Non, ce masque a bien une description qui lui correspond... Réessaie !',
                    ],
                ],
            ],
            [
                'title' => 'Patte sur le trésor',
                'room' => 2,
                'reward' => 'https://upload.wikimedia.org/wikipedia/commons/2/28/Latimeria_chalumnae.jpg',
                'type' => PuzzleTypeEnum::GUESSIMAGE_EASY,
                'story' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Nous voilà au prochain lieu indiqué par la carte : la salle de zoologie !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Cette fois-ci, il est écrit : ",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "\"Quelconque être vivant ne peut mettre sa patte sur le trésor. Cette dernière" .
                            " doit être apte à y accéder.\"",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Il semblerait qu'une image d'une patte soit également inscrite.",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Elle doit appartenir à un animal dans cette salle, trouvons-le ! ",
                    ],
                ],
                'given' => 'J\'ai trouvé ! C\'est la patte du caméléon verruqueux !',
                'activity' => [
                    'ref_image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/bras_ca" .
                        "meleon.webp",
                    "ache.webp",
                    'answers' => [
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pub" .
                            "lic/Musee/crocrodile_nain.webp"],
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pub" .
                            "lic/Musee/henope.webp"],
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pu" .
                            "blic/Musee/IMG_20241218_163453.webp"],
                        ['type' => 'IMAGE', 'src' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/pub" .
                            "lic/Musee/varan_aquatique.webp"],
                    ],
                    'hints' => [
                        ['image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                            'text' => 'La patte indiquée semble appartenir à un animal qui n\'est pas très grand...'],
                    ],
                    'solution' => 2,
                    'question' => 'À quel animal appartient cette patte ?',
                ],
                'success' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Effectivement, tu as raison, cette patte appartient bien au caméléon verruqueux !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'OH ?! La carte semble afficher quelque chose :',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "\"Seul un individu capable de trouver la patte d'un être qui se camoufle saura" .
                            " débusquer le trésor caché.\"",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Je ne sais pas vraiment ce que cela veut dire, mais nous avons trouvé la bonne " .
                            "réponse !",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Notre dernière destination semble être le sous-sol du musée, allons-y !",
                    ],
                ],
                'failure' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Non, la patte ne correspond pas à cet animal... Réessayons !',
                    ],
                ],
            ],
            [
                'title' => 'Quel est le trésor ?',
                'room' => 5,
                'reward' => 'https://upload.wikimedia.org/wikipedia/commons/2/28/Latimeria_chalumnae.jpg',
                'type' => PuzzleTypeEnum::AMONGUS,
                'story' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'WAOUH ! Cette salle est vraiment très belle !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Tu vois toutes ces pierres exposées partout ?! C\'est magnifique !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Alors, que nous indique la carte... Tiens, c\'est étrange, il est écrit :',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "\"Trésor -- dlj,fznv -- étudiant -- jkfnduier -- calcite -- Angoulins .\"",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Qu'est ce que cela peut bien vouloir signifier...?",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Cette énigme semble plus difficile... Visiteur, je compte sur toi. C'est notre " .
                            "dernier obstacle avant le trésor, tu es capable de le surmonter, j'en suis sûre !",
                    ],
                ],
                'given' => 'J\'ai la solution ! Ce magnifique spath d\'Aunis est la réponse à l\'énigme !',
                'activity' => [
                    'answers' => [
                        ['type' => 'IMAGE', 'src' => "https://www.alienor.org/media/synchro/440315/image1000.jpeg"],
                        ['type' => 'IMAGE', 'src' => "https://www.alienor.org/media/synchro/417911/image1000.jpeg"],
                        ['type' => 'IMAGE', 'src' => "https://sae5-x21-api-dev.labs.iut-larochelle.fr/resources/images/"
                            . "20250312_103346.webp"],
                        ['type' => 'IMAGE', 'src' => "https://sae5-x21-api-dev.labs.iut-larochelle.fr/resources/images/"
                            . "20250312_103646.webp"],
                    ],
                    'hints' => [
                        [
                            'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon" .
                                "/Zarafa_head.webp",
                            'text' => "Certains mots ne veulent rien dire j'en suis sûre, mais j'ai l'impression que" .
                                " quelques uns d'entre eux sont pourtant présents dans cette salle..."
                        ],
                    ],
                    'solution' => 3,
                    'question' => "Visiteur, résolvez l'énigme finale de la carte au trésor.",
                ],
                'success' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Mais oui, bien sûr, tu as raison Visiteur, c\'est la solution !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'C\'est un spath qui provient de la région d\'Aunis, elle est si belle !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "On dirait que la carte affiche un dernier message :",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "\"Félications visiteurs. Vous avez mis la main sur le trésor de cette carte. " .
                            "En réalité, toutes les pierres présentes ici font parties de mon trésor, et elles sont" .
                            " en sécurité ici, j'en suis convaincu. Je vous pris de bien vouloir admirer la beauté" .
                            " de ce à quoi j'ai consacré ma vie, et je vous demande, comme j'ai pu le faire durant ma"
                            . " vie, de prendre soin de ces dernières. Ulysses Wilhelm, 1856",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Je vois, cette carte a donc été fabriquée par un historien d'il y a plusieurs" .
                            " siècles maintenant. Il souhaitait mettre son trésor loin de mains dangereuses...",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Je te remercie Visiteur. Grâce à toi, le mystère de la carte au trésor est résolu" .
                            ". Nous devrions malgré tout laisser son trésor ici afin de laisser tout le monde profiter "
                            . "de sa beauté !",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "À très vite !",
                    ],
                ],
                'failure' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Non, ce n\'est pas ça, essayons autre chose...',
                    ],
                ],
            ],
        ];

        $stepsData = [
            [
                'title' => 'Retrouve l\'animal avec la plume',
                'room' => 2,
                'reward' => 'https://upload.wikimedia.org/wikipedia/commons/2/28/Latimeria_chalumnae.jpg',
                'type' => PuzzleTypeEnum::GUESSIMAGE_EASY,
                'story' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Catastrophe ! La malédiction du masque Gélédé est de retour !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Visiteur, je remercie ta présence ! Nous allons y mettre fin ensemble !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Pour cela, nous devons réunir différents éléments présents dans le musée.',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Pour commencer, nous voici dans la galerie de zoologie !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Il y a vraiment beaucoup d\'animaux ici !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Malheureusement, je ne sais pas à quoi ressemble l\'animal que nous recherchons...',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'En revanche, j\'ai une plume appartenant à ce dernier.',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Sauras-tu retrouver à quel animal il appartient ?',
                    ],
                ],
                'given' => 'J\'ai trouvé l\'animal que nous cherchons !',
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
                                "/Zarafa_head.webp",
                            'text' => 'Je crois que notre animal adore prendre de la hauteur dès qu\'il le peut !'
                        ],
                    ],
                    'solution' => 2,
                    'question' => "À quel animal appartient cette plume ?",
                ],
                'success' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Bravo, tu as raison !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Cette plume appartient à une chouette hulotte.',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Tâchons de ne pas oublier son nom, nous en aurons besoin pour lever la malédictio" .
                            "n !",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Maintenant, allons chercher l'instrument dont nous avons besoin ! ",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Rendez-vous dans la salle des arts musicaux située à l'étage 2, salle 24 !",
                    ],
                ],
                'failure' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
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
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Tous ces instruments sont vraiment impressionants !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Pourtant, l'un d'entre eux est un leurre, et n'est qu'une illusion lancée par" .
                            " le masque Gélédé !",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Mais lequel peut-il être bien être ?',
                    ],
                ],
                'given' => 'Regarde, c\'est celui-là ! Cet instrument n\'a rien à faire ici.',
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
                        ['image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                            'text' => 'Je ne crois pas qu\'il y avait autant d\'instruments à cordes avant...'],
                    ],
                    'solution' => 1,
                    'question' => 'Quel instrument n\'est pas présent dans la salle ?',
                ],
                'success' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Oui, c\'est celui-là ! Cet instrument n\'a rien à faire ici !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'C\'est un piège du masque Gélédé !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Je m'occupe de le faire disparaître, tu peux te rendre à la salle suivante en at" .
                            "tendant.",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Direction la salle des arts décoratifs extra-européens, qui se situe juste en fa" .
                            "ce de notre salle actuelle, à l'étage 2.",
                    ],
                ],
                'failure' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
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
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Le dernier élément dont nous avons besoin se situe dans cette salle.',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Nous devons trouver la statue qui nous permettra de lever la malédiction.',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Malheureusement, le masque a essayé de la dissimuler parmi les autres...',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Pourras-tu retrouver la statue à partir de sa forme ?',
                    ],
                ],
                'given' => 'J\'ai trouvé ! C\'est la seule possible !',
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
                                "/Zarafa_head.webp",
                            'text' => "En regardant la forme de plus près, c'est une statue grande et " .
                                "large.",
                        ],
                    ],
                    'solution' => 0,
                    'question' => "À quelle statue appartient cette forme ?",
                ],
                'success' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Félicitations, tu as de très bons yeux !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'C\'est la statue que nous cherchons.',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "Grâce à toi, la malédiction du masque peut être levée pour de bon ! ",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'Merci à toi Visiteur, le musée peut désormais continuer à vivre sereinement !',
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "N'hésite pas à venir au troisième étage pour admirer désormais l'inoffensif " .
                            "masque Gélédé ! ;)",
                    ],
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => "À bientôt !",
                    ],
                ],
                'failure' => [
                    [
                        'image' => "https://dbgjqsyfbgqboyomqfjr.supabase.co/storage/v1/object/public/Musee/icon/Zar" .
                            "afa_head.webp",
                        'text' => 'On ne dirait pas que cette statue correspond à la forme présentée...',
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

        foreach ($stepsData2 as $stepData2) {
            $step2 = new Step();
            $step2->setTitle($stepData2['title'])
                ->setReward($stepData2['reward'])
                ->setType($stepData2['type'])
                ->setStory($stepData2['story'])
                ->setActivity($stepData2['activity'])
                ->setSuccess($stepData2['success'])
                ->setFailure($stepData2['failure'])
                ->setCourse($course2)
                ->setRoom($rooms[$stepData2['room']]);

            $manager->persist($step2);
        }

        $manager->flush();
    }
}
