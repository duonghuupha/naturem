<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
// Use an autoloader!
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/Convert.php';
// Library
require 'libs/Database.php';
require 'libs/Session.php';
require 'libs/config/paths.php';
require 'libs/config/database.php';
// Image
require('libs/Images/php_image_magician.php');
// Mail
require 'libs/Mail/class.phpmailer.php';
require 'libs/Mail/class.smtp.php';
$app = new Bootstrap();

?>
