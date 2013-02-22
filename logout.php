<?php
session_start();
session_destroy();
require_once 'config/path_includes.php';
//header("Location: " . SITE_URL . DS. "signin.php" ); 
header("Location: " . SITE_URL . DS ); 