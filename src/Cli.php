<?php

namespace Brain;

use function cli\line;
use function cli\prompt;

function start()
{
    line('Welcome to the Brain Games! ');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
}
