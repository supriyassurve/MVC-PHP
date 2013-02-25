<?php

/**
 * Creates a HTML select with options and selected option.
 * @param string $name <p>Name for select node</p>
 * @param array $options <p>Array for generating options</p>
 * @param string $selected <p>Selected value or blank string. Can be string or integer.</p> 
 * @param string $css_class <p>Css class name(s) as a string</p>
 * <p>
 * This will append the given name and class name to select tag.
 * Selected value will be selected in options by comapering the $selected.
 * Options send to the helper function needs to be array
 * For example:
 * 1. array(1, 2, 3, 4, 5, 6, 7);
 * Or
 * 2. array(array(0,"0 Hours"), array(1,"1 Hour"), array(2,"2 Hours"), array(3, "3 Hours"), array(4, "4 Hours"));
 * </p>
 */
function select_tag($name, $options, $selected = "", $htmloptions = array()) {
  $select_tag = "<select name='{$name}' ";
  foreach ($htmloptions as $key => $value) {
    $select_tag .= " {$key}='{$value}'";
  }
  $select_tag .= ">";
  $cont = 1;
  $select_options = "";
  foreach ($options as $a) {
    if (is_array($a)) {
      $ky = $a[0];
      $val = $a[1];
    } else {
      $ky = $a;
      $val = $a;
    }
    $select_options .= "<option class='test-class-{$cont}' value='{$ky}'";
    if ($selected == $ky) {
      $select_options .= " selected='selected'";
    }
    $select_options .= ">{$val}</option>";
    $cont += 1;
  }
  $select_tag .= "{$select_options} </select>";

  return $select_tag;
}

/**
 * Creates a HTML anchor tag with attributes.
 * @param string $src <p>source for image tag.</p>
 * @param string $alt <p>alternate text for image tag. (optional)</p>
 * @param array $options <p>Array of anchor tag attributes. (optional)</p>

 * <p>
 * This will append the given source to image tag.
 * Options send to the helper function needs to be array with key value pair(mandatory key value pair)
 * For example:
 * array('height'=>'17', 'class'=>'someCssClass, otherCssClass');
 * </p>
 */
function image_tag($src, $alt = "", $options = array()) {
  $image_tag = "<img src='" . INC_URL_IMG . DS . $src . "' alt='{$alt}' ";
  foreach ($options as $key => $value) {
    $image_tag .= " {$key} = '{$value}'";
  }
  $image_tag .= "/>";
  return $image_tag;
}

/**
 * Creates a HTML anchor tag with attributes.
 * @param string $name <p>Name for anchor tag.</p>
 * @param string $href <p>Href for anchor tag.</p>
 * @param array $options <p>Array of anchor tag attributes. (optional)</p>

 * <p>
 * This will append the given name and href to anchor tag.
 * Options send to the helper function needs to be array with key value pair(mandatory key value pair)
 * For example:
 * array('onclick'=>'SomeJavascriptFunction(); OtherJavascriptFunction', 'class'=>'someCssClass, otherCssClass');
 * </p>
 */
function anchor_tag($name, $href, $options = array()) {
  $anchor_tag = "<a href='{$href}' ";
  if (!is_null($options)) {
    foreach ($options as $key => $value) {
      $anchor_tag .= " {$key} = '{$value}' ";
    }
  }
  $anchor_tag .= ">{$name}</a>";
  return $anchor_tag;
}

/**
 * Creates a HTML anchor tag with attributes and if current then print option.
 * @param string $name <p>Name for anchor tag.</p>
 * @param string $href <p>Href for anchor tag.</p>
 * @param array $options <p>Array of anchor tag attributes. (optional)</p>
 * @param string $current <p>String for current print option. (optional) If nothing given it will print the default anchor_tag</p>
 * <p>
 * This will append the given name and href to anchor tag.<br />
 * Options send to the helper function needs to be array with key value pair(mandatory key value pair)<br />
 * <i>For example :: </i>   
 * <code>array('onclick'=>'SomeJavascriptFunction(); OtherJavascriptFunction', 'class'=>'someCssClass, otherCssClass');</code><br />
 * Current status<br />
 * <i>For example :: </i>   
 * <code>anchor_tag_current('Some Name', PATH_TO_REACH, array(), 
  anchor_tag('Current Name', PATH_TO_REACH, array('class' => 'current'))
  )</code><br />
 * OR <br />
 * <code>anchor_tag_current('Some Name', PATH_TO_REACH, array(), 
 * "&lt;span class='current'&gt;Current Path&lt;/span&gt;"
 * )</code>
 * </p>
 */
function anchor_tag_current($name, $href, $options = array(), $current = "") {
  if ($current == "") {
    return anchor_tag($name, $href, $options);
  } else {
    $current_path = curPageURL();
    if (substr($current_path, -1) == "/") {
      $href = $href . "/";
    }

    if ($current_path == $href) {
      return $current;
    } else {
      return anchor_tag($name, $href, $options);
    }
  }
}

// http://webcheatsheet.com/php/get_current_page_url.php
function curPageURL() {
  $pageURL = 'http';
  if (isset($_SERVER["HTTPS"]) && ($_SERVER["HTTPS"] == "on")) {
    $pageURL .= "s";
  }

  $pageURL .= "://";
  if ($_SERVER["SERVER_PORT"] != "80") {
    $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
  } else {
    $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
  }
  return $pageURL;
}

/**
 * Creates a HTML anchor tag with attributes.
 * @param array $js_names <p>Array of Javascript file names in includes directory.</p>

 * <p>
 * This will append the given name to script tag.
 * For example:
 * array('first.script.js', 'other.script.js')
 * </p>
 */
function include_javascript_tag($js_names = array()) {
  $scripts = "";
  if (count($js_names) > 0) {
    foreach ($js_names as $value) {
      $scriptname = $value;
      // If the javascript name do not contain .js then append it to the name for getting the proper url for including the stylesheet file
      if (!strpos($value, '.js')) {
        $jsname = explode('.', $value);
        $scriptname = $value . ".js";
      }
      $scripts .= "<script src='" . INC_URL_JS . DS . $scriptname . "' type='text/javascript'></script> \n";
    }
  }
  return $scripts;
}

/**
 * Creates a HTML anchor tag with attributes.
 * @param array $css_names <p>Array of Stylesheets file names in includes directory.</p>

 * <p>
 * This will append the given name to link tag.
 * For example:
 * array('first.link.js', 'other.link.js')
 * </p>
 */
function include_stylesheet_tag($css_names = array()) {
  $styles = "";
  if (count($css_names) > 0) {
    foreach ($css_names as $value) {
      $cssname = $value;
      // If the css name do not contain .css then append it to the name for getting the proper url for including the javascript file
      if (!strpos($value, '.css')) {
        $cssname = explode('.', $value);
        $cssname = $value . ".css";
      }
      $styles .= "<link href='" . INC_URL_CSS . DS . $cssname . "' rel='stylesheet' type='text/css' /> \n";
    }
  }
  return $styles;
}

function pluralize($var, $strCount) {
  $str = $var;
  $plurals = unserialize(PLURALS);
  
  if($strCount>1){
    $str = $plurals[$var];
  }
  return $str;
}

function text_area_tag($name, $value = "", $options = array()) {
  $textarea = "<textarea name='$name' ";
  if (!is_null($options)) {
    foreach ($options as $key => $value) {
      $textarea .= " $key=$value";
    }
  }
  $textarea .= ">$value</textarea>";
  echo $textarea;
}

function text_field_tag($name, $value = "", $options = array()) {
  input_tag('text', $name, $value, $options);
}

function radio_button_tag($name, $value = "", $options = array()) {
  input_tag('radio', $name, $value, $options);
}

function checkbox_tag($name, $value = "", $options = array()) {
  input_tag('checkbox', $name, $value, $options);
}

function input_tag($type, $name, $value = "", $options = array()) {
  $input = "<input type='$type' name='$name' ";
  if (!is_null($value)) {
    $input .= "value='$value' ";
  }
  if (!is_null($options)) {
    foreach ($options as $key => $value) {
      $input .= " $key=$value";
    }
  }
  $input .= " />";
  echo $input;
}