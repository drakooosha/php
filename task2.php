<?php

function countDays($date)
{
    function validateDate($date)
    {
        $d = DateTime::createFromFormat('d-m-Y', $date);

        return $d && $d->format('d-m-Y') == $date;
    }

    if (validateDate($date)) {
        $arr = explode('-', $date);
        $tm = mktime(0, 0, 0, $arr[1], $arr[0], date('Y') + ($arr[1].$arr[0] <= date('md')));

        return ceil(($tm - time()) / 86400);
    } else {
        throw new InvalidArgumentException('input date in correct format: DD-MM-YYYY');
    }
}
