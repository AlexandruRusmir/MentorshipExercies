<?php

class Util
{

    const UPPER_CASE = 'UPPER';
    const LOWER_CASE = 'LOWER';

    static function switchCaseOfWords(string $text, string $case): string
    {
        if ($case == self::UPPER_CASE) {
            return ucwords($text);
        }

        if ($case == self::LOWER_CASE) {
            $pieces = explode(" ", $text);
            $resultString = '';
            foreach ($pieces as $piece) {
                $piece = lcfirst($piece);
                $resultString .= $piece . ' ';
            }

            return $resultString;
        }

        return $text;
    }
}