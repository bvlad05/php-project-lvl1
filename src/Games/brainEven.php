<?php

namespace Brain\Games\Cli\Games;

use function cli\line;
use function cli\prompt;

function isEven($number): bool
{
    return (int) $number % 2 === 0;
}

function brainEven($name, int $min = 1, int $max = 20, int $round = 3): void
{
    $answers = [];
    $rule = 'Answer "yes" if the number is even, otherwise answer "no".';
    line($rule);
    while (count($answers) < $round) {
        $randomNumber = mt_rand($min, $max);
        line("Question: {$randomNumber}");
        $answer = prompt('Your answer');
        $isEvenNumber = isEven($randomNumber);
        $correct = $isEvenNumber ? 'yes' : 'no';
        $wrong = $isEvenNumber ? 'no' : 'yes';
        if ($answer === $correct) {
            line('Correct!');
            $answers = [...$answers, $answer];
            continue;
        } else {
            line("'{$wrong}' is wrong answer ;(. Correct answer was '{$correct}'.");
            line("Let's try again, {$name}!");
            break;
        }
    }
    if (count($answers) === $round) {
        line("Congratulations, {$name}!");
    }
}
