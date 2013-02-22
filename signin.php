<?php

defined('PATHINC') or define("PATHINC", '/var/www/MVC-PHP/config/path_includes.php');
require_once PATHINC;

require_once INC_PATH_PHP . DS. 'authentication.php';

//if (isset($_SESSION[uid])) {
  header("Location: " . INC_URL_DEMO );
//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sign-in</title>

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="shortcut icon" href="includes/images/favicon.ico" />
    <?php
    require_once( INC_PATH_APP . '/helpers/application_helper.php');
    echo include_javascript_tag(array('jquery-1.8.0.min.js', 'common.js'));
    ?>
  </head>
  <body>
    <div id="wrapper">
      <div id="signin_logo"></div>
      <div id="signin_box">
        <h2 class="signin_header">Sign-in</h2>
        <?php
        if (isset($_GET[error])) {
          echo '<p id="error">Account does not exist !</p>';
        }
        ?>
        <form id="signin" method="post" action="login.php">
          <input class="dataless signin_text" type="text" name="email" placeholder="email" />
          <input class="dataless signin_text" type="password" name="password" placeholder="password" />
          <input id="signin_submit" type="submit" value="Login" />
        </form>
      </div>
    </div>
  </body>

</html>