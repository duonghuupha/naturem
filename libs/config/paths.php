<?php
session_start();
define('URL', 'http://'.$_SERVER['HTTP_HOST']);
define('URL_IMAGE', 'http://portalnaturem:81/public/images');
$dirtionary = realpath($_SERVER['DOCUMENT_ROOT']); 
$dirtionary = str_replace("naturem", "portalnaturem", $dirtionary);
define('DIR_IMAGE', $dirtionary.'/public/images');
define('DIR', $_SERVER['DOCUMENT_ROOT']);
?>
