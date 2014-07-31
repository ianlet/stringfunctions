<?php

namespace Ianlet\StringFunctions;

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
    static public function snakeCase($string)
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
    static public function slug($string, $delimiter = '-')
    {
        $string = htmlspecialchars_decode($string, ENT_QUOTES);

        $string = preg_replace('~[^\\pL\d]+~u', $delimiter, $string);

        $string = trim($string, $delimiter);

        $string = iconv('utf-8', 'ASCII//TRANSLIT', $string);

        $string = strtolower($string);

        $string = preg_replace('~[^-\w]+~', '', $string);

        return $string;
    }
}
