<?php
date_default_timezone_set('Asia/Calcutta');
define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASS', "");
define('DB_DATABASE', "dealer2dealer2");

define('BASE_URL', 'http://localhost/dealer2dealer/admin/');
define('SITE_URL', 'http://localhost/dealer2dealer/');
define('SITE_NAME', 'Dealer2Dealer');

define('DIRECTORY_ROOT', dirname(dirname(__FILE__)));
define('MEDIA_PATH', dirname(dirname(dirname(__FILE__))).'/media/banner/');
define('PROJECT_MEDIA_PATH', dirname(dirname(dirname(__FILE__))).'/media/project/');
define('MICROSITE_PATH', dirname(dirname(dirname(__FILE__))).'/realstate/');
session_start();