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
        line("Question %s", $number);

        $answer = prompt('Your answer:');

        if ($answer === "yes") {
            $answerBool = $this->answerToBool($answer);
        } elseif ($answer === "no") {
            $answerBool = $this->answerToBool($answer);
        } else {
            parent::wrongAnswer($bool, $answer);
        }

        if ($bool == $answerBool) {
            $this->amountAnswer++;
            line('Correct!');
            $this->question();
        } else {
            parent::wrongAnswer($bool, $answer);
        }
    }

    private function rand(): int
    {
        return rand(self::MIN_VALUE, self::MAX_VALUE);
    }

    private function isPrime(int $number): bool
    {

        if (gmp_prob_prime($number) === 0) {
            return false;
        }

        return true;
    }

    private function answerToBool(string $answer): bool
    {
        return ($answer === "yes") ? true : false;
    }
}
