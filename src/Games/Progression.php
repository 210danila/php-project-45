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
    $stepOfProgression = rand(3, 10);
    $length = rand(5, 15);
    for ($i = 0; $i < $length; $i++) {
        $currentNum = $firstNum + $i * $stepOfProgression;
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

    return [$formattedProgression, $answer];
}

function startNewGame()
{
    $gameDescription = 'What number is missing in the progression?';
    $questionsAndAnswers = [];
    $answerId = 1;
    for ($i = 0; $i < ROUNDSCOUNT; $i++) {
        $progression = createProgression();
        $questionsAndAnswers[] = hideSymbol($progression);
        $questionsAndAnswers[$i][$answerId] = (string) $questionsAndAnswers[$i][$answerId];
    }

    startGame($gameDescription, $questionsAndAnswers);
    return ;
}
