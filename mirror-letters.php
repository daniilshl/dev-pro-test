<?php
/** Mirror letters for given string
 * @param string $text
 * @return string|void
 */
function doctorStrange (string $text) {
    if (empty ($text)) return;

    $output = "";

    $alphabet = array (
            "uppercase" => array (
                'ASC' => range('A', 'Z'),
                'DESC' => range('Z', 'A')
            ),
            "lowercase" => array (
                'ASC' => range('a', 'z'),
                'DESC' => range('z', 'a')
            )
    );

    //get array of words from text
    $arr_words = str_word_count($text, 1);

    //replace letters
    foreach ($arr_words as $value) {
        $length = strlen($value);

        for ($i = 0; $i < $length; $i++) {

            if (ctype_upper($value[$i])) {
                $index = array_search($value[$i], $alphabet['uppercase']['ASC']);
                $output .= $alphabet['uppercase']['DESC'][$index];
            } else {
                $index = array_search($value[$i], $alphabet['lowercase']['ASC']) ;
                $output .= $alphabet['lowercase']['DESC'][$index];
            }

        }
        $output .= " ";
    }

    return $output;
}

?>