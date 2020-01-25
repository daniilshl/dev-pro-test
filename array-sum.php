<?php
/** Calculate array sum for nested arrays
 * @param array $array
 * @param int $sum
 * @return int|string
 */
function getMultiArraySum (array $array, &$sum = 0) {
    //get array sum
    foreach ($array as $value) {

        //check if it's a multi-level array
        if (is_array($value)) {
            //recursive call to go through given array depth
            getMultiArraySum($value, $sum);
        } elseif (is_numeric($value)) {
            $sum += $value;
        }

    }
    return $sum;
}

?>