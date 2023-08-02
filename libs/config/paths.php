<?php
session_start();
define('URL', 'http://'.$_SERVER['HTTP_HOST']);
define('URL_IMAGE', 'http://images.naturem.us');
$dirtionary = realpath($_SERVER['DOCUMENT_ROOT']); 
$dirtionary = str_replace("naturem", "portal_naturem", $dirtionary);
define('DIR_IMAGE', $dirtionary.'/public/images');
define('DIR', $_SERVER['DOCUMENT_ROOT']);
?>
