<?php
$sql_tables = array(
	'modules' => 'CREATE TABLE `modules` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`title` varchar(200) NOT NULL,
		``
		PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT charset=latin1;'
);

function formatQueries(&$queries) {
	$array = explode(';', $queries);
	foreach($array as &$value) {
		if($value == $null || trim($value) == '')
			unset($value);
		else
			$value = $value . ";";
	}
	return $array;
}

class Updater
{
	static private $tables = null;
	// Need to decide how this is going to run
	static function run()
	{
		
	}
	// Helpers
	static function showTables() {
		if(!self::$tables) {
			self::$tables = array();
			$tables = $db->query("SHOW TABLES;"); // From my testing, 'FROM DB' is not needed?
			while($table = mysql_fetch_array($tables, MYSQL_ASSOC)) self::$tables[] = $table;
		}
		return self::$tables;
	}
	static function dropTable($t) {
		global $db;
		$db->query("DROP TABLE IF EXISTS `$t`;");
	}
	static function addTable($t) {
		global $sql_tables, $db;
		self::dropTable($t);
		$db->query($sql_tables[$t]);
	}
	static function tableExists($t) {
		return isset(self::$tables[$t]); // Untested. Cool concept though
	}
	static function sqlInstall() {
		global $sql_tables;
		foreach($sql_tables as &$table) {
			if(self::tableExists($table) === true) continue;
			else addTable($table);
		}
	}
}
?>