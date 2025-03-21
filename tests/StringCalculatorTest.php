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
}