<?php
// Sample JSON data (you can replace this with your actual JSON input)
$jsonData = '{
  "id": "79687444",
  "name": "Ballerina.From.the.World.of.John.Wick.2025.1080p.WEBRip.AAC5.1.10bits.x265-Rapta",
  "info_hash": "9B097A628D8E54D05B0EA0F03C82D589EE009396",
  "leechers": "153",
  "seeders": "661",
  "num_files": "1",
  "size": "1670279691",
  "username": "RaptaGzus",
  "added": "1751354516",
  "status": "vip",
  "category": "207",
  "imdb": "tt7181546"
}';

$exemple_magnet = "magnet:?xt=urn:btih:9B097A628D8E54D05B0EA0F03C82D589EE009396&amp;dn=Ballerina.From.the.World.of.John.Wick.2025.1080p.WEBRip.AAC5.1.10bits.x265-Rapta&amp;tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337&amp;tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&amp;tr=udp%3A%2F%2Ftracker.torrent.eu.org%3A451%2Fannounce&amp;tr=udp%3A%2F%2Ftracker.bittor.pw%3A1337%2Fannounce&amp;tr=udp%3A%2F%2Fpublic.popcorn-tracker.org%3A6969%2Fannounce&amp;tr=udp%3A%2F%2Ftracker.dler.org%3A6969%2Fannounce&amp;tr=udp%3A%2F%2Fexodus.desync.com%3A6969&amp;tr=udp%3A%2F%2Fopen.demonii.com%3A1337%2Fannounce&amp;tr=udp%3A%2F%2Fglotorrents.pw%3A6969%2Fannounce&amp;tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&amp;tr=udp%3A%2F%2Ftorrent.gresille.org%3A80%2Fannounce&amp;tr=udp%3A%2F%2Fp4p.arenabg.com%3A1337&amp;tr=udp%3A%2F%2Ftracker.internetwarriors.net%3A1337";

// Function to build magnet link
function buildMagnetLink($data) {
    // Common trackers
    $trackers = [
        'udp://tracker.opentrackr.org:1337/announce',
        'udp://open.stealth.si:80/announce',
        'udp://tracker.torrent.eu.org:451/announce',
        'udp://tracker.bittor.pw:1337/announce',
        'udp://public.popcorn-tracker.org:6969/announce',
        'udp://tracker.dler.org:6969/announce',
        'udp://exodus.desync.com:6969',
        'udp://open.demonii.com:1337/announce',
        'udp://glotorrents.pw:6969/announce',
        'udp://tracker.coppersurfer.tk:6969',
        'udp://torrent.gresille.org:80/announce',
        'udp://p4p.arenabg.com:1337',
        'udp://tracker.internetwarriors.net:1337'
    ];

    // Start building the magnet link
    $magnet = 'magnet:?';
    
    // Add info hash
    $magnet .= 'xt=urn:btih:' . strtoupper($data['info_hash']);
    
    // Add display name (URL encoded)
    $magnet .= '&dn=' . rawurlencode($data['name']);
    
    // Add trackers
    foreach ($trackers as $tracker) {
        $magnet .= '&tr=' . rawurlencode($tracker);
    }
    
    return $magnet;
}

// Decode JSON data
$torrentData = json_decode($jsonData, true);

// Generate and display the magnet link
$magnetLink = buildMagnetLink($torrentData);
echo "Magnet Link: " . $magnetLink . "\n";

// Create a clickable link for web output
if (php_sapi_name() !== 'cli') {
    echo "<br><br>Clickable link: <a href='" . htmlspecialchars($magnetLink) . "'>Download</a>";
}
