<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function BrainGames\Engine\startGame;
use function BrainGames\Engine\getRoundsCount;

function findGcdOfTwoNums(int $num1, int $num2)
{
    $gcd = 0;

    for ($divider = 1; $divider <= max($num1, $num2); $divider++) {
        $isDividerDividesIntoNums = ($num1 % $divider === 0) && ($num2 % $divider === 0);
        $gcd = $isDividerDividesIntoNums ? $divider : $gcd;
    }
    return $gcd;
}


function createPairOfNums()
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    $gcd = (string) findGcdOfTwoNums($num1, $num2);
    return ["{$num1} {$num2}", $gcd];
}


function startGcdGame() # greatest common divisor game
{
    $gameDescription = "Find the greatest common divisor of given numbers.";

    $questionsAndAnswers = [];
    for ($i = 0; $i < getRoundsCount(); $i++) {
        $questionsAndAnswers[] = createPairOfNums();
    }

    startGame($gameDescription, $questionsAndAnswers);
}
