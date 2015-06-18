<?php

require_once 'Calculator.php';

class CalculatorTest extends PHPUnit_Framework_TestCase {
    private $calculator;

    public function __construct() {
        $this->calculator = new Calculator();
    }

    public function testNullStringReturnZero() {
        $this->assertEquals(0, $this->calculator->add(''));
    }

    public function testNumStringReturnNum() {
        $this->assertEquals(1, $this->calculator->add('1'));
    }

    public function testTwoNumStringReturnCount() {
    }
}