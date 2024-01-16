<?php


/*
*
*
*
DEBUG MODE vypíše chybové zprávy ve frontendu. Nepoužívejte jej v release verzích.

Standardnì vypisuje chyby vpravo nahoøe pomocí echo.
*
*
*
*/

define('DEBUG_MODE', false);
define('DEVELOPER_MODE', true);





/*App_Version udává verze aplikace, která je vypsáta vlevo dole v sidebaru*/

$App_Version = "0.0.6";












/*
 * 
 * 
 * 
 * 
 * 
 * 
 * POD TÍMTO VAROVÁNÍM NIC NEUPRAVUJTE POKUD SI NEJSTE JISTI, CO DÌLÁTE
 * 
 * 
 * 
 * 
 * 
 * 
 * */



require_once 'vendor/autoload.php';

session_start();

// init configuration

$clientID = '527509168314-9ni56iv2nrpn2oj35k3hvb2sbb4eomos.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://dev.web-lab.cz/index.php';
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->setApplicationName("Køenka Služby");
$client->addScope("email");
$client->addScope("profile");
//$client->addScope("https://www.googleapis.com/auth/admin.directory.domain");



if(DEBUG_MODE){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
?>