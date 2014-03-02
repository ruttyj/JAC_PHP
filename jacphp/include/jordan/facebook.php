<?php
//error_reporting(E_ERROR | E_PARSE); //Easy Code No warings/notices errors
//require_once($_SERVER['DOCUMENT_ROOT'].'/CORE.php');//Paste to unlock
require_once('server.class.php');


function download($get, $put){
	$file = file_get_contents($get);
	if(!empty($file)){
	    file_put_contents($put, $file);
	}
}

function getJSON($url){
	$JSON = file_get_contents($url);
	$JSON = json_decode($JSON);
	$JSON = json_toarray($JSON);
	foreach($JSON['data'] as $rowNum => $row){
	//SERVER::dump($row);
		$row = (array)$row;
		
		
		$row['picture_n'] = str_replace('s.', 'n.', $row['picture']);
		$row['picture_t'] = str_replace('s.', 't.', $row['picture']);
		
		print '<a href="'.$row['picture_n'].'">';
		//print '<img src="'.$row['picture_t'].'"\>';	//show thumb images
		print '<img src="'.$row['picture'].'"\>';		//show small images
		//print '<img src="'.$row['picture_n'].'"\>'; 	//show large images
		print '</a>';
		
		
		/* DOWNLOAD IMAGE
		$getPhoto = $row['picture_n'];
		//extract name from path ------------------------------
		$subject = $getPhoto;
		$pattern = '/\/[0-9_]+/';
		preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 3);
		$name = $matches[0][0];
		downlaod image --------------------------------------
		$dir = '/images'; // folder images msut already exist*****
		download($getPhoto,  __DIR__.$dir.$name.'.jpg'); //note may not alawys be jpg
		//*/
	}
	$JSON['count'] = count($JSON['data']);
	return $JSON;
}


//CONVERT JSON OBJECT completley to an array;
function json_toarray($JSON){
	if(in_array(gettype($JSON), array('array', 'object'))){
		$JSON = (array)$JSON;
		foreach($JSON as $key => $value){
			$JSON[$key] = json_toarray($value);
		}
	} 
	return $JSON;
}






$groupName = 'PixelsDaily';
$url = 'http://graph.facebook.com/'.$groupName.'/photos?fields=picture,source,name&type=uploaded';
$pages = !empty($_GET['pages']) ? $_GET['pages'] : 5;
SERVER::dump($groupName);
SERVER::dump($url);
SERVER::dump($pages, '_GET[\'pages\']');
//---------------------------------
$count = 0;
$i=0;

do{	//get pages
	$JSON = getJSON($url);
	$url = $JSON['paging']['next'];
	$count += $JSON['count'];
	$i++;
} while($i < $pages);
//---------------------------------
//NAVIGATION
$keys = array_keys($JSON);
SERVER::dump($count);
SERVER::dump($keys);
SERVER::dump($JSON['paging']);
?>