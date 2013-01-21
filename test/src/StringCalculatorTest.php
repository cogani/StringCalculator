<?php

require_once '../../src/StringCalculator.php';

class StringCalculatorTest extends PHPUnit_Framework_TestCase {

    public function getArgumentsTestCases() {
        return array(
            "sin argumento" => array(0, NULL),
            "argumento vacio" => array(0, ""),
            "1 arg" => array(5, "5"),
            "2 arg" => array(2, "2"),
            "3 arg" => array(23, "12.5,10.5"),
            "4 arg" => array(34, "12.5,10.5,10,    1")
        );
    }

    /**
     * @dataProvider getArgumentsTestCases
     */
    public function testAddParameters($expected, $argument) {
        $stCalculator = new StringCalculator();
        $this->assertEquals($expected, $stCalculator->add($argument));
    }

    public function testAdd4ParametersWithNewLineOk() {
        $stCalculator = new StringCalculator();
        $this->assertEquals(6, $stCalculator->add("1\n2,3"));
    }

    public function testAdd4ParametersWithNewLineNotOk() {
        $stCalculator = new StringCalculator();
        $this->assertEquals("error", $stCalculator->add("1,2,3,\n"));
    }

    public function testAdd4ParametersWithNewLineNotOk2() {
        $stCalculator = new StringCalculator();
        $this->assertEquals("error", $stCalculator->add("1,2,3,\n,5"));
    }

}
