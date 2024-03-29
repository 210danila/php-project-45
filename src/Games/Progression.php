<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'What number is missing in the progression?';

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
    $formattedProgression = implode(' ', $progression);
    return [$formattedProgression, $answer];
}

function startNewGame()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $progression = createProgression();
        $questionsAndAnswers[] = hideSymbol($progression);
    }

    startGame(GAME_DESCRIPTION, $questionsAndAnswers);
}
