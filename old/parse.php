<?php	error_reporting(E_ERROR | E_PARSE); //Easy Code No warings/notices errors
	require_once('lib/server.class.php');//Paste to unlock



$url = 'http://data.gc.ca/data/en/api/action/package_show?id=98f1a129-f628-4ce4-b24d-6f16bf24dd64';




function CSVStrToArray($CSVStr){
	$Data = explode("\n", $CSVStr);							//split rows
	foreach($Data as &$Row) $Row = str_getcsv($Row, ","); 	//split cols
	return $Data;
}

$response=file_get_contents($url);
$jsonDecode = SERVER::json_array($response);



//SERVER::dump($jsonDecode);
//fetch csv file url



$list = $jsonDecode['result']['resources'];

//SERVER::dump($list);



$desiredLang = 'eng; CAN';	//Grab results in this language



//Extract urls
$urls = array();
foreach($list as $key => $value){
	$format = $value['format'];
	$lang = $value['language'];
	$url = $value['url'];
	$urls[$lang][$format][] = $url;
	break;
}
//SERVER::dump($url);



$Data = array();
foreach($urls[$desiredLang]['CSV'] as $url){
	$CSV  = file_get_contents($url);		//fetch file contents
	if(strlen($CSV) > 0){
		$data = CSVStrToArray($CSV);;
		$Data[] = $data;
	}
}




$fields = array('year', 'manufacturer', 'model', 'class', 'engine', 'cylinders', 'transmission', 'fuel', 'conCity', 'conHighway', 'junk', 'junk', 'AnnaulFuel', 'emission');


unset($data[0]);
unset($data[1]);

//SERVER::DumpTab($data);
SERVER::dump($data);

foreach($data as $rid => $row){
	$colCount = 0;
	$colEmpty = 0;
	foreach($row as $cid => $col){
		$colCount++;
		if(empty($col)){
			$colEmpty++;
		}
		if($colEmpty == $colCount){
			break;
		}
	}

}




if(0==1){
$fileurl = $jsonDecode['result']['resources'][0]['url'];

$CSV  = file_get_contents($fileurl);		//fetch file contents
if(strlen($CSV) > 0){
	$Data = CSVStrToArray($CSV);
}

SERVER::dump($Data);
}
?>