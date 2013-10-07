<?php
date_default_timezone_set('Asia/Calcutta');
define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASS', "");
define('DB_DATABASE', "dealer2dealer2");

define('BASE_URL', 'http://localhost/dealer2dealer/');
define('SITE_NAME', 'Dealer2Dealer');

define('DIRECTORY_ROOT', dirname(dirname(__FILE__)));
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USER', 'subramaniam.test@gmail.com');
define('SMTP_PASSWORD', 'ssahootest1985');

define('SUPPORT_EMAIL', 'support@dealstodealer.com');
define('ADMIN_EMAIL', 'sahil.sahoo85@gmail.com');

define('MEDIA_PATH', dirname(dirname((__FILE__))).DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR);
session_start();
