<?php

function validUrl(string $input)
{
    return boolval(preg_match("/^((https?:\/\/|www.)[a-z0-9.-]+\.[a-z]{2,4}\/?)$/", $input)) ? 'OK' : 'Not a valid URL';
}
