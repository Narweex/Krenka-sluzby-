<?php
// Data, která chcete poslat v POST požadavku
$postData = array(
    'key1' => 'value1',
    'key2' => 'value2'
);

// URL, na kterou posíláte POST požadavek
$url = 'http://zahranicnigeografickaexkurze.cz';

// Poèet opakování
$repeat = 10000;

for ($i = 0; $i < $repeat; $i++) {
    // Inicializace nového cURL zdroje
    $ch = curl_init($url);

    // Nastavení dalších možností pro cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

    // Provedení požadavku a získání odpovìdi
    $response = curl_exec($ch);

    // Uzavøení cURL zdroje a uvolnìní systémových prostøedkù
    curl_close($ch);

    // Výpis odpovìdi z serveru
    echo "Request $i: $response\n";
}
?>