<?php


function get_IP_address()
{

   foreach (['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR'] as $key) {
      if (array_key_exists($key, $_SERVER) === true) {
         foreach (explode(',', $_SERVER[$key]) as $IPaddress) {
            $IPaddress = trim($IPaddress); // Just to be safe
            if (
               filter_var(
                  $IPaddress,
                  FILTER_VALIDATE_IP,
                  FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
               )
               !== false

            ) {
               $CountryCode = file_get_contents("http://ip-api.com/json/$IPaddress");
               $currentYear = date('Y');
               return ["CountryCode" => $CountryCode, "year" => $currentYear];
            } else {
               $CountryCode = "ALL";
               $currentYear = date('Y');
               return ["CountryCode" => $CountryCode, "year" => $currentYear];
            }
         }
      }
   }
}

