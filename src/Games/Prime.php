<?php

declare(strict_types=1);

namespace Brain\Games\Prime;

use function Brain\Engine\start;

use const Brain\Engine\MIN_VALUE;
use const Brain\Engine\MAX_VALUE;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function startGame(): void
{
    $generateRound = function (): array {
        $question = rand(MIN_VALUE, MAX_VALUE);
        $answer = isPrime($question) ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    start(DESCRIPTION, $generateRound);
}

function isPrime(int $num): bool
{
    if ($num == 2) {
        return true;
    }
    if ($num % 2 == 0 || $num == 1) {
        return false;
    }
    $i = 3;
    $max_factor = (int)sqrt($num);
    while ($i <= $max_factor) {
        if ($num % $i == 0) {
            return false;
        }
        $i += 2;
    }
    return true;
}
