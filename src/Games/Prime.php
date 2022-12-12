<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function BrainGames\Engine\startGame;
use function BrainGames\Engine\getRoundsCount;

function isPrime(int $num)
{
    for ($divider = 2; $divider <= ceil(sqrt($num)); $divider++) {
        if ($num % $divider == 0) {
            return false;
        }
    }
    return true;
}


function createThreePrimeNums()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < getRoundsCount(); $i++) {
        $num = rand(2, 199);
        if (isPrime($num)) {
            $questionsAndAnswers[] = [(string) $num, 'yes'];
        } else {
            $questionsAndAnswers[] = [(string) $num, 'no'];
        }
    }

    return $questionsAndAnswers;
}


function startPrimeGame()
{
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $questionsAndAnswers = createThreePrimeNums();

    startGame($gameDescription, $questionsAndAnswers);
    return ;
}
