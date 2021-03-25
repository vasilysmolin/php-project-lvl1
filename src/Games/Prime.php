<?php

namespace Brain\Games;

use Brain\Engine;

use function cli\line;
use function cli\prompt;

class Prime extends Engine
{
    private $value;

    public function start(): void
    {
        parent::start();
        line('"yes" if given number is prime. Otherwise answer "no".');
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
        $number = $this->rand();
        $bool = $this->isPrime($number);
        line("Question: %s", $number);

        $answer = prompt('Your answer:');

        if ($answer === "yes") {
            $answerBool = $this->answerToBool($answer);
        } elseif ($answer === "no") {
            $answerBool = $this->answerToBool($answer);
        } else {
            parent::wrongAnswer($answerBool, $answer);
        }

        if ($bool == $answerBool) {
            $this->amountAnswer++;
            line('Correct!');
            $this->question();
        } else {
            parent::wrongAnswer($answerBool, $answer);
        }
    }

    private function rand(): int
    {
        return rand(self::MIN_VALUE, self::MAX_VALUE);
    }

    private function isPrime(int $number): bool
    {

        if ($number == 2) {
            return true;
        }
        if ($number % 2 == 0) {
            return false;
        }
        $i = 3;
        $max_factor = (int)sqrt($number);
        while ($i <= $max_factor) {
            if ($number % $i == 0) {
                return false;
            }
            $i += 2;
        }
        return true;
    }

    private function answerToBool(string $answer): bool
    {
        return ($answer === "yes") ? true : false;
    }
}
