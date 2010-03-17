<?php
require_once dirname(__FILE__) . '/classes/Config.class.php';
require_once dirname(__FILE__) . '/_config.php';
require_once dirname(__FILE__) . '/classes/Mysql.class.php';
require_once dirname(__FILE__) . '/classes/Updater.class.php';

// First setup global DB connection
$db = new Mysql(Config::get('mysql_user'), Config::get('mysql_pass'), Config::get('mysql_db'), Config::get('mysql_host'), Config::get('mysql_port'));

// Gonna have to check for DB installation
// Updater::run();
?>