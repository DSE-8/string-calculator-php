<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    public function add(string $Expresion): int{
        $sum = 0;
        $delimiters = "\n,";
        $numbers = $Expresion;
        if(preg_match("/\/\/.+\n.*/",$Expresion)){
            $delimitersAndNumbersArray = explode("\n",$Expresion);
            $delimiters = trim($delimitersAndNumbersArray[0],"/");
            $numbers = $delimitersAndNumbersArray[1] ;
        } 
        $numbersArray = preg_split("/[".$delimiters."]+/",$numbers);
        foreach($numbersArray as $number){
            $sum += (int) $number;
        } 
        return $sum;
    }
}