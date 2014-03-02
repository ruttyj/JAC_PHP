  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
  <xscript type="text/javascript" src="http://www.appelsiini.net/projects/chained/test/vendor/zepto-1.0.1.js"></script>
  <xscript type="text/javascript" src="http://www.appelsiini.net/projects/chained/test/vendor/zepto-selector.js"></script>
  <script src="http://www.appelsiini.net/projects/chained/jquery.chained.js?v=0.9.10" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" charset="utf-8">

$(function() {
    $("#make").chained("#year");
    $("#model").chained("#make");

});

</script>

<?php	error_reporting(E_ERROR | E_PARSE); //Easy Code No warings/notices errors
require_once('lib/server.class.php');//Paste to unlock
require_once('lib/db1.class.php');
    
    
$DBc = array(
	'host'		=>	'localhost',
	'username'	=>	'root',
	'password'	=>	'root',
	'database'	=>	'jacphp',
);
    



$DB = new DB1($DBc);
$DB->OpenConnection(); 
//==============================================================
//example fo some capabilities
$fetchParams = array(
	'table'         =>  'records',
        'select_items'  =>  'maker',
        'row_key'       =>  'maker',
        'flat_result'   =>  true,
);
$man = $DB->FetchRow($fetchParams);	
//$result = $DB->CountRow($fetchParams);	
//SERVER::dump($result);


       
            
            $i = 1;
            
            
            $fetchThis = array(
                    'table'         =>  'records',
                    'select_items'  =>  array('year','maker', 'model', 'cartype'),
                    'limit' =>  100,
                    //'row_key'       =>  '',
                //'offset' => $i,
                //'limit' => 1,
            );
            $all = $DB->FetchRow($fetchThis);
            
            
            
             $working = array();
            
            $url = array();
            $num = 0;
            foreach($all as $i){
                $theMaker = trim($all[$num][maker]);
                $theYear = trim($all[$num][year]);
                $theType = trim($all[$num][cartype]);
                $theModel = trim($all[$num][model]);
                
                
                $URL = 'http://www.edmunds.com/'.$theMaker.'/'.$theModel.'/'.$theYear;
                $URL = str_replace(' ', '-', $URL);
                $url[] = $URL;
                
                
                
                //---------------------------------
                
                
                $fetched = file_get_contents($URL);
  
                
                SERVER::dump(strlen($fetched));

                
                $num++;
            }
            //.'/?sub='.$theType
            
            //SERVER::dump($url);
           
            //*
            foreach($url as $x){
                
            }
            
            SERVER::dump($x);
            
            //*/