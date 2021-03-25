<?php

namespace Brain\Games;

use Brain\Engine;

use function cli\line;
use function cli\prompt;

class Even extends Engine
{
    public function start(): void
    {
        parent::start();
        line('Answer "yes" if the number is even, otherwise answer "no".');
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
        $this->isWin();
        $number = $this->rand();
        $string = $this->oddOrEven($number);

        line("Question %d ", $number);
        $answer = mb_strtolower(prompt('Your answer:'));
        if ($string === $answer) {
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

    private function oddOrEven(int $number): string
    {
        return ($number % 2 === 0) ? "yes" : "no";
    }
}
