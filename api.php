<?php

$api_url = 'https://svatky.adresa.info/txt';

//zkonvertovat txt to stringu
$api_content = file_get_contents($api_url);

//vzít jen část stringu se jménem
$api_svatek = substr($api_content, strpos($api_content, ";") +1 );

//vypsat dnešní svátek
//echo "Dnes má svátek: " . $api_svatek;



?>

