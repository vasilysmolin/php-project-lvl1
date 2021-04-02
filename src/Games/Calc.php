<?php

declare(strict_types=1);

namespace Brain\Games\Calc;

use function Brain\Engine\start;

use const Brain\Engine\MIN_VALUE;
use const Brain\Engine\MAX_VALUE;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];

function startGame(): void
{
    $round = function (): array {
        $numberOne = rand(MIN_VALUE, MAX_VALUE);
        $numberTwo = rand(MIN_VALUE, MAX_VALUE);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $answer = calculate($numberOne, $numberTwo, $operator);
        $question = "$numberOne $operator $numberTwo";

        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    start(DESCRIPTION, $round);
}

function calculate(int $numberOne, int $numberTwo, $operator): int
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
