<?php

namespace App\Services;

class Phone
{
    /**
     * Format a string in a phone number mask. eg: `31912345678` => `(31) 9 1234-5678`
     * @param  string  $value  A number with eleven characters to fill in a mask.
     * @return string
     */
    public function format(mixed $value): mixed
    {
        if (!$value) return $value;
        return implode([
            '(', substr($value, 0, 2), ') ', substr($value, 2, 1), ' ',
            substr($value, 3, 4), '-', substr($value, 7, 4)
        ]);
    }

    /**
     * Remove all non-numeric characters from a string. Expected to return a string with eleven numbers.
     * @param  string  $value
     * @return string
     */
    public function onlyNumbers(mixed $value): mixed
    {
        if (!$value) return $value;
        return preg_replace('/\D/', '', $value);
    }
}
