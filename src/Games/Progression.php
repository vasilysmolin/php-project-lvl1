<?php

namespace Brain\Games;

use Brain\Engine;

use function cli\line;
use function cli\prompt;

class Progression extends Engine
{
    private $value;
    private $progressionStep = 1;
    private const START = 0;
    private const END = 10;

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
        $this->progressionStep = $this->progressionStep + rand(self::START, self::END);
        $array = $this->randArray();

        line("Question: %s %s", implode(' ', $array));
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
        $val = 0;
        for ($i = self::START; $i < self::END; $i++) {
            $val += $this->progressionStep;
            $array[$i] = $val;
        }

        $replacement = rand(self::START, self::END);
        $this->value = $array[$replacement];
        $array[$replacement] = '..';

        return $array;
    }
}
