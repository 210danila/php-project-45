<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function BrainGames\Engine\greetUser;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\endGameWithSuccess;

function isPrime(int $num)
{
    for ($divider = 2; $divider <= ceil(sqrt($num)); $divider++) {
        if ($num % $divider == 0) {
            return false;
        }
    }
    return true;
}


function runThreePrimeRounds(string $name)
{
    for ($i = 0; $i < 3; $i++) {
        $num = rand(2, 199);
        if (isPrime($num)) {
            askQuestion(((string) $num), 'yes', $name);
        } else {
            askQuestion(((string) $num), 'no', $name);
        }
    }
    return ;
}


function startPrimeGame()
{
    $name = greetUser();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    runThreePrimeRounds($name);
    endGameWithSuccess($name);
    return ;
}
