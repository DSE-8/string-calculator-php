<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    public function add(string $numbers): int{
        $sum = 0;
        $numbersArray = preg_split("/[\n,]+/",$numbers);
        foreach($numbersArray as $number){
            $sum += (int) $number;
        } 
        return $sum;
    }
}