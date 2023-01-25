<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'What is the result of the expression?';

function calculateExpression(int $num1, int $num2, string $operation)
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
    $expression = "{$num1} {$operation} {$num2}";
    $result = calculateExpression($num1, $num2, $operation);
    return [$expression, $result];
}

function startNewCalcGame()
{
    $expressionsAndResults = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $expressionsAndResults[] = makeExpression();
        $expressionsAndResults[$i][1] = (string) $expressionsAndResults[$i][1];
    }

    startGame(GAME_DESCRIPTION, $expressionsAndResults);
}
