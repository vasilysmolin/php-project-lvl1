<?php

declare(strict_types=1);

namespace Brain\Games\Gcd;

use function Brain\Engine\start;

use const Brain\Engine\MIN_VALUE;
use const Brain\Engine\MAX_VALUE;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function startGame(): void
{
    $generateRound = function (): array {
        $numberOne = rand(MIN_VALUE, MAX_VALUE);
        $numberTwo = rand(MIN_VALUE, MAX_VALUE);
        $question = "$numberOne $numberTwo";
        $answer = gcd($numberOne, $numberTwo);
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    start(DESCRIPTION, $generateRound);
}

function gcd(int $n, int $m): int
{
    while ($n != $m) {
        if ($n > $m) {
            $n = $n - $m;
        } else {
            $m = $m - $n;
        }
    }
    return $n;
}
