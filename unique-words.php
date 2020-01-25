<?php
/** Find unique words in a text
 * @param string $text
 * @return mixed|void
 */
function getUniqueWords (string $text) {
    if (empty ($text)) return;

    //get array of words from text
    $arr_words = str_word_count($text, 1);

    //get unique words
    foreach ($arr_words as $key => $value) {
        $value = strtolower($value);
        $arr_words[$key] = $value;
        if (count(array_keys($arr_words, $value)) > 1) unset ($arr_words[$key]);
    }

    return $arr_words;
}

?>
