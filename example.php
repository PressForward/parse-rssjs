<?php

error_reporting(-1);
ini_set('error_reporting', E_ALL);

include('parse_rssjs.php');

$f = file_get_contents('http://blog.aramzs.me/feed/rssjs');

echo '<pre>';
#var_dump($f);
$jd = json_decode($f);
var_dump($jd);

foreach ($jd->rss->channel->item as $item){

  #var_dump($item);

}

?>
