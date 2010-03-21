<?php
// The SQL tables, as a name->query pair array
$sql_tables = array(
	'modules' => 'CREATE TABLE `$t` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`title` varchar(200) NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT charset=latin1;'
);

class Updater
{
	static private $tables = null;
	// Need to decide how this is going to run
	static function run()
	{
		global $sql_tables;
		self::setupTables($sql_tables);
	}
	static function setupTables(&$tables) {
		foreach($tables as $key => &$value) str_replace('$table', Config::get('mysql_prefix') . $key, $value);
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
		return isset(self::showTables()[$t]); // Untested. Cool concept though
	}
	static function sqlInstall() {
		global $sql_tables;
		foreach($sql_tables as $table => &$query) {
			if(self::tableExists($table) === true) continue;
			else addTable($table);
		}
	}
}

// Function which can splice up queries into an array. Currently unused, unneeded.
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

?>