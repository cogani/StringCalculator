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
            "4 arg" => array(34, "12.5,10.5,10,    1"),
            "Mix NL & comma" => array(6, "1\n2,3"),
            "End with ,\n" => array("error", "1,2,3,\n"),
            " ,\n in the middle" => array("error", "1,2,3,\n,5")
        );
    }

    /**
     * @dataProvider getArgumentsTestCases
     */
    public function testAddParameters($expected, $argument) {
        $stCalculator = new StringCalculator();
        $this->assertEquals($expected, $stCalculator->add($argument));
    }

}
