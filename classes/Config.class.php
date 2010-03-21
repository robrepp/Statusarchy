<?php
class Config
{
	static private $config = array(
		// Example data
		'mysql_host' => 'localhost',
		'mysql_user' => 'root',
		'mysql_pass' => '',
		'mysql_prefix' => '',
		'mysql_db' => 'database',
		'mysql_port' => 3306
	);
	
	static public function get($s) {
		return self::$config[$s];
	}
	static public function push($s) {
		for($i = 0; $i < count($s); $i++) {
			self::$config[array_keys($s)[$i]] = $s[$i];
		}
	}
}
?>