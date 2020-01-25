<?php
/** Find lucky tickets
 * @return string
 */
function luckyTickets () {
    //Lucky tickets total
    $total = 0;
    //Lucky tickets matches
    $output = "";

    // Find sums of all 3-digit numbers
    for ($i = 1; $i <= 999; $i++) {
        $sum = 0;
        $digit = $i;

        // Find sums from 1 to 27 for all numbers
        while ($digit > 0) {
            $sum += $digit % 10;
            $digit = floor($digit / 10);
        }

        //Save numbers for every sum
        !empty ($array[$sum]) ? array_push($array[$sum], $i) : $array[$sum] = [$i];
    }

   // Return all matches
    foreach ($array as $index => $value) {
       $output .= "\nSum : $index\n";
       $count_val = count($value);

       for ($i = 0; $i < $count_val; $i++) {
           for ($j = 0; $j < $count_val; $j++) {
                $output .= sprintf("%03d", $value[$i]) . sprintf("%03d", $value[$j])." ";
                $total++;
           }
        }

       $output .= "\n";
    }

    return "Lucky tickets total: $total\n" . $output;
}

?>