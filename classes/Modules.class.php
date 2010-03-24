<?php
function __autoload($class) {
	// Don't name your classes with the word Module in them ;)
	require_once dirname(__FILE__) . '/../modules/' . (str_replace('Module', '', $class)) . '.module.php';
}

class Modules
{
	static function getEnabledModules()
	{
		global $db;
		$modules = array();
		$mods = $db->query("SELECT modules_enabled.id as meId, 
							modules_enabled.data as meData, 
							modules_enabled.order, modules.title, modules.data as mData 
							FROM modules_enabled INNER JOIN modules 
							ON modules_enabled.module_id = modules.id 
							ORDER BY modules_enabled.order ASC;");
			
		while($row = mysql_fetch_array($mods, MYSQL_ASSOC)) {
			$modules[] = array(new $row['title'] . 'Module', $row);
		}
		return $modules;
	}
}
?>