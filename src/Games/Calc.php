<?php

namespace Brain\Games;

use Brain\Engine;

use function cli\line;
use function cli\prompt;

class Calc extends Engine
{
    private $value;

    public function start(): void
    {
        parent::start();
        line('What is the result of the expression?');
        $this->question();
    }

    public function wrongAnswer($value, $answer): void
    {
        parent::wrongAnswer();
    }

    public function isWin(): void
    {
        parent::isWin();
    }

    private function question(): void
    {
        parent::isWin();

        $numberFirst = $this->rand();
        $numberSecond = $this->rand();
        $string = $this->stringExample($numberFirst, $numberSecond);

        line("Question: %s", $string);
        $answer = prompt('Your answer:');
        if ($this->value == $answer) {
            $this->amountAnswer++;
            line('Correct!');
            $this->question();
        } else {
            parent::wrongAnswer($this->value, $answer);
        }
    }

    private function rand(): int
    {
        return rand(self::MIN_VALUE, self::MAX_VALUE);
    }

    private function stringExample(int $numberFirst, int $numberSecond): string
    {
        $array = array("+","-","*");
        $operator = $array[array_rand($array, 1)];

        switch ($operator) {
            case "+":
                $this->value = $numberFirst + $numberSecond;
                break;
            case "-":
                $this->value = $numberFirst - $numberSecond;
                break;
            case "*":
                $this->value = $numberFirst * $numberSecond;
                break;
            default:
                return false;
        }
        return "$numberFirst $operator $numberSecond";
    }
}
