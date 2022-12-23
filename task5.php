<?php


function outNumber(int $A, int $B, string $output = '')
{
    $output .= "$A,";

    return ($A < $B ? outNumber(++$A, $B, $output) : ($A > $B ? outNumber(--$A, $B, $output) : substr($output, 0, strlen($output) - 1)));
}
