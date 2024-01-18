<?php

$api_url = 'https://svatky.adresa.info/txt';


$api_content = file_get_contents($api_url);

//echo $api_content

$api_svatek = substr($api_content, strpos($api_content, ";") +1 );

echo "Dnes má svátek: " . $api_svatek;


?>

