<?php
header('Content-Type: application/json');

$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
$isAndroid = strpos($ua, 'android') !== false;
$code = isset($_GET['code']) ? $_GET['code'] : '';

/*if ($isAndroid) {
    $redirectUrl = "https://play.google.com/store/apps/details?id=com.deltaapps.FoodSwipe";
} else {
    $redirectUrl = "https://apps.apple.com/de/app/dishswipe/id6477916906";
}*/

if ($code) {
    // Versuche die App zu öffnen
    echo json_encode(["message" => "Redirecting to app with code", "url" => "com.deltaapps.FoodSwipe://?code=$code"]);
} else {
    echo json_encode(["message" => "Redirecting to app", "url" => "com.deltaapps.FoodSwipe://"]);
}

header("Refresh: 0; url=$redirectUrl"); // Automatische Weiterleitung nach JSON-Ausgabe
?>
