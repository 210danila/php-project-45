<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function greetUser()
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    return $name;
}


function askQuestion($question, $correctAnswer, $name)
{
    line("Question: %s", $question);
    $userAnswer = prompt("Your answer");
    if (((string) $userAnswer) === ((string) $correctAnswer)) {
        line("Correct!");
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
        line("Let's try again, %s!", $name);
        exit();
    }
}


function endGameWithSuccess($name) # if all answers were correct
{
    line("Congratulations, %s!", $name);
}