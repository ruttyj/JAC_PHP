
<?php require_once('lib/server.class.php');   // <--- check out the goodies in there :)
	require_once('lib/htmlparse.php');
	require_once('dbcon.php');
	require_once('lib/db1.class.php');


	$DB = new DB1($DBc);
	$DB->OpenConnection(); 






	function ModelImage(&$DB, $maker, $model){
		$fetchParams = array(
			'table'			=>	'records',
		  	'select_items'	=>	'img',
		  	'flat_result'	=>	true,
		  	'limit' 		=> 	1,
		  	//'offset'		=>	$offset,
		  	//'condition'		=>	'OR',
		  	//'print' => true,
		  	'where_items'	=>	array(
		  		'maker' => $maker,
		  		'model' => $model,
		  	),
			
		);
		$result = $DB->FetchRow($fetchParams);	//SERVER::dump($result);
		if(!empty($result)){
			return $result['img'];
		}
		return null;
	}



	$maker = 'ACURA';
	$model = 'ILX';
	$result = ModelImage($DB, $maker, $model);
	SERVER::dump($result);




$DB->CloseConnection();





















?>