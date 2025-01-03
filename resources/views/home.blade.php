<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php
$nameroute = 'getCountryHolidaysWithCY.form';
$flag = true;
$defaultCountry = $holidays[0]['countryCode'] ?? 'US';
?>

<body>
    <div class="bg-gray-100">
    <x-navbar />
<x-filter :nameroute="$nameroute" :flag="$flag" :defaultCountry="$defaultCountry" />
    <x-card :holidays="$holidays" />
    </div>
</div>
</body>

</html>