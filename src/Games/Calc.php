<?php

declare(strict_types=1);

namespace Brain\Games\Calc;

use function Brain\Engine\start;

use const Brain\Engine\MIN_VALUE;
use const Brain\Engine\MAX_VALUE;

const DESC = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];

function startGame(): void
{
    $round = function (): array {

        $operator = OPERATORS[array_rand(OPERATORS)];
        $numberOne = rand(MIN_VALUE, MAX_VALUE);
        $numberTwo = rand(MIN_VALUE, MAX_VALUE);
        $question = "$numberOne $operator $numberTwo";
        $answer = calculate($operator, $numberOne, $numberTwo);

        return [
            'question' => $question,
            'answer' => (int) $answer
        ];
    };

    start(DESC, $round);
}

function calculate($operator, int $numberOne, int $numberTwo): int
{
    switch ($operator) {
        case "+":
            return $numberOne + $numberTwo;
        case "-":
            return $numberOne - $numberTwo;
        case "*":
            return $numberOne * $numberTwo;
        default:
            throw new \Exception("Not found operator: $operator!");
    }
}
