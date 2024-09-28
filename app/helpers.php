<?php

if (!function_exists('format_number')) {
    /**
     * Format a number with commas.
     *
     * @param float $number
     * @param int $decimals
     * @return string
     */
    function format_number($number, $decimals = 0)
    {
        return number_format($number, $decimals, '.', ',');
    }
}
