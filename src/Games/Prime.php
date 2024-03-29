<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num)
{
    if ($num < 2) {
        return false;
    }

    for ($divider = 2; $divider <= ceil(sqrt($num)); $divider++) {
        if ($num % $divider == 0) {
            return false;
        }
    }
    return true;
}

function startNewGame()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num = rand(2, 199);
        $questionsAndAnswers[] = isPrime($num) ? [$num, 'yes'] : [$num, 'no'];
    }

    startGame(GAME_DESCRIPTION, $questionsAndAnswers);
}
