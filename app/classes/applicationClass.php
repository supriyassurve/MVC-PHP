<?php

require_once(INC_PATH_INCLUDES . DS . "classes/application.class.php");

class Application extends BaseApplication {
  
  function get_generic_action() {
    return "This is a application/ main class (generic)action for all classes.";
  }
  
}
