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

        $numberOne = rand(MIN_VALUE, MAX_VALUE);
        $numberTwo = rand(MIN_VALUE, MAX_VALUE);
        $answer = calculate($numberOne, $numberTwo);
        $operator = $answer['operator'];
        $question = "$numberOne $operator $numberTwo";

        return [
            'question' => $question,
            'answer' => $answer['num']
        ];
    };

    start(DESC, $round);
}

function calculate(int $numberOne, int $numberTwo): array
{
    $operator = OPERATORS[array_rand(OPERATORS)];
    switch ($operator) {
        case "+":
            return
                    [
                        'num' => $numberOne + $numberTwo,
                        'operator' => $operator,
                    ];
        case "-":
            return
                    [
                        'num' => $numberOne - $numberTwo,
                        'operator' => $operator,
                    ];
        case "*":
            return
                    [
                        'num' => $numberOne * $numberTwo,
                        'operator' => $operator,
                    ];
        default:
            throw new \Exception("Not found operator: $operator!");
    }
}
