<?php

namespace App\Enum;

enum PuzzleTypeEnum: string
{
    case AMONGUS = 'amongus';
    case GUESSIMAGE_EASY = 'guessimage-easy';
    case FINDINFO = 'find-info';

    case PUZZLE = 'puzzle';
}
