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
        $this->assertEquals(3, $this->calculator->add('1,2'));
    }

    public function testMultyNumStringReturnCount() {
        $this->assertEquals(6, $this->calculator->add('1,2,3'));
    }

    public function testNumStringDelimiterWithNewline() {
        $this->assertEquals(6, $this->calculator->add("1,2\n3"));
    }

    public function testNumStringWithSelfDefineDelimiter() {
        $this->assertEquals(3, $this->calculator->add("//;\n1;2"));
    }

    /**
     * @expectedException NegativeNumNotAllowedException
     */
    public function testNegativeNumNotAllowed() {
        $this->calculator->add('1,-2');
    }

    /**
     * @expectedException NegativeNumNotAllowedException
     */
    public function testNegativeNumsNotAllowed() {
        $this->calculator->add('-1,-2,-3');
    }
}