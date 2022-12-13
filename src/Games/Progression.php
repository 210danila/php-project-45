<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;
use const BrainGames\Engine\ROUNDSCOUNT;

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
        $formattedProgression .= $element . ' ';
    }

    return [$formattedProgression, (string) $answer];
}


function createProgressions()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDSCOUNT; $i++) {
        $progression = createProgression();
        $questionsAndAnswers[] = hideSymbol($progression);
    }
    return $questionsAndAnswers;
}


function startProgressionGame()
{
    $gameDescription = "What number is missing in the progression?";
    $questionsAndAnswers = createProgressions();

    startGame($gameDescription, $questionsAndAnswers);
    return ;
}
