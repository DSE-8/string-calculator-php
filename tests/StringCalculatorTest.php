<?php

declare(strict_types=1);

namespace Deg540\StringCalculatorPHP\Test;

use Deg540\StringCalculatorPHP\StringCalculator;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

final class StringCalculatorTest extends TestCase
{
    private StringCalculator $stringCalculator;
    protected function setUp(): void{
        parent::setup();
        $this->stringCalculator = new StringCalculator();
    } 
    /**
     * @test
     */
    public function emptyStrAddsZero(){
        $sum = $this->stringCalculator->add("");

        assertEquals(0,$sum);
    }
    /**
     * @test
     */
    public function sizeOneStrAddsItself(){
        $sum = $this->stringCalculator->add("5");

        assertEquals(5,$sum);
    }
    /**
     * @test
     */
    public function sizeTwoStrAddsTheirSum(){
        $sum = $this->stringCalculator->add("2,5");

        assertEquals(7,$sum);
    }
    /**
     * @test
     */
    public function sizeGreaterThanTwoStrAddsTheirSum(){
        $sum = $this->stringCalculator->add("2,5,3,10");

        assertEquals(20,$sum);
    }
    /**
     * @test
     */
    public function lineJumpIsValidSeparator(){
        $sum = $this->stringCalculator->add("2,5\n3\n10");

        assertEquals(20,$sum);
    }
    /**
     * @test
     */
    public function customValidSeparators(){
        $sum = $this->stringCalculator->add("//;\n3;10");

        assertEquals(13,$sum);
    }
}
/*
4. Soporta diferentes delimitadores
    * Para cambiar un delimitador, el comienzo del string debe contener una línea separada que sea como esta: "//[delimitador]\n[números...]". Por ejemplo: "//;\n1;2" debe dar como resultado 3 donde el delimitador por defecto es ";".
    * La primera línea es opcional. Todos los escenarios existentes hasta ahora, deben estar soportados.
*/