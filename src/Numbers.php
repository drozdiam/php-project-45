<?php

namespace BrainGames\Numbers;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;

function game()
{
    $arr = ['yes', 'no'];
    $i = 0;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    while ($i < 3) {
        $number = rand(1, 20);
        line('Question: ' . $number);
        $answer = prompt('Your answer');
        foreach ($arr as $item => $value) {
            if ($number % 2 === $item) {
                if ($answer == $value) {
                    line('Correct!');
                    $i++;
                } else {
                    line("'yes' is wrong answer ;(. Correct answer was 'no'.Let's try again, "   . $name . "!");
                    break 2;
                }
            }
        }

        line($i == 3 ? "Congratulations, " . $name : '');
    }
}
