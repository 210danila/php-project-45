<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greetUser;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\startGame;

function countExpression(int $num1, int $num2, string $operation)
{
    switch ($operation) {
        case '-':
            return $num1 - $num2;
        case '+':
            return $num1 + $num2;
        case '*':
            return $num1 * $num2;
        /* ситуации, когда ни один оператор не подошел сложиться не может
        поскольку operation выбирается из 3 доступных вариантов*/
    }
}


function makeExpression()
{
    $operations = ['+', '*', '-'];
    $operation = $operations[rand(0, 2)];
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    $expression = ((string) $num1) . " {$operation} " . ((string) $num2);
    $result = ((string) countExpression($num1, $num2, $operation));
    return [$expression, $result];
}


function startCalcGame()
{
    $name = greetUser();
    $gameDescription = 'What is the result of the expression?';
    $expressionsAndResults = [makeExpression(),
        makeExpression(),
        makeExpression()];
    
    startGame($gameDescription, $expressionsAndResults, $name);
}
