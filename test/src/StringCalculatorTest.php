<?php

require_once '../../src/StringCalculator.php';

class StringCalculatorTest extends PHPUnit_Framework_TestCase {

    public function getArgumentsOkTestCases() {
        return array(
            "sin argumento" => array(0, NULL),
            "argumento vacio" => array(0, ""),
            "1 arg" => array(5, "5"),
            "2 arg-A" => array(8, "2,6"),
            "2 arg-B" => array(23, "12.5,10.5"),
            "3 arg" => array(10, "2,6,2"),
            "4 arg" => array(34, "12.5,10.5,10,    1"),
            "Mix NL & comma" => array(6, "1\n2,3"),
            "Change delimitier" => array("3", "//;\n1;2")
        );
    }

    public function getArgumentsFaultTestCases() {
        return array(
            "End with ,NL" => array("DelimitiersException", "1,2,3,\n"),
            " ,NL in the middle" => array("DelimitiersException", "1,2,3,\n,5")
        );
    }

    public function getArgumentsParseNewDelmitiers() {
        return array(
            "No new delimitiers" => array(NULL, "1,2"),
            "Arg Ok ->;" => array(';', "//;\n1;2"),
            "Arg Ok ->-" => array("*", "//*\n1;2"),
            "NewDelimitier ParseError, Falta NL" => array('ParseError: Falta finalizador', "//-1;2")
        );
    }

    /**
     * @dataProvider getArgumentsOkTestCases
     */
    public function _testAddParameters($expected, $argument) {
        $stCalculator = new StringCalculator();
        $this->assertEquals($expected, $stCalculator->add($argument));
    }

    /**
     * @dataProvider getArgumentsFaultTestCases
     */
    public function testAddParametersWithFaults($expected, $argument) {
        $stCalculator = new StringCalculator();
        $this->assertEquals($expected, $stCalculator->add($argument));
    }

    public function _testAddParametersWithDelimitiers() {
        $stCalculator = new StringCalculator();
        $this->assertEquals("3", $stCalculator->add("//;\n1;2"));
    }

    /**
     * @dataProvider getArgumentsParseNewDelmitiers
     */
    public function _testArgumentsParseNewDelmitiers($expected, $argument) {
        $stCalculator = new StringCalculator();
        $this->assertEquals($expected, $stCalculator->extractNewDelimitiers($argument));
    }

    public function _testCheckTwoDelimitiersTogether() {
        $stCalculator = new StringCalculator();
        $this->assertEquals("DelimitiersException", $stCalculator->checkTwoDelimitiersTogether(",\n"));
        $this->assertEquals("DelimitiersException", $stCalculator->checkTwoDelimitiersTogether("\n,"));
        $this->assertEquals("DelimitiersException", $stCalculator->checkTwoDelimitiersTogether(",,"));
        $this->assertEquals(NULL, $stCalculator->checkTwoDelimitiersTogether(","));
    }

}
