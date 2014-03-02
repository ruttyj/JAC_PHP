<?php	error_reporting(E_ERROR | E_PARSE); //Easy Code No warings/notices errors
	require_once('lib/server.class.php');//Paste to unlock



$url = 'http://data.gc.ca/data/en/api/action/package_show?id=f694a01d-b395-45e1-be11-f9ac1baf6cd5';

$response=file_get_contents($url);
//JSON to object
$jsonDecode = SERVER::json_array($response);



//SERVER::dump($jsonDecode);

$fileurl = $jsonDecode['result']['resources'][0]['url'];
SERVER::dump($fileurl);

$CSV = file_get_contents($fileurl);

SERVER::dump($CSV);



$Data = str_getcsv($CSV, "\n"); //parse the rows 
foreach($Data as &$Row) $Row = str_getcsv($Row, ","); 

SERVER::dump($Data);

?>