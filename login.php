<?php
session_start();

require_once('config/path_includes.php');
require_once( INC_PATH_ACCOUNT . DS . 'functions.php');

sign_in($_POST[email],$_POST[password]); 
