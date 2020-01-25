<?php
/** Function to filter emoticons
 * @param string $text
 * @return string|void
 */
function emoticonsFilter (string $text) {
    if (empty ($text)) return;

    $output = "";

    return $output .= preg_replace(array ("/\)+/","/\(+/"), array (")","("), $text);
}

?>