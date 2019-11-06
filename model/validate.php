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

}
