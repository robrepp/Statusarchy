<?php
require_once dirname(__FILE__) . '/../../classes/Module.class.php';
require_once dirname(__FILE__) . '/../../classes/Simplepie.class.php';

class RssModule extends Module
{
	
}

function rss($url)
{
	$feed = new SimplePie();
	$feed->set_feed_url($url);
	$feed->handle_content_type();
	
	// Display content:
	echo '<h2>' . $feed->get_title() . '<br />';
	
	foreach($feed->get_items() as $item)
		echo $item->get_title();
}
?>
