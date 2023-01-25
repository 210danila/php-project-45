<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function greetUser()
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name? ");
    line("Hello, %s!", $name);
    return $name;
}

function startGame(string $gameDescription, array $questionsAndAnswers)
{
    $name = greetUser();
    line($gameDescription);

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
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
