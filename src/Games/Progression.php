<?php

namespace Brain\Games;

use Brain\Engine;

use function cli\line;
use function cli\prompt;

class Progression extends Engine
{
    private $value;
    private $progression = 0;
    private $progressionStart = 0;

    public function start(): void
    {
        parent::start();
        line('Find the greatest common divisor of given numbers.');
        $this->question();
    }

    public function wrongAnswer(int $value, int $answer): void
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
        $this->progressionStep = rand(0, 10);
        $array = $this->randArray();
        var_dump($this->value);

        line("Question %s %s", implode(' ', $array));
        $answer = prompt('Your answer:');
        if ($this->value == $answer) {
            $this->amountAnswer++;
            line('Correct!');
            $this->question();
        } else {
            parent::wrongAnswer($this->value, $answer);
        }
    }

    private function randArray(): array
    {
        $array = [];

        for ($i = 0; $i < 10; $i++) {
            $this->progression += $this->progressionStep;
            $array[$i] = $this->progression;
        }

        $replacement = rand(0, 9);
        $this->value = $array[$replacement];
        $array[$replacement] = '..';

        return $array;
    }
}
