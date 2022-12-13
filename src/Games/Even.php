<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

function makeQuestionsAndAnswers()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < \BrainGames\Engine\ROUNDSCOUNT; $i++) {
        $num = rand(0, 100);
        if ($num % 2 === 0) {
            $questionsAndAnswers[] = [$num, 'yes'];
        } else {
            $questionsAndAnswers[] = [$num, 'no'];
        }
    }
    return $questionsAndAnswers;
}


function startEvenGame()
{
    $gameDescription = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

    startGame($gameDescription, makeQuestionsAndAnswers());
}
