<?php
header('Content-Type: text/plain');
$url = "https://apibay.org/q.php?q=from";
$html = @file_get_contents($url);

if ($html === false) {
    die("Failed to retrieve the page. The website might be blocking our request.");
}

// Output the raw HTML source
echo $html;