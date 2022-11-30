<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

function startEvenGame()
{
    $gameDescription = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $questionsAndAnswers = [['15', 'no'],
        ['6', 'yes'],
        ['7', 'no']];

    startGame($gameDescription, $questionsAndAnswers);
}
