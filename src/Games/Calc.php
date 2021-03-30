<?php

//declare(strict_types=1);

namespace Brain\Games\Calc;

use function Brain\Engine\start;

const DESC = 'What is the result of the expression?';

function startGame(): void
{
    $generateRound = function (): array {

        $operators = array('+', '-', '*');
        $operator = $operators[array_rand($operators)];
        $minNumber = 1;
        $maxNumber = 100;
        $numberOne = rand($minNumber, $maxNumber);
        $numberTwo = rand($minNumber, $maxNumber);
        $question = "{$numberOne} {$operator} {$numberTwo}";
        $answer = calculate($operator, $numberOne, $numberTwo);

        return [
            'question' => $question,
            'answer' => (int) $answer
        ];
    };

    start(DESC, $generateRound);
}


function calculate($operator, $numberOne, $numberTwo): int
{
    switch ($operator) {
        case "+":
            return $numberOne + $numberTwo;
        case "-":
            return $numberOne - $numberTwo;
        case "*":
            return $numberOne * $numberTwo;
        default:
            throw new \Exception("Unknown operator value: $operator!");
    }
}

