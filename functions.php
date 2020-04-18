<?php

/**
 * Сортировка массива
 */
function sortPlus($key)
{
    return function($a, $b) use ($key){
        return $a[$key] > $b[$key] ? 1 : -1;
    };
}
