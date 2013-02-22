
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Landing Page</title>    
    <?php
    require_once 'session_settings.php';
    include_once( INC_PATH_APP . DS . "helpers/application_helper.php");
    echo include_stylesheet_tag(array('stylesheet.css'));
    ?>
  </head>
  <body>
    <div class="container">
      <div class="logo"></div>
      <?php include_once( DIR_SITE_ROOT . DS . "navigation.php"); ?>
      <div class="content">
        <h1>This website is currently undergoing construction</h1>
        <div class="space20"></div>
        <h3>This is a landing page for this site</h3>
        <div class="space28"></div>
      </div>
      <div class="footer"></div>
    </div>
  </body>
</html>