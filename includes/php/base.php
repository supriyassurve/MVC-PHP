<?php

defined('PATHINC') or define("PATHINC", '/var/www/MVC-PHP/config/path_includes.php');
require_once PATHINC;

require_once(INC_PATH_INCLUDES . DS . "classes/connection.class.php");

/**
 * Creates a collection of parameters from array.
 * @param array $array <p>Array from which parameters are supposed to collect.</p>
 * @param mix $params <p>Array/ String of parameters which needs to be collected from the given array.</p>

 * <p>
 * Text
 * $coll = collect($newdata, array('id', 'qr_code_id'));
 * $coll = collect($newdata, 'id');
 * </p>
 */
function collect($array, $params) {
  $result = array();
  if (is_array($params)) {
    foreach ($array as $key => $value) {
      $r = array();
      foreach ($params as $rvalue) {
        $r[$rvalue] = $value[$rvalue];
      }
      array_push($result, $r);
    }
  } else {
    foreach ($array as $value) {
      array_push($result, $value[$params]);
    }
  }
  return $result;
}

/**
 * Calculates the sum of parameters from array.
 * @param Integer $params <p>String of parameters which needs to be calculated from the given array.</p>

 * <p>
 * $coll = collect($newdata, 'points');
 * </p>
 */
function sum_of($array, $params) {
  $result = 0;
  foreach ($array as $value) {
    $result += intval($value[$params]);
  }
  return $result;
}

function is_blank($var) {
  if (is_array($var)) {
    return (count($var) == 0);
  } else {
    return is_null($var);
  }
}

function capitaliseString($str) {
  $strVal = preg_replace('/([,.!?])\s*(\w)/e', "strtoupper('\\1 \\2')", ucfirst(strtolower($str)));
  return $strVal;
}

function json_string_to_array($str) {
  $strArry = array();
  $clearStr = str_replace(array("{", "}", '"'), "", $str);
  $keysArray = explode(",", $clearStr);
  foreach ($keysArray as $value) {
    $separateKeys = explode(":", $value);
    $strArry[$separateKeys[0]] = $separateKeys[1];
  }
  return $strArry;
}

function get_gm_datetime($date, $time = 0, $meridian = "") {
  $gmDate = gmdate('Y-m-d H:i:s');
  $meridianCal = "";
  if ($meridian != "") {
    if ($meridian == "AM") {
      $meridianCal = strval($time);
      if ($time == 12) {
        $meridianCal = "00";
      }
    } else {
      $meridianCal = strval($time + 12);
      if ($time == 12) {
        $meridianCal = "12";
      }
    }
  }
  $d = ($date . " " . $meridianCal . ":00:00");
  $gmDate = gmdate('Y-m-d H:i:s', strtotime($d));
  return $gmDate;
}

function set_array($array, $value) {
  if (!isset($array[$value])) {
    array_push($array, $value);
  }
}

function isnotset($var) {
  return !isset($var);
}

function render($format, $value=''){
  if($format=='text'){
    $output = $value;
  }else if($format=='partial'){
    $filename = "_" . $value . '.html.php';
    if(file_exists($filename)){
      $output = file_get_contents($filename);
    }else{
      $output = 'The file does not exist';
    }
  }
  echo $output;
}
