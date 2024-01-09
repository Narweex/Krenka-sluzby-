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

$clientID = '1095113327096-9u45f7fgkgap3fad16jt0tvlolanc15u.apps.googleusercontent.com';
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
$client->addScope("https://www.googleapis.com/auth/admin.directory.domain");



if(DEBUG_MODE){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
?>