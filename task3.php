<?php

    function digitSum(int $number)
    {
        if ($number > 9) {
            $number = strval($number);
            $newNumber = 0;
            for ($i = 0; $i < strlen($number); $i++) {
                $newNumber += intval($number[$i]);
            }

            return digitSum($newNumber);
        } else {
            return $number;
        }
    }
