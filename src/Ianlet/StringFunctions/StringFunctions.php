<?php

namespace Ianlet\StringFunctions;

use InvalidArgumentException;

/**
 * Class StringFunctions
 * @package Ianlet\StringFunctions
 *
 * @author Ian Létourneau <ian.letourneau.1@ulaval.ca>
 */
class StringFunctions
{
    /**
     * Format a string to a snake case string
     * @param $string
     * @return string
     */
    public static function snakeCase($string)
    {
        $string = self::slug($string, '_');

        return $string;
    }

    /**
     * Generate the slug of a string with a given delimiter (default delimiter is '-')
     * @param string $string
     * @param string $delimiter
     * @return string
     */
    public static function slug($string, $delimiter = '-')
    {
        self::guardString($string);

        $string = htmlspecialchars_decode($string, ENT_QUOTES);

        $string = preg_replace('~[^\\pL\d]+~u', $delimiter, $string);
        $string = trim($string, $delimiter);

        $string = iconv('utf-8', 'ASCII//TRANSLIT', $string);

        $string = strtolower($string);
        $string = preg_replace('~[^-\w]+~', '', $string);

        return $string;
    }

    /**
     * Verify that a variable is a string and that it is not empty
     * @param $string
     * @throws \InvalidArgumentException
     */
    public static function guardString($string)
    {
        if (!is_string($string) || empty($string)) {
            throw new InvalidArgumentException('String expected');
        }

        $string = trim($string);

        if (empty($string)) {
            throw new InvalidArgumentException('The string should not be empty');
        }
    }

    public static function isLengthInRange($string, $start, $end)
    {
        self::guardString($string);

        if (!is_int($start) || !is_int($end)) {
            throw new InvalidArgumentException('Start and end value should be integers');
        }

        if ($start < 0 || $end < 0) {
            throw new InvalidArgumentException('Start and end value should be positives');
        }

        if ($start >= $end) {
            throw new InvalidArgumentException('Start value should be less than end value');
        }

        $size = sizeof($string);

        return $size >= $start && $size <= $end;
    }
}
