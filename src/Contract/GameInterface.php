<?php

namespace Brain\Contract;

interface GameInterface
{
    public function start(): void;
    public function wrongAnswer($value, $answer): void;
    public function isWin(): void;
}
