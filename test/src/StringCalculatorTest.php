<?php
require_once '../../src/StringCalculator.php';

class StringCalculatorTest extends PHPUnit_Framework_TestCase {

   

    public function testAdd() {
        $stCalculator = new StringCalculator();
          $this->assertEquals(0, $stCalculator->add(""));
    }

}
