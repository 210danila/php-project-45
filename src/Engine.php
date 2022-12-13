<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDSCOUNT = 3;

function getRoundsCount()
{
    $roundsCount = 3;
    return $roundsCount;
}

function greetUser()
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name? ");
    line("Hello, %s!", $name);
    return $name;
}


function askQuestion(string $question, string $correctAnswer, string $name)
{
    line("Question: %s", $question);
    $userAnswer = prompt("Your answer");

    if ($userAnswer !== $correctAnswer) {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
        line("Let's try again, %s!", $name);
        return false;
    }
    line("Correct!");
    return true;
}


function startGame(string $gameDescription, array $questionsAndAnswers)
{
    $name = greetUser();
    line($gameDescription);

    for ($i = 0; $i < getRoundsCount(); $i++) {
        [$question, $correctAnswer] = $questionsAndAnswers[$i];
        line('Question: %s', $question);
        $userAnswer = prompt("Your answer");

        if ($userAnswer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return ;
        }
        line("Correct!");
    }
    line("Congratulations, %s!", $name);
}
