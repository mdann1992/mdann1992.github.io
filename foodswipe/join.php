<?php
header('Content-Type: text/html; charset=utf-8');

$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
$isAndroid = strpos($ua, 'android') !== false;
$code = isset($_GET['code']) ? $_GET['code'] : '';

if ($isAndroid) {
    $redirectUrl = "https://play.google.com/store/apps/details?id=com.deltaapps.FoodSwipe";
} else {
    $redirectUrl = "https://apps.apple.com/de/app/dishswipe/id6477916906";
}

$appUrl = "com.deltaapps.FoodSwipe://";
if ($code) {
    $appUrl .= "?code=$code";
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
</head>
<body>
<script>
    var appUrl = "<?php echo $appUrl; ?>";
    var storeUrl = "<?php echo $redirectUrl; ?>";
    // Versuch, die App zu öffnen
    window.location.href = appUrl;

    // Fallback zum App Store, wenn die App-Weiterleitung fehlschlägt
    setTimeout(function() {
        window.location.href = storeUrl;
    }, 2000); // Warte 2 Sekunden, bevor zum Store weitergeleitet wird
</script>
</body>
</html>
