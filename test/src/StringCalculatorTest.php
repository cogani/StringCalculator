<?php

require_once '../../src/StringCalculator.php';

class StringCalculatorTest extends PHPUnit_Framework_TestCase {

    public function getArgumentsTestCases() {
        return array(
            "ningun argumento" => array(1, "1"),
            "1 arg" => array(0, ""),
            "2 arg" => array(2, "2"),
            "3 arg" => array(23, "12.5,10.5"),
            "4 arg" => array(34, "12.5,10.5,10,    1")
        );
    }

    /**
     * @dataProvider getArgumentsTestCases
     */
    public function testAdd4Parameters($expected, $argument) {
        $stCalculator = new StringCalculator();
        $this->assertEquals($expected, $stCalculator->add($argument));
    }

}
