<?php
require_once('lib/server.class.php');   // <--- check out the goodies in there :)

$DBc = array(
	'host'		=>	'localhost',
	'username'	=>	'root',
	'password'	=>	'root',
	'database'	=>	'people',
);
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
//
//									MYSQL
//
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
/*
This database class contains
	
CountRow	($params=array(), &$debug=false)
FetchRow	($params=array(), &$debug=false)
InsertRow	($params=array(), &$debug=false)
UpdateRow	($params=array(), &$debug=false)
DeleteRow	($params=array(), &$debug=false)
JoinFetchRow			($params=array(), &$debug=false)
InsertOrUpdateRow		($params=array(), $UniqueField=null, &$debug=false)
InsertUpdateOrDeleteRow	($params=array(), $UniqueField=null, &$debug=false)
----------------------------------------------------------------------------
SERVER::dump($var); will display the contents of the variable: array/object or otherwise
*/
require_once('lib/db1.class.php');
$DB = new DB1($DBc);
$DB->OpenConnection(); 




//accociative select all ------------------------------------------------
$fetchParams = array(
	'table'			=>	'users2',
    'select_items'	=>	'*',
    'row_key'		=>	'id',	//field from select to amke as key
);
SERVER::dump($fetchParams); //display params

$result = $DB->FetchRow($fetchParams);	
$result = json_encode($result, JSON_PRETTY_PRINT);
SERVER::dump($result); //display results
SERVER::dump($result); //display results






//==============================================================
//example fo some capabilities
$fetchParams = array(
	'table'			=>	'users2',
  	'select_items'	=>	array('username', 'id'),
  	'order'			=>	'desc',	
  	'by'			=>	'id',	//order field
  	'row_key'		=>	'id',	//accociative array key
  	//'print'			=>	true,	//print query
  	//'execute'		=>	false,	//no not execute query
  	'limit'			=>	5,
  	//'condition'	=>	'AND',	//by default
  	//'operator'	=>	'=',	//also by default
  	//'where_string'	=>	'WHERE blocked = 0' //manual sql syntax *NOTE* not protected
  	'where_items'	=>	array(
		'deleted' => 0, 		//condition is default AND
		'blocked' => 1
	)
	
);
$result = $DB->FetchRow($fetchParams);	
//SERVER::dump($result);



//==============================================================
// experiment using "magic methods"
//users2 is the table name... you can see where this can go...
$result = $DB->users2->FetchAll();
//SERVER::dump($result);



$DB->CloseConnection(); 	//CLOSE DATABASE










////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
//
//									MYSQLi
//
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
require_once('lib/dbi.class.php');


/*
MYSQL dynamic fetch... work in progress... 
used in my user search page we had to build
It looks bulkey, but the power comes from its ability to dynamicly build complex sqli securly... 
/*/
$myDBI = new DBI($DBc, true);
$fetchParams = array(
    'select_items' => array(
    	'id', 'username', 'email', 
    	'fname', 'lname', 'lastlogin', 
    	'num_sucess_login', 'num_fail_login', 'blocked'
    ),
    'from' => 'users2',
    'where_items' => array(
   		array(
   			'condition' => 'AND',
   			'field' => 's:username',// [type=s|i]:[fieldname]
   			'operator' => '=',
   			'value' => 'jordan',
   		),
   		array(
   			'condition' => 'OR',
   			'field' => 's:username',
   			'operator' => 'LIKE',
   			'value' => '%bob%',
   		)
    )
);
//SERVER::dump($fetchParams); // preview fetch params
$searchResults = $myDBI->FetchRows($fetchParams, $meta);	
//SERVER::dump($searchResults);

/*note* nice addition would be ability to use equivalent of perenthises
perhaps a group of conditions inside an array.. would require recursion however
*/
$myDBI->Disconnect();
?>