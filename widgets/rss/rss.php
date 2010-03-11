<?php
function rss($url) {
require_once('SimplePie/simplepie.class.php');
$feed = new SimplePie();
$feed->set_feed_url($url);
$feed->handle_content_type();

echo "<h2>" . $feed->get_title() . "<br>";
foreach ($feed->get_items() as $item):
echo $item->get_title();
}
?>
