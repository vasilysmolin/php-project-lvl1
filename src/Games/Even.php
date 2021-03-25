<?php

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

class Even
{

    private const WIN = 3;
    private $amountAnswer = 0;

    public function start(): void
    {
        line('Welcome to the Brain Games! ');
        $this->userName = prompt('May I have your name?');
        line("Hello, %s!", $this->userName);
        line('Answer "yes" if the number is even, otherwise answer "no".');
        $this->question();
    }

    private function question(): void
    {
        $this->isWin();
        $number = $this->rand();
        $string = $this->oddOrEven($number);

        line("Question " . $number);
        $answer = mb_strtolower(prompt('Your answer:'));
        if ($string === $answer) {
            $this->amountAnswer++;
            line('Correct!');
            $this->question();
        } else {
            line("%s is wrong answer ;(. Correct answer was %s .", $answer, $string);
            line("Let's try again, %s!", $this->userName);
            $this->amountAnswer = 0;
            $this->start();
        }
    }

    private function isWin(): void
    {
        if ($this->amountAnswer >= self::WIN) {
            line('Congratulations, %s!', $this->userName);
            exit();
        }
    }

    private function rand(): int
    {
        return rand(0, 100);
    }

    private function oddOrEven(int $number): string
    {
        if ($number % 2 === 0) {
            return "yes";
        } else {
            return "no";
        }
    }
}
