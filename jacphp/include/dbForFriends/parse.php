<?
	error_reporting(E_ERROR | E_PARSE); //Easy Code No warings/notices errors
	//require_once($_SERVER['DOCUMENT_ROOT'].'/CORE.php');//goes to root directory of server and includes file with all required material
	require_once('lib/server.class.php');


	//READ FROM FILE //////////////////////////////////////////////////
	//=================================================================
	$text = "";
	$lines = array();
	$handle = fopen("text/wallpappers.txt", "r");  
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $lines[] = $line;		//store in array
            $text .= $line."\n";	//and store as string            
        }
    }
    fclose($handle);
    
    
    
    header('Content-type: text/json');
    
    
	//EXTRACT //////////////////////////////////////////////////////////
	//=================================================================
	$delimiter = "<li>";
	$search = array(
		'start' => 'id="thumb-',
		'end'	=>	"\">\n");
	//----------------------------------------------------
	$result = array();
	$fetch  = split($delimiter, $text);	
	foreach($fetch as $k => $line){
		$pos = array();
		$pos['start'] = strpos($line, $search['start']);		//find start 
		$pos['end']   = strpos($line, $search['end']);
		
		
		
		
		
		
		//$data = $line;
		//$data = preg_grep('/".-"/', $line);
		
		SERVER::dump($line);
		
		
		//if both positions found take part of text inbetween
		if( is_numeric($pos['start']) && is_numeric($pos['end'])){
			//record sub-String
			$pos['SubStr'] = substr($line, $pos['start'], $pos['end']-$pos['start']);
		//	$pos['SubStr'] = str_replace('id="thumb-', '',$pos['SubStr']);
			$result[] = $pos['SubStr'];
		}
	}
	
	
	
	
	//DISPLAY /////////////////////////////////////////////////////////
	//=================================================================
	if(isset($_GET['JSON'])){ 
	//DISPLAY REQUEST FOR JSON -----------------------------
		header('Content-type: application/json');
		print(json_encode($result));
	} else { 
	//DISPLAY REGULARLY -----------------------------------
		//images
		foreach($result as $k => $img){
		//	print '<img src="'.$img.'"\>';
		
			//$result[$k] = str_replace('id="thumb-', '', $result[$k]);
			//SERVER::dump($result[$k]);
			//$pos['SubStr'] = 
		}
		//show list
		SERVER::dump($result);
		//give json encoded
		print "JSON encoded:<br><textarea>";
		print(json_encode($result));
		print '</textarea>';
	}


?>