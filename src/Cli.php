<?php

namespace Brain;

use function cli\line;
use function cli\prompt;

class Cli
{
    public $userName;

    public function start()
    {
        line('Welcome to the Brain Games! ');
        $this->userName = prompt('May I have your name?');
        line("Hello, %s!", $this->userName);
    }
}
