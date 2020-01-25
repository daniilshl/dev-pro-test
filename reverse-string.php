<?php
/** Reverse string
 * @param string $string
 * @return string|void
 */
function custom_strrev (string $string) {
    if (empty ($string)) return;

    //check if it's a palindrome
    $start = 0;
    $end = custom_strlen($string) - 1;

    while ($start < $end) {

        if ($string[$start] !== $string[$end]) {
            //reverse string
            $end = custom_strlen($string) - 1;

            for ($start = 0; $start < $end/2; $start++) {
                $temp = $string[$start];
                $string[$start] = $string[$end-$start];
                $string[$end-$start] = $temp;
            }

            return $string;
        }

        $start++;
        $end--;
    }

    //It's a palindrome
    return $string;
}

/**
 * @param string $string
 * @param int $i
 * @return int
 */
function custom_strlen (string $string, int $i = 0) {
    //return string's length
    return isset ($string[$i]) ? custom_strlen($string, $i + 1) : $i;
}

?>