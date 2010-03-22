<?php
// File to make config easier "for the rest of us" ;)
$config = array(
	'mysql_host' => 'localhost',
	'mysql_user' => 'root',
	'mysql_pass' => '',
	'mysql_prefix' => 'sa_',
	'mysql_db' => '',
	'mysql_port' => 3306 // Don't change in most cases
);
// Don't edit below
Config::push($config);
unset($config);
?>
