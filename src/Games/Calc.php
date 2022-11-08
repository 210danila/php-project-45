<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greetUser;
use function BrainGames\Engine\endGameWithSuccess;
use function BrainGames\Engine\askQuestion;

function countExpression($num1, $num2, $operation)
{
    if ($operation == '-') {
        return $num1 - $num2;
    } elseif ($operation == '+') {
        return $num1 + $num2;
    } elseif ($operation == '*') {
        return $num1 * $num2;
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
    line('What is the result of the expression?');
    $expression = 0;
    $result = 0;

    [$expression, $result] = makeExpression();
    askQuestion($expression, $result, $name);
    [$expression, $result] = makeExpression();
    askQuestion($expression, $result, $name);
    [$expression, $result] = makeExpression();
    askQuestion($expression, $result, $name);

    endGameWithSuccess($name);
}
