<?php

declare(strict_types=1);

namespace Brain\Games\Progression;

use function Brain\Engine\start;

use const Brain\Engine\MIN_VALUE;
use const Brain\Engine\MAX_VALUE;

const DESC = 'What number is missing in the progression?';

function startGame(): void
{
    $round = function (): array {
        $start = rand(MIN_VALUE, MAX_VALUE);
        $progressionStep = rand(MIN_VALUE, MAX_VALUE);
        $progressionLength = MAX_VALUE;
        $minIndex = MIN_VALUE;
        $hiddenIndex = rand($minIndex, $progressionLength - 1);

        for ($i = MIN_VALUE; $i < $progressionLength; $i++) {
            if ($i == MIN_VALUE) {
                $numbers[$i] = $start;
            } else {
                $numbers[$i] = $start + $i * $progressionStep;
            }
            if ($i == $hiddenIndex) {
                $numbers[$i] = '..';
                $answer = $start + $i * $progressionStep;
            }
        }

        $question = implode(' ', $numbers);
        return [
            'question' => $question,
            'answer' => (string) $answer
        ];
    };

    start(DESC, $round);
}
