<?php

require_once '../../src/StringCalculator.php';

class StringCalculatorTest extends PHPUnit_Framework_TestCase {

    public function testAdd0Parameters() {
        $stCalculator = new StringCalculator();
        $this->assertEquals(0, $stCalculator->add(""));
    }

    public function testAdd1Parameters() {
        $stCalculator = new StringCalculator();
        $this->assertEquals(2, $stCalculator->add("2"));
    }

    public function testAdd2Parameters() {
        $stCalculator = new StringCalculator();
        $this->assertEquals(23, $stCalculator->add("12.5,10.5"));
    }

}
