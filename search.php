<?php

$query = $_GET['q'];

$query = str_replace(" ", "+", $query);

$url = "https://thepiratebay.org/search.php?q=from&all=on&search=Pirate+Search&page=0&orderby=";
$html = file_get_contents($url);
echo $html;
