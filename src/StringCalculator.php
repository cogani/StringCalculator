<?php
/**
 * Description of StringCalculator
 *
 * @author nanopc
 */
class StringCalculator {

    public function add($string) {
        $strDelimitiers = ",\n";

        $result = 0;

        if ($string == NULL)
            return $result;

        if ($this->checkTwoDelimitiersTogether($string) == "DelimitiersException")
            return "DelimitiersException";

        $newDelimitier = $this->extractNewDelimitiers($string);
        if ($newDelimitier != NULL)
            $strDelimitiers .= $newDelimitier;

        
        $token = strtok($string, $strDelimitiers);

        while ($token !== FALSE) {
            $result = $result + $token;
            $token = strtok($strDelimitiers);
        }

        return $result;
    }

    public function checkTwoDelimitiersTogether($string) {
        if (strrpos($string, ",\n") !== FALSE || strrpos($string, "\n,") !== FALSE)
            return "DelimitiersException";
    }

    public function extractNewDelimitiers($expression) {
        $newDelimitier = NULL;

        if (!strncmp($expression, "//", 2)) {
            $newDelimitier = $expression{2};
            if ($expression{3} != "\n")
                return "ParseError: Falta finalizador";
        }

        return $newDelimitier;
    }

}

?>
