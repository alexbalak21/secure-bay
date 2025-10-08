<?php
$url = "https://thepiratebay.org/index.html";
$html = file_get_contents($url);
echo $html;
