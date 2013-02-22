<?php

define('DIR_SITE_ROOT', '/var/www/MVC-PHP');

// development/ production/ testing
define('ENV', 'development');
//define('ENV', 'production');

if ($_SERVER['HTTP_HOST'] == 'localhost') {
  define('SITE_URL', 'http://localhost/MVC-PHP');
} else {
  define('SITE_URL', 'http://some-domain-or-ip/MVC-PHP');
}

define('DS', '/');
require_once(DIR_SITE_ROOT . DS . 'includes/php/structure.php');
require_once('database.php');
