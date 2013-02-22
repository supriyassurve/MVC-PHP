<?php

require_once(INC_PATH_APP . DS . "classes/applicationClass.php");

class DemoClass extends Application {
  
  function demo_action(){
    return "This is working as per the current requirement.";
  }

}

