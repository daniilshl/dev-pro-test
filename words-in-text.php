<?php
/** Find unique words in a text and count their appearance
 * @param string $text
 * @return array|void
 */
function getUniqueWords (string $text) {
    if (empty ($text)) return;

    $arr_sorted = array ();

    //get array of words from text
    $arr_words = str_word_count($text, 1);

    //get sorted words
    foreach ($arr_words as $value) {
        $value = strtolower($value);
        !empty ($arr_sorted[$value]) ? $arr_sorted[$value]++ : $arr_sorted[$value] = 1;
    }

    return $arr_sorted;
}

?>