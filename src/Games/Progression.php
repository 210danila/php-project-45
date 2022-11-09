<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greetUser;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\endGameWithSuccess;

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

    return [$formattedProgression, $answer];
}


function runThreeProgressionsRounds(string $name)
{
    for ($i = 0; $i < 3; $i++) {
        $progression = createProgression();
        [$formattedProgression, $answer] = hideSymbol($progression);

        askQuestion($formattedProgression, $answer, $name);
    }
    return ;
}


function startProgressionGame()
{
    $name = greetUser();
    line("What number is missing in the progression?");

    runThreeProgressionsRounds($name);
    endGameWithSuccess($name);
    return;
}
