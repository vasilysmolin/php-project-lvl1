<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;
const MIN_VALUE = 1;
const MAX_VALUE = 10;

function start(string $DESCRIPTION, callable $generateRound): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($DESCRIPTION);

    for ($roundNumber = 1; $roundNumber <= ROUNDS_COUNT; $roundNumber++) {
        ['question' => $question, 'answer' => $answer] = $generateRound();
        line("Question: %s", $question);
        $userAnswer = prompt('Your answer');

        if ($userAnswer == $answer) {
            line('Correct!');
        } else {
            line("'%s!' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $answer);
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line("Congratulations, $name!");
}
