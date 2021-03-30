<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const ROUND_TO_WIN = 3;
const MIN_VALUE = 0;
const MAX_VALUE = 9;

function start(string $description, callable $generateRound): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);

    for ($roundGame = 1; $roundGame <= ROUND_TO_WIN; $roundGame++) {
        ['question' => $question, 'answer' => $answer] = $generateRound();
        line("Question: $question");
        $yourAnswer = prompt('Your answer');

        if ($yourAnswer == $answer) {
            line('Correct!');
        } else {
            line("'%s!' is wrong answer ;(. Correct answer was '%s'.", $yourAnswer, $answer);
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line("Congratulations, $name!");
}
