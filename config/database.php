<?php

if (ENV == 'production') {
  define("DB_HOST", "172.16.1.200");
  define("DB_USER", "postgres");
  define("DB_PASSWORD", "");
  define("DB_NAME", "demo_development");
  define('MERCHANT_LOGIN_PATH', '172.16.1.200:3002');
} 
else {
  define("DB_HOST", "172.16.1.172");
  define("DB_USER", "postgres");
  define("DB_PASSWORD", "root123");
  define("DB_NAME", "demo_development");
  define('MERCHANT_LOGIN_PATH', '172.16.1.92:3000');
}
