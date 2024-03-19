<?php
// Data, kter� chcete poslat v POST po�adavku
$postData = array(
    'key1' => 'value1',
    'key2' => 'value2'
);

// URL, na kterou pos�l�te POST po�adavek
$url = 'http://zahranicnigeografickaexkurze.cz';

// Po�et opakov�n�
$repeat = 10000;

for ($i = 0; $i < $repeat; $i++) {
    // Inicializace nov�ho cURL zdroje
    $ch = curl_init($url);

    // Nastaven� dal��ch mo�nost� pro cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

    // Proveden� po�adavku a z�sk�n� odpov�di
    $response = curl_exec($ch);

    // Uzav�en� cURL zdroje a uvoln�n� syst�mov�ch prost�edk�
    curl_close($ch);

    // V�pis odpov�di z serveru
    echo "Request $i: $response\n";
}
?>