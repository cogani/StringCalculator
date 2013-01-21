<?php

require_once '../../src/StringCalculator.php';

class StringCalculatorTest extends PHPUnit_Framework_TestCase {

    public function testAdd0Parameters() {
        $stCalculator = new StringCalculator();
        $this->assertEquals(0, $stCalculator->add(""));
    }

    public function testAdd1Parameters() {
        $stCalculator = new StringCalculator();
        $this->assertEquals(1, $stCalculator->add("2"));
    }

}
