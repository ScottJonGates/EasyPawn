<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of validate
 *
 * @author Scott
 */
class Validate {

    public static function LengthToShort($word, $length) {

        if (strlen($word) > $length) {
            $valid = FALSE;
        } else {
            $valid = TRUE;
        }
        return $valid;
    }

    public static function LengthTolong($word, $length) {

        if (strlen($word) < $length) {
            $valid = FALSE;
        } else {
            $valid = TRUE;
        }
        return $valid;
    }

    public static function validateDate($date, $format) { // https://www.codexworld.com/how-to/validate-date-input-string-in-php/
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

}
