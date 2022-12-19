<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDSCOUNT;

function countExpression(int $num1, int $num2, string $operation)
{
    switch ($operation) {
        case '-':
            return $num1 - $num2;
        case '+':
            return $num1 + $num2;
        case '*':
            return $num1 * $num2;
        default:
            $errorMessage = 'No case for current operand :(';
            throw new \Exception($errorMessage);
    }
}


function makeExpression()
{
    $operations = ['+', '*', '-'];
    $operation = $operations[rand(0, 2)];
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    $expression = ($num1) . " {$operation} " . ($num2);
    $result = ((string) countExpression($num1, $num2, $operation));
    return [$expression, $result];
}


function startNewGame()
{
    $gameDescription = 'What is the result of the expression?';
    $expressionsAndResults = [];
    for ($i = 0; $i < ROUNDSCOUNT; $i++) {
        $expressionsAndResults[] = makeExpression();
    }

    startGame($gameDescription, $expressionsAndResults);
}
