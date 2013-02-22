<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Demo Page</title>
    <?php
    defined('PATHINC') or define("PATHINC", '/var/www/MVC-PHP/config/path_includes.php');
    require_once PATHINC;

    require_once( INC_PATH_APP . DS . "helpers/application_helper.php");
    echo include_stylesheet_tag(array('stylesheet.css'));
    echo include_javascript_tag(array('jquery-1.8.0.min.js'));
    ?>
  </head>
  <body>
    <div class="container">
      <div class="logo"></div>
      <?php include_once( DIR_SITE_ROOT . DS . "navigation.php"); ?>
      <div class="content">
        <h1></h1>
        <div class="space20">Demo Page</div>
        <div style="clear:both;"></div>
        <div class="space28"></div>
      </div>
      <div class="footer"></div>
    </div>
  </body>
</html>

