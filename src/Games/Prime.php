<?php

declare(strict_types=1);

namespace Brain\Games\Prime;

use function Brain\Engine\start;

use const Brain\Engine\MIN_VALUE;
use const Brain\Engine\MAX_VALUE;

const DESC = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function startGame(): void
{
    $round = function (): array {
        $question = rand(MIN_VALUE, MAX_VALUE);
        $answer = isPrime($question) ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    start(DESC, $round);
}

function isPrime(int $number): bool
{
    if ($number == 2) {
        return true;
    }
    if ($number % 2 == 0) {
        return false;
    }
    $i = 3;
    $max_factor = (int)sqrt($number);
    while ($i <= $max_factor) {
        if ($number % $i == 0) {
            return false;
        }
        $i += 2;
    }
    return true;
}
