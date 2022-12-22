<?php

function convertString(string $input)
{
    $wordsArr = explode(',', preg_replace('/ |-|_/', ',', trim($input)));
    foreach ($wordsArr as &$value) {
        $value = strtoupper($value[0]).substr($value, 1);
    }

    return implode('', $wordsArr);
}

convertString('The quick-brown_fox jumps over the_lazy-dog');
