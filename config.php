<?php


/*

DEBUG MODE vyp�e chybov� zpr�vy ve frontendu. Nepou��vejte jej v release verz�ch.
Standardn� vypisuje chyby vpravo naho�e pomoc� echo.

*/
define('DEBUG_MODE', false);


/*App_Version ud�v� verze aplikace, kter� je vyps�ta vlevo dole v sidebaru*/
$App_Version = "0.0.4 Alpha";






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



$client->setApplicationName("K�enka Slu�by");



$client->addScope("email");



$client->addScope("profile");



$client->addScope("https://www.googleapis.com/auth/admin.directory.domain");















?>