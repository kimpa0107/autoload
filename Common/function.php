<?php

function p($var, $isDump = false)
{
    echo '<pre>';
    if ($isDump) {
        var_dump($var);
    } else {
        print_r($var);
    }
    echo '</pre>';
}
