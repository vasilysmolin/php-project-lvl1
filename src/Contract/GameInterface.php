<?php

namespace Brain\Contract;

interface GameInterface
{
    public function start(): void;
    public function wrongAnswer(int $value, int $answer): void;
    public function isWin(): void;
}
