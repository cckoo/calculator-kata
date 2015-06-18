<?php

require_once 'Calculator.php';

class CalculatorTest extends PHPUnit_Framework_TestCase {
    public function testNullStringReturnZero() {
        $calculator = new Calculator();
        $this->assertEquals(0, $calculator->add(''));
    }
}