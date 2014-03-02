
<?php
require_once('include/jordan/lib/server.class.php');   // <--- check out the goodies in there :)

//recirsive function
function objectToArray_R($OBJ){
		$BUILD; //build return result;
		if(in_array(gettype($OBJ), array('array', 'object'))){
			$BUILD = array();
			
			//loop through object a array
			foreach((array)$OBJ as $key => $value)
				$BUILD[$key] = objectToArray_R($value);
				
		
		} else {
			$BUILD = $OBJ;
		}
		//SERVER::dump($BUILD );
		return $BUILD;
	}
	
	
	
	
	//SERVER::JSON_DECODE();
function read_pretty($string){
    $json_object = json_decode($string);
    return objectToArray_R($json_object);
    //SERVER::dump($array);
    // $array;
}



function make_pretty($struct){
	return SERVER::json_pretty($struct);
}
function SHOW_PRETTY($result){
	$pretty = SERVER::json_pretty($result); //convert structure or json
	SERVER::dump($pretty, 'JSON');			//dump string to the screen
} 


/////////////////////////////////////////////////////
//##############################################
//############  IMPORT DB CLASS  ###############
//##############################################
//==============================================-----+
require_once('include/jordan/lib/db1.class.php');
//require_once('lib/dbcon.php');
$DBc = array(//GLOBAL VARIABLE
	'host'		=>	'localhost',
	'username'	=>	'root',
	'password'	=>	'root',
	'database'	=>	'jacphp',
);
$DB = new DB1($DBc);
$DB->OpenConnection(); 
//===================================================
/////////////////////////////////////////////////////
/*
//Get sample data
$fetchParams = array(
	'table'			=>	'users2',
    'select_items'	=>	'*',
    'row_key'		=>	'id',	//field from select to amke as key
);
$result = $DB->FetchRow($fetchParams);	
SERVER::dump($result);
//*/
/////////////////////////////////////////////////////
//===================================================											
//$result = $DB->users2->FetchAll();










if(0){
	$fetchParams = array(
		'table'			=>	'records',
	    'select_items'	=>	array('year', 'maker', 'model', 'cartype', 'img'),
	    //'limit' => 10,
	    'where_items' 	=> array('img!' => null),
	);
	$result = $DB->FetchRow($fetchParams);	
	
	
	
	
	
	//SHOW_PRETTY($result); 
	
	
	$str = make_pretty($result); //
	$struct = read_pretty($str);
	
	
	$row = json_encode($struct[0]);
	
	
	$str = "\n";
	//add to fle
	foreach($result as $record){
		$JSON = json_encode($record)."\n";
		file_put_contents('collect.txt', $JSON, FILE_APPEND);
	}
	
	SERVER::dump($str);
	//SHOW_FIRST_PRETTY($struct); 
	SERVER::dump($struct);
} 

if(0) {
	$collection = file_get_contents('collect.txt');
	$collection = explode("\n", $collection);


	
	
	foreach($collection as &$row){
		if(!empty($row)){
			$row = read_pretty($row);
			$img = array_pop($row);  //pop and return last of array (img)
			
			
			$params = array(
				'from' 			=> 'records',
				'update_items'	=>	array('img' => $img),
				'where_items'	=>	$row,
			);
			
			
			$DB->UpdateRow($params);
		}
	}
	
	SERVER::dump($collection);
}




        $fetchParams = array(
		'table'		=>	'records',
	    'select_items'	=>	array('year', 'maker', 'model', 'cartype', 'img'),
	    'where_items' 	=> array('img' => null),
	);
	$result = $DB->FetchRow($fetchParams);	
        SERVER::dump($result);


?>