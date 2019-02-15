<?php
/**
 * Plugin Name: left-pad
 * Description: Because programming sucks.
 * Version: 0.1
 * Author: W Biggs
 * Author URI: https://wilsonbiggs.com/
 * License: WTFPL
 * License URI: http://www.wtfpl.net/txt/copying/
 */

function left_pad_func( $atts ){
  // gotta have an input dude
  if (!array_key_exists(0, $atts)) {
    return "Error: left-pad requires a string input.";
  }
  // defaults
  // basically do nothing if no input length
  if (!array_key_exists(1, $atts)) {
    $atts[1] = 0;
  }
  // default to a space.
  // have to use non-breaking space, WordPress consolidates consecutive spaces
  if (!array_key_exists(2, $atts)) {
    $atts[2] = "&nbsp;";
  }
  // map attribute array to variables for readability
  $str = $atts[0];
  $len = $atts[1];
  // decode html entities before mapping to variable
  $ch = html_entity_decode($atts[2]);
  // turn `$len` into the padding length
  $len = $len - mb_strlen($str);
  // if no need to pad
  if($len <= 0){
    return $str;
  }
  // limit pad to one character
  $ch = mb_substr($ch,0,1);
  // pad!
  for ($i=0; $i < $len; $i++) { 
    $str = $ch . $str;
  }
  // escape html, just to be safe
  return esc_html($str);
}

add_shortcode( 'left_pad', 'left_pad_func' );