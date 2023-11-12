<?php

namespace BrainGames\Numbers;

require_once __DIR__ . '/../vendor/autoload.php';

use function BrainGames\Questions\questions;
use function cli\line;
use function cli\prompt;

function game()
{
    $arr = ['yes', 'no'];
    $i = 0;
    $name = questions();
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
                    line("'$answer' is wrong answer ;(. Correct answer was '$value'.Let's try again, "   . $name . "!");
                    break 2;
                }
            }
        }

        line($i == 3 ? "Congratulations, " . $name . '!' : '');
    }
}
