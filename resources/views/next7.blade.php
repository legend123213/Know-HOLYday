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
$nameroute = 'next7daysWithC.form';
$flag = false;
$defaultCountry = $holidays[0]['countryCode'] ?? 'US';

?>

<class="bg-gray-100"></div>
   <x-navbar />
   <x-filter :nameroute="$nameroute" :flag="$flag" :defaultCountry="$defaultCountry" />
   @if (count($holidays) == 0)
      <div class="flex justify-center items-center h-96">
        <h1 class="text-3xl text-gray-500">No holidays found</h1>
      </div>
   @else
      <x-card :holidays="$holidays" />
@endif
   </div>
   </div>
   </body>

</html>