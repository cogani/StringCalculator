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

        if ($string == NULL || $string == "")
            return $result;

        $token = strtok($string, ',');
        if ($token)
            $result = $token;

        $token = strtok(',');
        if ($token)
            $result = $result + $token;

        return $result;
    }

}

?>
