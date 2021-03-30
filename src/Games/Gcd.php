<?php

declare(strict_types=1);

namespace Brain\Games\Gcd;

use function Brain\Engine\start;

use const Brain\Engine\MIN_VALUE;
use const Brain\Engine\MAX_VALUE;

const DESC = 'Find the greatest common divisor of given numbers.';

function startGame(): void
{
    $round = function (): array {
        $randomNumberOne = rand(MIN_VALUE, MAX_VALUE);
        $randomNumberTwo = rand(MIN_VALUE, MAX_VALUE);
        var_dump($randomNumberOne);
        var_dump($randomNumberTwo);
        $question = "{$randomNumberOne} {$randomNumberTwo}";
        $answer = gcd($randomNumberOne, $randomNumberTwo);
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    start(DESC, $round);
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
