<?php


/*
*
*
*
DEBUG MODE vyp�e chybov� zpr�vy ve frontendu. Nepou��vejte jej v release verz�ch.

Standardn� vypisuje chyby vpravo naho�e pomoc� echo.
*
*
*
*/

define('DEBUG_MODE', false);
define('DEVELOPER_MODE', true);





/*App_Version ud�v� verze aplikace, kter� je vyps�ta vlevo dole v sidebaru*/

$App_Version = "0.0.6";












/*
 * 
 * 
 * 
 * 
 * 
 * 
 * POD T�MTO VAROV�N�M NIC NEUPRAVUJTE POKUD SI NEJSTE JISTI, CO D�L�TE
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
$client->setApplicationName("K�enka Slu�by");
$client->addScope("email");
$client->addScope("profile");
//$client->addScope("https://www.googleapis.com/auth/admin.directory.domain");



if(DEBUG_MODE){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
?>