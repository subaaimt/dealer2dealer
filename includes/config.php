<?php
date_default_timezone_set('Asia/Calcutta');
define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASS', "");
define('DB_DATABASE', "dealer2dealer");

define('BASE_URL', 'http://localhost/dealer2dealer/');
define('SITE_NAME', 'Dealer2Dealer');

define('DIRECTORY_ROOT', dirname(dirname(__FILE__)));

define('MEDIA_PATH', dirname(dirname((__FILE__))).DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR);
session_start();
