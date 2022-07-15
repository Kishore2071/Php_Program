<pre>
<?php
error_reporting(E_ALL & ~E_NOTICE);

$mc = new Memcached();
$mc->addServer("memcached.selfmade.ninja", 11211);

// $mc->set("foo", "Hello!");
// $mc->set("bar", "Memcached...342");

$arr = array(
    $mc->get("foo"),
    $mc->get("bar")
);
var_dump($arr);

var_dump($mc->getAllKeys());
?> </pre>