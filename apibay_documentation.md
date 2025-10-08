# Apibay API Documentation

## Base URL
```
https://apibay.org/
```

## Endpoints

### 1. Search Torrents
```
GET /q.php?q=QUERY&cat=CATEGORY&page=PAGE
```

**Parameters:**
- `q` (required): Search query or special query (see below)
- `cat` (optional): Category ID (see categories section)
- `page` (optional): Page number (starts from 0)

**Special Queries:**
- `user:USERNAME` - Search by uploader
- `category:XXX` - Search in specific category
- `top100:XXX` - Get top 100 in category

### 2. Get Torrent Details
```
GET /t.php?id=TORRENT_ID
```

### 3. Get File List
```
GET /f.php?id=TORRENT_ID
```

## Response Format

### Search Results
```json
[
  {
    "id": "12345678",
    "name": "Example.Torrent.Name.2023.1080p.x264-GROUP",
    "info_hash": "A1B2C3D4E5F6G7H8I9J0K1L2M3N4O5P6Q7R8S9T0",
    "leechers": "123",
    "seeders": "456",
    "num_files": "5",
    "size": "2147483648",
    "username": "UploaderName",
    "added": "1672531200",
    "status": "vip",
    "category": "207",
    "imdb": "tt1234567"
  }
]
```

### Categories
```
100 - Audio
  101 - Music
  102 - Audio books
  103 - Sound clips
  104 - FLAC
  199 - Other

200 - Video
  201 - Movies
  202 - Movies DVDR
  203 - Music videos
  204 - Movie clips
  205 - TV shows
  206 - Handheld
  207 - HD Movies
  208 - HD TV shows
  209 - 3D
  210 - CAM/TS
  211 - UHD/4k Movies
  212 - UHD/4k TV shows
  299 - Other

300 - Applications
  301 - Windows
  302 - Mac
  303 - UNIX
  304 - Handheld
  305 - iOS
  306 - Android
  399 - Other OS

400 - Games
  401 - PC
  402 - Mac
  403 - PSx
  404 - XBOX360
  405 - Wii
  406 - Handheld
  407 - iOS
  408 - Android
  499 - Other

500 - Porn
  501 - Movies
  502 - Movies DVDR
  503 - Pictures
  504 - Games
  505 - HD Movies
  506 - Movie clips
  507 - UHD/4k Movies
  599 - Other

600 - Other
  601 - E-books
  602 - Comics
  603 - Pictures
  604 - Covers
  605 - Physibles
  699 - Other
```

## Example Usage

### PHP Example
```php
<?php
$search = urlencode('ubuntu');
$url = "https://apibay.org/q.php?q={$search}";
$response = file_get_contents($url);
$torrents = json_decode($response, true);

foreach ($torrents as $torrent) {
    echo "Name: " . $torrent['name'] . "\n";
    echo "Seeds: " . $torrent['seeders'] . "\n";
    echo "Size: " . formatSize($torrent['size']) . "\n";
    echo "Magnet: " . buildMagnetLink($torrent) . "\n\n";
}

function formatSize($bytes) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
    return round($bytes / pow(1024, $pow), 2) . ' ' . $units[$pow];
}

function buildMagnetLink($torrent) {
    $trackers = [
        'udp://tracker.opentrackr.org:1337/announce',
        'udp://open.stealth.si:80/announce',
        'udp://tracker.torrent.eu.org:451/announce'
    ];
    
    $magnet = 'magnet:?xt=urn:btih:' . $torrent['info_hash'];
    $magnet .= '&dn=' . urlencode($torrent['name']);
    
    foreach ($trackers as $tracker) {
        $magnet .= '&tr=' . urlencode($tracker);
    }
    
    return $magnet;
}
?>
```

## Rate Limiting
- No official rate limit specified
- Be respectful and implement delays between requests
- Cache responses when possible

## Notes
- All strings are UTF-8 encoded
- Size is in bytes
- Timestamps are in Unix time format
- The API is provided as-is with no guarantees of uptime or stability
