<?php
require_once('lib/server.class.php');   // <--- check out the goodies in there :)
ini_set('memory_limit','640M');




SERVER::dump($_GET);



$list = isset($_GET['LIST']) ? $_GET['LIST'] : 'dump';

if (isset($_GET['LIST'])){
unset($_GET['LIST']);

SERVER::dump($_GET);

$JSON = json_encode($_GET)."\n";
SERVER::dump($JSON);
file_put_contents('LIST_'.$list.'_collection.txt', $JSON, FILE_APPEND);
}

?>