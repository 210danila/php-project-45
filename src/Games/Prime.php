<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDSCOUNT;

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
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDSCOUNT; $i++) {
        $num = rand(2, 199);
        if (isPrime($num)) {
            $questionsAndAnswers[] = [(string) $num, 'yes'];
        } else {
            $questionsAndAnswers[] = [(string) $num, 'no'];
        }
    }

    startGame($gameDescription, $questionsAndAnswers);
}
