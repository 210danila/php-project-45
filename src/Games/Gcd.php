<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function findGcdOfTwoNums(int $num1, int $num2)
{
    $gcd = 0;

    for ($divider = 1; $divider <= max($num1, $num2); $divider++) {
        $isDividerDividesIntoNums = ($num1 % $divider === 0) && ($num2 % $divider === 0);
        $gcd = $isDividerDividesIntoNums ? $divider : $gcd;
    }
    return $gcd;
}

function startNewGame()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $gcd = findGcdOfTwoNums($num1, $num2);

        $questionsAndAnswers[] = ["{$num1} {$num2}", $gcd];
    }

    startGame(GAME_DESCRIPTION, $questionsAndAnswers);
}
