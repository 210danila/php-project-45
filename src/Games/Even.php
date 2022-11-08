<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greetUser;
use function BrainGames\Engine\endGameWithSuccess;
use function BrainGames\Engine\askQuestion;

function startEvenGame()
{
    $name = greetUser();
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");

    askQuestion(15, 'no', $name);
    askQuestion(6, 'yes', $name);
    askQuestion(7, 'no', $name);

    endGameWithSuccess($name);
}
