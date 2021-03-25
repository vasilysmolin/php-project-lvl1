<?php

namespace Brain\Games;

use Brain\Engine;

use function cli\line;
use function cli\prompt;

class Gcd extends Engine
{
    private $value;

    public function start(): void
    {
        parent::start();
        line('Find the greatest common divisor of given numbers.');
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
        $this->gcd($numberFirst, $numberSecond);

        line("Question: %s %s", $numberFirst, $numberSecond);
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

    private function gcd(int $n, int $m): void
    {
        if ($m > 0) {
            $this->gcd($m, $n % $m);
        } else {
            $this->value = abs($n);
        }
    }
}
