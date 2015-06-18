<?php

require_once 'Calculator.php';

class CalculatorTest extends PHPUnit_Framework_TestCase {
    public function testNullStringReturnZero() {
        $calculator = new Calculator();
        $this->assertEquals(0, $calculator->add(''));
    }

    public function testNumStringReturnNum() {
        $calculator = new Calculator();
        $this->assertEquals(1, $calculator->add('1'));
    }
}