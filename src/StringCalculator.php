<?php

namespace Deg540\StringCalculatorPHP;

use Exception;

class StringCalculator
{
    public function add(string $Expresion): int {
        $numbersArray = $this->expresionStringToNumberArray($Expresion);

        $sum = 0;
        $negatives = "";
        $areNegatives = false;
        foreach($numbersArray as $number){
            if($number == null){
                continue;
            }
            if($number > 1000){
                continue;
            }
            if(preg_match("/-.+/",$number)){
                $negatives .= $number.";";
                $areNegatives = true;
            } 
            $sum += (int) $number;
        }

        if($areNegatives){
            throw new Exception("negativos no soportados: ".$negatives);
        } 
        
        return $sum;
    }
    public function expresionStringToNumberArray($Expresion){
        $delimiters = "\n,";
        $numbers = $Expresion;
        if(preg_match("/\/\/.+\n.*/",$numbers)){
            $delimitersAndNumbersArray = explode("\n",$Expresion);
            $delimiters = trim($delimitersAndNumbersArray[0],"/");
            $numbers = $delimitersAndNumbersArray[1] ;
        } 
        if(preg_match("/\[.+\]*/",$delimiters)){
            $delimitersArray = preg_split("/[\[\]]/",$delimiters);
            $delimiters = "";
            foreach($delimitersArray as $delimiter){
                $delimiters .= $delimiter;
            } 
        } 
        $numbersArray = preg_split("/[".$delimiters."]/",$numbers);

        return $numbersArray;
    } 
}