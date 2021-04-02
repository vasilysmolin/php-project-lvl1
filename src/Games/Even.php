<?php

declare(strict_types=1);

namespace Brain\Games\Even;

use function Brain\Engine\start;

use const Brain\Engine\MIN_VALUE;
use const Brain\Engine\MAX_VALUE;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function startGame(): void
{
    $round = function (): array {
        $question = rand(MIN_VALUE, MAX_VALUE);
        $answer = isEven($question) ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    start(DESCRIPTION, $round);
}

function isEven(int $number): bool
{
    return $number % 2 == 0 ;
}
