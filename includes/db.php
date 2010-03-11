<?php
$username="username";
$password="password";
$database="database";
$host="localhost";

mysql_connect($host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query = "TEST";

mysql_query($query);

mysql_close();
?>
