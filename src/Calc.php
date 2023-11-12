<?php

namespace BrainGames\Calc;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;
use function BrainGames\Questions\questions;

function calc()
{
    $name = questions();
    line('What is the result of the expression?');
    $i = 0;
    $arr = ['+', '-','*'];
    while ($i < 3) {
        $numberOne = rand(1, 30);
        $numberTo = rand(1, 30);
        $action = $arr[rand(0,2)];
        line('Question: ' . $numberOne . ' ' . $action . ' ' . $numberTo);
        $answer = (int) prompt('Your answer');
        switch ($action){
            case '+':
                $res = $numberOne + $numberTo;
                break;
            case '-':
                $res = $numberOne - $numberTo;
                break;
            case '*':
                $res = $numberOne * $numberTo;
                break;
        }
        if($res !== $answer) {
            line("'$answer' is wrong answer ;(. Correct answer was '$res'.
            Let's try again, $name!);");
            return;
        }else{
            line('Correct!');
            $i++;
        }

        line($i == 3 ? "Congratulations, " . $name . '!' : '');
    }
}
