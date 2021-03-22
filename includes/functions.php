<?php

function dbInput($string, $link = 'db_link')
{
  global $$link;

  return mysqli_real_escape_string($$link, $string);
}

function getInput($string){
  if (is_string($string)) {
    return trim(doSanitize(stripslashes($string)));
  } elseif (is_array($string)) {
    reset($string);
    foreach ($string as $key => $value) {
      $string[$key] = dbInput($value);
    }
    return $string;
  } else {
    return $string;
  }
}

function doSanitize($string)
{
  $patterns = array('/ +/', '/[<>]/');
  $replace = array(' ', '_');
  return preg_replace($patterns, $replace, trim($string));
}