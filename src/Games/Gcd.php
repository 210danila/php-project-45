<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function BrainGames\Engine\greetUser;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\endGameWithSuccess;

function findGcdOfTwoNums($num1, $num2)
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
    $gcd = findGcdOfTwoNums($num1, $num2);
    [$num1, $num2, $gcd] = [((string) $num1), ((string) $num2), ((string) $gcd)];
    return ["{$num1} {$num2}", $gcd];
}


function startGcdGame() # greatest common divisor game
{
    $name = greetUser();
    line("Find the greatest common divisor of given numbers.");

    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    $gcd = findGcdOfTwoNums($num1, $num2);

    [$question, $correctAnswer] = createPairOfNums();
    askQuestion($question, $correctAnswer, $name);
    [$question, $correctAnswer] = createPairOfNums();
    askQuestion($question, $correctAnswer, $name);
    [$question, $correctAnswer] = createPairOfNums();
    askQuestion($question, $correctAnswer, $name);

    endGameWithSuccess($name);
}
