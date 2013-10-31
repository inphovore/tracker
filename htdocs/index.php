<?php

/*
** USAGE
** tracker.php?d=<some_data>&page=http://redirect.com&optout=1
*/

function getURL() {
  $url = 'http';
  if ($_SERVER["HTTPS"] == "on") {$url .= "s";}
  $url .= "://";
  if ($_SERVER["SERVER_PORT"] != "80") {
    $url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
  } else {
    $url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  }
  return $url;
}
 
function main() {
 
  mysql_connect("localhost", "db_user", "password") or die(mysql_error());
  mysql_select_db("trackerdb") or die(mysql_error());
 
  $url = mysql_real_escape_string(getURL());
  $data = mysql_real_escape_string($_GET['d']);
  $optout = ($_GET['optout'])?"1":"0";
  $redirect = ($_GET['page'])?mysql_real_escape_string($_GET['page']):'./default.html';
 
  $page_insert = mysql_query("INSERT INTO tracking_table (`url`, `page`, `data`, `optout`, `use_date`) VALUES ('$url', '$redirect', '$data', '$optout', now())") or die(mysql_error());
 
//Redirect the user to their intended location
 
  header("Location: $redirect");
}
main();
 
?>
