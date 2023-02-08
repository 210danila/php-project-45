<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function startNewGame()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num = rand(0, 100);
        $questionsAndAnswers[] = $num % 2 === 0 ? [$num, 'yes'] : [$num, 'no'];
    }

    startGame(GAME_DESCRIPTION, $questionsAndAnswers);
}
