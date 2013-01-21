<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StringCalculator
 *
 * @author nanopc
 */
class StringCalculator {

    public function add($string) {
        $result = 0;

        if ($string == NULL)
            return $result;

        if($this->checkDelimitiers($string)=="error")
            return "error";

        $token = strtok($string, ",\n");

        while ($token !== FALSE) {
            echo "Comprabando:'$token'";
            $result = $result + $token;
            $token = strtok(",\n");
        }

        return $result;
    }

    private function checkDelimitiers($string) {
        if (strrpos($string, ",\n"))
            return "error";
    }

}

?>
