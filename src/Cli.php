<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function run(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Welcome, %s', $name);
    return $name;
}
