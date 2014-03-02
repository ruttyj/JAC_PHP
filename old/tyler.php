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
require_once __DIR__.'/include/globals.php';
require_once SERVER_CLASS;//Paste to unlock
require_once DB1_CLASS;
    
$DBconnect = array(
	'host'		=>	'127.0.0.1',
	'username'	=>	'jacphp',
	'password'	=>	'kittens',
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


       
        //==================================
        print '<hr>';
        
        $fetchParams = array(
	'table'         =>  'records',
        'select_items'  =>  array('year', 'maker', 'model', 'cartype'),
        //'row_key'       =>  'cartype',
        //'flat_result'   =>  true,
        );
        $fetch = $DB->FetchRow($fetchParams);
        
        
        $A = array();
        foreach($fetch as $row){
            $year = $row['year'];
            $model =$row['model'];
            $make =$row['maker'];
            $cartype =$row['cartype'];
            $A[$cartype][$make][$model][$year] = 1;
        }
        //SERVER::dump($A);
        //$A[$year][$make][$model];

        
            //-------------------------Car Years---------------------------
            $HTML = '<form action="" method="post">';
            $HTML.='Start year: <select id="year">';
            asort($A);
            foreach($A as $year => $makes)
            {
                $HTML.='<option value="'.$year.'">'.$year.'</option>'."\n";
            }
            $HTML.='</select>';
            
            $HTML.='<span style="padding-left:2cm;">';
            $HTML.='End Year: <select id="year2">';
            foreach($A as $year => $makes)
            {
                $HTML.='<option value="'.$year.'">'.$year.'</option>'."\n";
            }
            $HTML.='</select><br><br>';
            $HTML.='</span>';
            
            
            
            
            //-------------------------Car Manufacturer---------------------------
            $HTML.='Manufacturer: <select id="make">';
            foreach($A as $year => $makes){
                foreach($makes as $nameOfMake => $models){
                    $HTML.='<option value="'.$nameOfMake.'" class="'.$year.'">'.$nameOfMake.'</option>'."\n";
                    //SERVER::dump($models);
                }
            }
            $HTML.='</select><br><br>';
            
            //SERVER::dump($A);
            
            
            //-------------------------Car Model---------------------------
            $HTML.='Model: <select id="model">';
            
            $modelsListed = array();
            foreach($A as $year => $makes){
                foreach($makes as $nameOfMake => $models){
                    foreach($models as $model => $one){
                        $model = trim($model);
                        //if not outputed
                        if( !isset($modelsListed[$model])){
                            $HTML.='<option value="'.$model.'" class="'.$nameOfMake.' '.$year.'">'.$model.'</option>'."\n";
                            $modelsListed[$model] = 1; // add to outputted list
                        }
                        
                    }
                }
            }
            $HTML.='</select><br><br>';
            
            
            //-------------------------Car Class---------------------------
            
            $fetchParams = array(
                    'table'         =>  'records',
                    'select_items'  =>  'cartype',
                    'row_key'       =>  'cartype',
                    'flat_result'   =>  true,
            );
            $class = $DB->FetchRow($fetchParams);	
            
            sort($class);
            
            $HTML.='Car Class: <select id="class">';
            foreach($class as $val){
                $HTML.='<option value="'.$val.'">'.$val.'</option>'."\n";
                //SERVER::dump($models);
            }
            $HTML.='</select><br><br>';
            
            
            $HTML.='<input type="submit" value="Filter" name="submit"><br></form>';
            
            
            
            print $HTML;
?>