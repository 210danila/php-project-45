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
        $questionsAndAnswers[] = $num % 2 === 0 ? [$num, 'yes'] : [$num, 'no'];
    }
    return $questionsAndAnswers;
}


function startNewGame()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';

    startGame($gameDescription, makeQuestionsAndAnswers());
}
