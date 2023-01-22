<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDSCOUNT;

function startNewGame()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDSCOUNT; $i++) {
        $num = rand(0, 100);
        $questionsAndAnswers[] = $num % 2 === 0 ? [$num, 'yes'] : [$num, 'no'];
    }

    startGame($gameDescription, $questionsAndAnswers);
}
