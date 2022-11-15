<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greetUser;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\startGame;

function createProgression()
{
    $progression = [];
    $firstNum = rand(3, 100);
    $increase = rand(3, 10);
    $length = rand(5, 15);
    for ($i = 0; $i < $length; $i++) {
        $currentNum = $firstNum + $i * $increase;
        $progression[$i] = $currentNum;
    }

    return $progression;
}


function hideSymbol(array $progression)
{
    $randSymbolIndex = rand(0, count($progression) - 1);
    $answer = $progression[$randSymbolIndex];
    $progression[$randSymbolIndex] = '..';

    $formattedProgression = ''; # string version of progression
    foreach ($progression as $element) {
        $formattedProgression .= (string) $element . ' ';
    }

    return [$formattedProgression, $answer];
}


function createThreeProgressions()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < 3; $i++) {
        $progression = createProgression();
        $questionsAndAnswers[] = hideSymbol($progression);
    }
    return $questionsAndAnswers;
}


function startProgressionGame()
{
    $name = greetUser();
    $gameDescription = "What number is missing in the progression?";
    $questionsAndAnswers = createThreeProgressions();
    
    startGame($gameDescription, $questionsAndAnswers, $name);
    return ;
}
