<?php

namespace Brain;

use Brain\Contract\GameInterface;

use function cli\line;
use function cli\prompt;

class Engine implements GameInterface
{

    protected const WIN = 3;
    protected const MIN_VALUE = 0;
    protected const MAX_VALUE = 100;
    protected $amountAnswer = 0;
    protected $userName;

    public function start(): void
    {

        line('Welcome to the Brain Games! ');
        $this->userName = prompt('May I have your name?');
        line("Hello, %s!", $this->userName);
    }

    public function wrongAnswer($value, $answer): void
    {
        line("%s is wrong answer ;(. Correct answer was %s .", $answer, $value);
        line("Let's try again, %s!", $this->userName);
        $this->amountAnswer = 0;
        $this->start();
    }

    public function isWin(): void
    {
        if ($this->amountAnswer >= self::WIN) {
            line('Congratulations, %s!', $this->userName);
            exit();
        }
    }
}
