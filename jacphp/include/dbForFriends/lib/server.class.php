<?php
ini_set("allow_call_time_pass_reference", 1); 
//Created by Jordan Rutty
//Created Sept2011
//Modified Nov2013 
if(!class_exists('SERVER')){
	class SERVER{
	
		public static $CONFIG		=	array();
		public static $config		=	array();
		public static $TimerStart	=	'';
		public static $PATH			=	array();
		public static $MemStart		=	'';
		public static $lastUpdated	=	'2011-07-10';
	



		public static function PREP($path=false){
			if(!empty($path)){
				$ConfigPath = $path;
				self::$MemStart = memory_get_usage();
				self::HTTP_REFERER();
				self::$PATH['ROOT'] = self::PathToRoot($_SERVER['SCRIPT_NAME']);
				include($ConfigPath);
				self::$CONFIG['SERVER'] = $config;
			} 
		}
	
	
	
		public static function tovar(&$var, $name, $array=null){
			$array = is_array($array) ? $array : $_REQUEST;
			$var = !empty($array[$name]) ? $array[$name] : '';
		}
	
	
	
		public static function global_include($script_path) {
		    // check if the file to include exists:
		    if (isset($script_path) && is_file($script_path)) {
		        // extract variables from the global scope:
		        extract($GLOBALS, EXTR_REFS);
		        ob_start();
		        include($script_path);
		        return ob_get_clean();
		    } else {
		        ob_clean();
		        trigger_error('The script to parse in the global scope was not found');
		    }
		}
	
	
	
	
		public static function AllTrue(){
		    $params = func_get_args  ();
		    $FalseCount = 0;
		    if(!empty($params)){
		    	foreach($params as $key => $value){
		    		if(!is_array($value) || empty($value))
		    			if(!$value)
		    				$FalseCount++;
		    		else
		    			foreach($value as $sub_key => $sub_value){
		    				$FalseCount = $FalseCount + !self::AllTrue($sub_value);
		    			}
		    	}
		    }
		    if(!$FalseCount){
		    	return true;
		    }
		}
	
	
	
		public static function printtruefalse($var=false){
			if($var)
		    	print ' TRUE<br/>';
		    else 
		    	print ' FALSE<br/>';
		    
		}
	
	
	
	
	
		public static function isthere(&$var=null, $false=false, $true=false){
			$true = ($true ? $true : $var);
			return (isset($var) && !empty($var) ? $true : $false);
		}
	
	
	
	
	
	
	
		public static function varname(&$var=null, $scope=false, $prefix='unique', $suffix='value'){
		    if($scope) $vals = $scope;
		    else      $vals = $GLOBALS;
		    $old = $var;
		    $var = $new = $prefix.rand().$suffix;
		    $vname = FALSE;
		    foreach($vals as $key => $val) {
		      if($val === $new) $vname = $key;
		    }
		    $var = $old;
		    return $vname;
	  	}
	
	
	
	
		//===================================================================
		//								VAR DUMP
		//===================================================================
		public static function dump(&$var=null, $name=false, $return=false){
			$debug = debug_backtrace();
			return self::print_r($var, $name, $debug);
		}
	
	
		public static function print_r(&$var=null, $name=false, $debug=null){
			
			$debug = !empty($debug) ? $debug : debug_backtrace();
			$debug = (isset($debug[1]) ? $debug[1] : false);
	
			//compile var name to be displayed
			$pre = '$';
			if(isset($debug['class'])){	//var belong to a class
				if($debug['type'] == '::')
					$pre = $debug['class'].$debug['type'].$pre;
				else 
					$pre = $pre.$debug['class'].$debug['type'];
						
			} 
			$name = ($name ? $pre.$name : $pre.self::varname($var));
			
			
			$string  = '';
			$string .= '<br/>';
			$string .= '<pre>';
			$string .= '<strong>'.$name.'</strong> = ';
			if(isset($var)){
				if(is_array($var) || is_object($var)){
					if(!empty($var)){
						$string .=  print_r($var, true);
					} else {
						$type = (is_object($var) ? 'object' : 'array');
						$string .=  '<strong>false</strong>; <em>//empty '.$type.'</em>';
					}
				} else {
					if(!empty($var)){
						$string .=  "'$var';";
					} else {
						$string .=  '<strong>false</strong>; <em>//empty string</em>';
					}
				}
			} else {
				$string .=  '!isset';
			}
			$string .=  '</pre>';
			
			if(!empty($return)){
				return $string;
			} else {
				print $string;
			}
		}
	
	
	
	
		public static function redirect($params=array(), $delay=false){
			
			if ( is_array($params) ){
				$url = ( !empty($params['redirect_url']) ? $params['redirect_url'] : false );
			} else {
				$url = $params;
			}
	
			if(empty($delay) || !is_numeric($delay)){	$delay = false;	}
			if(!$url){	$url = $_SERVER['REQUEST_URI'];	}
			
			$if_matches_url		=	( isset($params['if_matches_url']) && is_array($params)		? $params['if_matches_url'] 	: false );
			$use_backup_url		=	( isset($params['use_backup_url']) && is_array($params)		? $params['use_backup_url']		: false );
	
			if($if_matches_url && $use_backup_url){
				$redirect = ( SERVER::CleanUrl($url) != SERVER::CleanUrl($if_matches_url) ? $url : $use_backup_url);
			} else {
				$redirect = $url;
			}
			
			if(!headers_sent() && empty($delay)){
				header( "location: " . $redirect );
			} else{
				$delay = (!empty($delay) ? $delay : '0');
				echo '<META HTTP-EQUIV="refresh" CONTENT="'.$delay.';URL='.$redirect.'">';
			}
			exit;
		}	
		
		
		
		
		public static function refresh($delay=60){
			$delay = is_numeric($delay) ? $delay : 60;
			if(isset($_SERVER['REQUEST_URI'])){
				echo '<META HTTP-EQUIV="refresh" CONTENT="'.$delay.';URL='.$_SERVER['REQUEST_URI'].'">';
			}
		}
	
	
	
	
		public static function StopTimer(){
		}
	
	
	
	
	
		
		public static function SetConfig($params){
			$ClassName			=	(	isset($params['name'])		?	$params['name']		:	null	);
			$ClassLocation		=	(	isset($params['location'])	?	$params['location']	:	null	);
			$ConfigLocation		=	(	isset($params['config'])	?	$params['config']	:	null	);
		
			if($ClassName && !empty($ConfigLocation) && is_file($ConfigLocation)){
				include($ConfigLocation);
				$settings = (isset($config) ? $config : false);
				
				self::$CONFIG[$ClassName] 			= 	$settings;
				self::$config[$ClassName] 	= 	$ConfigLocation;
			}
		}
	
	
	
	
	
	
		public static function ChangeSettings($switches=null){
			if(!empty($switches) ){
				foreach($switches as $name => $info){
					if ($_SERVER['SERVER_NAME'] == $name){
						$result = $info;	
	  				}
	  			}
	  			
	  			if(empty($result) && isset($switches['other'])){
	  				$result = $switches['other'];
	  			}
				return (isset($result) ? $result : false);
			}
		}
	
	
	
	
		public static function HostSwitch($switches=null, $details=null){
			if(!empty($switches) && !empty($details)){
				foreach($switches as $name => $server){
					if ($_SERVER['SERVER_NAME'] == $server){
						$result = $details[$name];
	  				}
	  			}
				return (isset($result) ? $result : false);
			}
		}
	
	
	
	
	
		public static function RandomKey($length=10) {
			$lowercase 	= 	'abcdefghijkmnopqrstuvwxyz';
			$uppercase	=	strtoupper($lowercase);
			$numbers	=	'0123456789';
			$symbols	=	'~!@#$^&*-+';
		    $chars 		= 	$numbers.$lowercase.$uppercase.$symbols;
			
		    srand((double)microtime()*1000000);
		    $i = 0;
		    $pass = '' ;
		
		    while ($i <= $length) {
		        $num = rand(0, strlen($chars));
		        $tmp = substr($chars, $num, 1);
		        $pass = $pass . $tmp;
		        $i++;
		    }
		    return $pass;
		}
	
	
	
	
		
		//create a relitave path from current location using the path from root
		public static function RelativePathFromRoot($INTENDED_PATH=""){
		    $SCRIPT_PATH = $_SERVER['SCRIPT_NAME'];
		    $url = preg_replace('#([^/]+)/\.\.\/#', '', $SCRIPT_PATH);
		    $url = str_replace('../', '\'', $url);		
		    $url = str_replace('./', '', $url);		
		    $url = str_replace('//', '/', $url);	
		    $url = str_replace('\'', '../', $url);		
		    $url = preg_replace('#([^/]+)/#', '../', $url);
		    $url = substr($url, 0, strrpos($url, '/') + 1);
		    $url = ( substr($url, 0, 1) == '/' ? substr($url, 1) : $url );
		    $url = $url . $INTENDED_PATH;
		    foreach (explode('/', $SCRIPT_PATH) as $DIR){
		    	if(in_array($DIR, explode('/', $INTENDED_PATH))){
		    		$url = str_replace('../'.$DIR.'/', '', $url);
		    	}
		    }			
		    return $url;
		}
	
	
	
		//DOUBLE CHECK THIS.... FIX
		//create absolute url using a relative path
		public static function AbsoluteUrl($INTENDED_PATH="", $ROOT=null){
		    $ROOT = (isset($ROOT) ? $ROOT : 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']);
		    $SCRIPT_PATH = $_SERVER['SCRIPT_NAME'];
		    $url = $ROOT;
		    $url = substr($url, 0, strrpos($url, '/') + 1);
		    $url = $url.$INTENDED_PATH;
		    $url = preg_replace('#([^/]+)/\.\.\/#', '', $url);
		    return $url;
		}
		
		
	
		public static function CleanUrl($url){					
	
		//	$url = preg_replace('#([^/]+)/\.\.\/#', '', $url);
			$url = str_replace('../', '\'', $url);		
			$url = str_replace('./', '', $url);		
			$url = str_replace('\'', '../', $url);		
			$url = str_replace('//', '/', $url);	
			$url = str_replace('//', '/', $url);
			
		
			return $url;
		}
		
		
		
		public static function PathToRoot($url){
		    $url = self::CleanUrl($url);
	    	$url = preg_replace('#([^/]+)/#', '../', $url);
	    	$url = substr($url, 0, strrpos($url, '/') + 1);
	    	$url = ( substr($url, 0, 1) == '/' ? substr($url, 1) : $url );
	    	return $url;
		}  
	
	
		
		public static function ROOT(){
		  	if(!isset(self::$PATH['ROOT'])){
		  		if( !isset(self::$PATH['ROOT']) ){
		  			self::$PATH['ROOT']	 =  self::PathToRoot($_SERVER['SCRIPT_NAME']);
		  		}
		  	}
		  	return self::$PATH['ROOT'];
		}
		
		
		
		public static function HTTP_REFERER(){
		  	if(!isset(self::$PATH['HTTP_REFERER'])){
		  		$return	 = (isset($_SERVER['HTTP_REFERER']) 	? $_SERVER['HTTP_REFERER'] 		: false);
		  		self::$PATH['HTTP_REFERER'] = $return;
		  	}
		  	return self::$PATH['HTTP_REFERER'];
		}
	
		public static function IP(){
			if ( isset($_SERVER["REMOTE_ADDR"]) ){
				$ip=$_SERVER["REMOTE_ADDR"] . ' ';
			} else if ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) ){
				$ip=$_SERVER["HTTP_X_FORWARDED_FOR"] . ' ';
			} else if ( isset($_SERVER["HTTP_CLIENT_IP"]) ){
				$ip=$_SERVER["HTTP_CLIENT_IP"] . ' ';
			} 
			return $ip;
		}
	
	
	
		public static function CONFIG($name){
			return ( isset(self::$CONFIG[$name] )	?	self::$CONFIG[$name]	:	false	);
		}
	
	
	
	
		public static function SESSIONVAR($KEY=false, $OR=false){
			if($KEY == false){
				$return	=	(	isset($_SESSION)		?	$_SESSION	:	$OR	);
			} else {
				$return	=	(	isset($_SESSION[$KEY])	?	$_SESSION[$KEY]	:	$OR	);
			}
			return 	self::PrepForRetrevial($return);
		}
	
	
		public static function COOKIEVAR($KEY=false, $OR=false){
			if($KEY == false){
				$return	=	(	isset($_COOKIE)		?	$_COOKIE	:	$OR	);
			} else {
				$return	=	(	isset($_COOKIE[$KEY])	?	$_COOKIE[$KEY]	:	$OR	);
			}
			return 	self::PrepForRetrevial($return);
		}
	
	
	
	
		public static function POSTVAR($KEY=false, $OR=false, $strip=true){
			if($KEY == false){
				$return	=	(	isset($_POST)		?	$_POST	:	$OR	);
			} else {
				$return	=	(	isset($_POST[$KEY])	?	$_POST[$KEY]	:	$OR	);
			}
			if(!empty($strip)){
				return $return;
			} else {
				return 	self::PrepForRetrevial($return);
			}
		}
	
	
		public static function GETVAR($KEY=false, $OR=false){
			if($KEY == false){
				$return	=	(	isset($_GET)		?	$_GET	:	$OR	);
			} else {
				$return	=	(	isset($_GET[$KEY])	?	$_GET[$KEY]		:	$OR	);
			}
			return 	self::PrepForRetrevial($return);
		}
	
	
	
		public static function ODDVAR($ARRAY, $KEY=false, $OR=false){
			if( is_array($ARRAY) ){
				if($KEY == false){
					$return	=	(	isset($ARRAY)		?	$ARRAY			:	$OR	);
				} else {
					$return	=	(	isset($ARRAY[$KEY])	?	$ARRAY[$KEY]	:	$OR	);
				}
			} else {
				$result = $ARRAY;
			}
			return 	self::PrepForRetrevial($return);
		}
	
	
	
		public static function PrepForStorage( $data=false, $PrepForStorage_type='none' ){
			if(!function_exists('PrepForStorageDeep')){       
			    function PrepForStorageDeep($value){
			        if( is_array($value) ){
			    		$value = array_map('PrepForStorageDeep', $value);
			        } else {
						$value	=	(	get_magic_quotes_gpc()	?	stripslashes($value)	:	$value	);
			    		$value 	= 	addslashes($value);
			    		//$value 	= 	htmlentities($value);
			    	}
			        return $value;
			    }
			}
	        return PrepForStorageDeep($data);
		}
	
	
	
	
		public static function PrepForRetrevial($value){
		if(!function_exists('PrepForRetrevialDeep')){       
			function PrepForRetrevialDeep($value){
			    if( is_array($value) ){
					$value = array_map('PrepForRetrevialDeep', $value);
			    } else {
					//$value = html_entity_decode($value);
					$value = stripslashes($value);
				}
			    return $value;
			}
		}
			return PrepForRetrevialDeep($value);
		}
	
	
	
	
		public static function import($path=false){
			if(!empty($path)){
				self::PREP($path);
			}
		
			$config	= self::$CONFIG['SERVER']['import'];
			if(isset($config) && is_array($config)){
				foreach($config as $params){
					if( isset($params['name']) ){
				
						if( isset($params['config']) ){	
							$params['config'] = $params['config'];
							if( is_file($params['config']) ){	
								self::SetConfig($params);		
							}	
						}
					
						if( isset($params['location']) ){		
							$location 	=	$params['location'];
							if( is_file($location) ) {
								self::global_include($location);	
							}
						}
					
					}
				}
			}
		}
		
		
		
		
		public static function load($class){
			$config	= self::$CONFIG['SERVER']['import'];
			if(isset($config) && is_array($config)){
				foreach($config as $params){
					if( isset($params['name']) && !class_exists($params['name']) && strtolower($params['name']) == strtolower($class)){
				
						if( isset($params['config']) ){	
							$params['config'] = $params['config'];
							if( is_file($params['config']) ){	
								self::SetConfig($params);		
							}	
						}
					
						if( isset($params['location']) ){		
							$location 	=	$params['location'];
							if( is_file($location) ) {
								self::global_include($location);	
							}
						}
					
					}
				}
			}
			
		}
	
	
	
	
	
	
	
	// ARRAY functions --------------------------------------------------------------------
	
	
	
			
		function array_diff_no_cast(&$ar1, &$ar2) {
			$diff = Array();
			if(!empty($ar1)){
				foreach ($ar1 as $key => $val1) {
				   if (array_search($val1, $ar2) === false) {
				      $diff[$key] = $val1;
				   }
				}
				return $diff;
			}
		}
	
	
	
	
	
		public static function subvalues($array, $subvalue='id'){
			if(!empty($array)){
				foreach($array as $key => $values){
					if( isset($values[$subvalue]) ){
						$result["$key"]	=	$values[$subvalue];
					}
				}
			}
			return (!empty($result) ? $result : false);
		}
	
	
	
	
		//count the maximum subvalues (columns) in a 2D array (table) 
		public static function submaxcount($array=array(), $return_key=false){
			foreach((array)$array as $key => $row){
				$count[$key] = count($row);
			}
			
			if(!empty($count)){
				$max = max($count);
		
				if(!$return_key){
					return $max;
				} else {
					return array_flip($count);
				}
			}
		}
	
	
	
	
		//set the key of an array as one of the subvalues
		public static function rowkey($array, $subvalue='id'){
			if(!empty($array)){
				foreach($array as $key => $values){
					if( isset($values[$subvalue]) ){
						$result[($values[$subvalue])]	=	$values;
					}
				}
			}
			return (!empty($result) ? $result : false);
		}







		//join multiple columns into a new column
		public static function columnCombine($array, $name, $keys=array(), $join=' ', $AllowEmpties=false){
			if(!empty($array)){
				$temp = array();
				foreach((array)$array as $k => $v){
					if(is_array($v)){
						foreach((array)$keys as $key){
							if(isset($v[$key])){
								$temp[$key] = $v[$key];
							}
						}
					}
					if(isset($temp)){
						$temp = array_filter($temp);
						$array[$k][$name] = implode($join, $temp);
						unset($temp);
					}
				}
			}
			return $array ? $array : false;
		}








	
		//filters unwanted 2D array keys (rows)
		public static function allow_keys(&$array, $allow=array()){
			$array = array_intersect_key($array, array_flip(array_values((array)$allow)));
		}
	
	
	
		//filters unwanted 2D array subkeys (columns)
		public static function allow_subkeys(&$array, $allow=array()){
			foreach((array)$array as $key => $val){
				 self::allow_keys($array[$key], $allow);
			}
		}



		//remove multiple specified columns from an array
		public static function unsetsubvalues($array, $subvalue=false){
			$subvalue = (array)$subvalue;
			if(!empty($array)){
				foreach($array as $key => $values){
					foreach($subvalue as $sub){
						if( isset($values[$sub]) ){
							unset($array[$key][$sub]);
						}
					}
				}
			}
			return (!empty($array) ? $array : false);
		}
	
	
	
	
	
		//transformes 2D array into (2+#KeysProvided)D array
		public static function group($array, $row_key=array(), $allow=false, &$result=null, $json=false){
			if(is_array($array) && !empty($array)){
				$row_key = (array)$row_key;
				$keys = $row_key;
			    $last = array_pop($keys);
	
				foreach($array as $value){
					$i='';
					if(!empty($row_key)){
						$Ukey = (!empty($last) && isset($value[$last]) ? $value[$last] : null);
			    		foreach($keys as $var){
			    			if(isset($value[$var])){
			    				$var = $value[$var];
			    				$i .= "['".addslashes($var)."']";
			    			}
			    		}
			    	}
			    	
			    	if(!empty($allow)){
			    		foreach((array)$allow as $key){
			    			if(isset($value[$key])){
			    				$contents[$key] = $value[$key];
			    			}
			    		}
			    	} else {
			    		$contents = $value;
			    	}
			    	if($json) $contents = json_encode($contents);
			    	eval("\$result$i".'['.(isset($Ukey) ? "'$Ukey'" : '').']'." = \$contents;");
				}
				return $result;
			} else {
				return $array;
			}
		}
	


		//Old name for group
		public static function loopRowKey($array, $row_key=array(), $allow=false, &$result=null, $json=false){
			return self::group($array, $row_key, $allow, $result, $json);
		}
		
		
/*

		//remove X dimensions from a multi-D array 
		public static function loopedFlatten(&$array, $count, &$return=null, $row_key=null, $ref=false){	
			$count = abs($count-1);
			if(!empty($array)){
				foreach((array)$array as $key => $value){
					if(!empty($count)){
						self::loopedFlatten($array[$key], $count, &$return, $row_key);
					} else {
						if(!empty($row_key) && isset($value[$row_key])){
							if($ref){
								$return[($value[$row_key])] = &$array[$key];
							} else {
								$return[($value[$row_key])] = $array[$key];
							}
						} else {
							if($ref){
								$return[] = &$array[$key];
							} else {
								$return[] = $array[$key];
							}
						}
					}
				}
			}
		}
*/









		//sorts an array with grouping capability 
		//ie. sort by lastname and then subsort that by firstname
		function subsort($array, $keys=array(), $rowKey=null){
			
			$result = self::group($array, array_keys($keys));
			$filter = array_filter($keys);
			if(!empty($filter)){
				self::loopedSorter($result, $keys, null);
			}
			
			$k = array_pop(array_keys($keys));
			self::loopedFlatten($result, count($keys), $return, $k);
			return $return;
		}





		public static function loopedFlattenRef(&$array, $count, &$return=null, $row_key=null){	
			$count--;
			foreach($array as $key => $value){
				if(!empty($count) && is_array($value)){
					self::loopedFlattenRef($value, $count, $return, $row_key);
				} else if(!empty($row_key) && isset($value[$row_key])){
					$return[($value[$row_key])] = &$array[$key];
				} else{
					$return[] = &$array[$key];
				}
			}
		}














		//transformes 2D array into (2+# keys provided)D array
		public static function LoopRowKeyRef(&$array, $row_key=array(), &$result){
			if(is_array($array) && !empty($array)){
				$row_key = (array)$row_key;
				$keys = $row_key;
			    $last = array_pop($keys);
	
				foreach($array as $key => $value){
					$i='';
					if(!empty($row_key)){
						$Ukey = (!empty($last) && isset($value[$last]) ? $value[$last] : null);
			    		foreach($keys as $var){
			    			if(isset($value[$var])){
			    				$var = $value[$var];
			    				$i .= "['".addslashes($var)."']";
			    			}
			    		}
			    	}
			    	
			    	
			    	eval("\$result$i".'['.(!empty($Ukey) ? "'$Ukey'" : '').']'." = &\$array[\$key];");
				}
				return $result;
			} else {
				return $array;
			}
		}





		//sort multi-D arrays based on array or orders
		public static function loopedSorter(&$array, $keys){	
			$keys_key = array_keys($keys);
			$order = array_shift($keys);
			$decreasing_array = array('rev', 'reverse', 'decreasing', 'desc', 'down', '>');
	
			if(!empty($order) && is_array($array) && strtolower($order) != 'null'){
				if(in_array($order, $decreasing_array) ){
					krsort($array);
				} else{
					ksort($array);
				}
			}
				
			if(!empty($keys) && !empty($array)){
				foreach($array as $key => $value){
					self::loopedSorter($array[$key], $keys);
				}
			}
		}
		



		public static function loopedFlattenMeta(&$array, $keys, &$return=null, $row_key=null, &$i=0, $current=null){	
			
		//	array_shift($keys);
		//	$count = count($keys);
		//	$row_key = !empty($row_key) ? $row_key : array_pop(array_keys($keys));
			$keys = (array)$keys;
			$new_current = array_shift($keys);
			if(empty($new_current)) $new_current = $current;
			$count = count($keys);


			$item_pos=1;
			foreach($array as $key => $value){
				$index = $i;
				$return[$index]['meta'][$new_current.'.pos'] = $item_pos;
				$return[$index]['meta'][$new_current.'.count'] = count($array);
				
				if(!empty($count) && is_array($value)){
					self::loopedFlattenMeta($value, $keys, $return, $row_key, $i, $new_current);
				} else {
					$return[$index]['data'] = &$array[$key];
					$i++;
				}
				$item_pos++;
			}
		}
		
		
		


		//sorts an array with grouping capability 
		//ie. sort by lastname and then subsort that by firstname
		function subSortRef(&$return, &$array, $keys=array()){
			
			$associative = (array_keys($keys) !== range(0, count($keys)-1));
			$columns = $cols = $associative ? array_keys($keys) : $keys;
			
			
			$result = self::loopRowKeyRef($array, $columns, $result);
			
			if($associative){
				$filter = array_filter($keys);
				if(!empty($filter)) self::loopedSorter($result, $keys, null);
			}
			
			$k = array_pop($columns);
			
			self::loopedFlattenMeta($result, $cols, $return, $k);
		}








		public static function simpleSubFilter($array, $contains=array()){
			foreach((array)$array as $key => $subarray){
				$has = true;
				
				$true = 0;
				foreach($contains as $col => $value){
					if(isset($subarray[$col]) && $subarray[$col] == $value){
						$true++;
					}
				}
				
				if($true == count($contains)){
					$return[$key] = $subarray;
				}
			}
			return !empty($return) ? $return : null;
		}

	
		//sorts multi-D array based on a column
		public static function svsort(&$array, $subkey='id' , $direction='<') {
			$decreasing_array = array('rev', 'reverse', 'decreasing', 'desc', 'down', '>');
			
			if(!empty($array) && is_array($array)){
				foreach($array as $key => $value) {
					$subkeyvalue = (!empty($value[$subkey]) ? $value[$subkey] : false);
					$array_of_subvalues[$key] = strtolower($subkeyvalue);
				}
				if(!empty($array_of_subvalues)){
					if(in_array(strtolower($direction), $decreasing_array)){
						arsort($array_of_subvalues);
					} else {
						asort($array_of_subvalues);
					}
					foreach($array_of_subvalues as $key => $value) {
						$final[] = $array[$key];
					}
					
					$array = $final;
				}
			}
			return $array;
		}
	
	
	




		//sorts recursivley in ascending order
		public function suborder(&$array){ //flagg add mroe functionality
			if(is_array($array)){
				foreach($array as $key => $value){
					if(is_array($value)){
						ksort($array[$key]);
						foreach($value as $k => $v){
							if(is_array($v)){
								self::suborder($array[$key][$k]);
							}
						}
					}
				}
				ksort($array);
			}
		}






		//sort an arrays keys based on another array
		public static function array_sort(&$array,$orderArray){
		    $ordered = array();
		    if(!empty($orderArray)){
		    	foreach($orderArray as $key) {
		    	    if(isset($array[$key])) {
		    	            $ordered[$key] = $array[$key];
		    	            unset($array[$key]);
		    	    }
		    	}
		    	$array = $ordered + $array;
		    }
		}
	
	




		//flatten an array to a 1D array
		public static function array_flatten($array) {
		    $final = array(); 
		    if(!is_array($array)) return $final;
		    foreach((array)$array as $value){
		        if(is_array($value)){
		            $final = array_merge($final, self::array_flatten($value));
		        } else {
		            array_push($final,$value);
		        }
		    }
		    return $final;
		}





		//determins the offset of a key in an array
		public static function key_offset(&$array, $searchKey){
			if(is_array($array) && array_key_exists($searchKey, $array)){
				$counter = 0;
				foreach($array as $key => $value){
					if($searchKey == $key){
						return $counter;
					} else {
						$counter++;
					}
				}
			}
		}
		
		
		
		//pushes values to an array before or after a specified key 
		public static function array_insert(&$original=array(), $insert=null, $position='after', $key=null, $sens=true){
			if(!empty($insert)){	
			   	$after = $position == 'after' ? true : false;
			   	$insert = (array)$insert;	   	
			   	$assoc = (array_keys($insert) !== range(0, count($insert)-1));	   	
			   	$keep_keys = is_string($insert) || !$assoc || $sens;
			   	
				if(!empty($key) && array_key_exists($key, $original)){	
		    		$start = self::key_offset($original, $key);
		   			$start = $after ? $start+1 : $start;
					if(!$keep_keys){	
		    	    	array_Splice($original,$start,0,$insert);
		  		  	} else {
		    			$keys = array_Keys($original);
		    			$values = array_Values($original);
		    	    	$insert = (array)$insert;
		    	    	$rKeys = array_Keys($insert);
		    	    	$rValues = array_Values($insert);
		    	    	array_Splice($keys,$start,0,$rKeys);
		    	    	array_Splice($values,$start,0,$rValues);
		  		  		$original = array_Combine($keys,$values);
		  		  	}
		    	} else {
		    		$original = $after ? array_merge($original, $insert) : array_merge($insert, $original);
		    	}
		    }
		}







		//take an array and expand it into individual entries
		public static function expand_array($array, $name) {
			if( is_array($array) ) {
				$array = str_replace(" ", "_", $array);
				$array_name = '$'.$name;
				
				function expland_array_pt2($sub_array, $add) {	
				$i = 0;
					foreach ($sub_array as $key_array => $value_array){	
						if( is_array($value_array) ) {
							$addto = $add.'[\''.$key_array.'\']';
							expland_array_pt2($value_array, $addto);
						} else {
							print $add.'[\''.$key_array.'\'] = \''.$value_array.'\';<br/>';
						}
						$i++;
					}
				}
				expland_array_pt2($array, $array_name);
			} else {
				return null;
			}
		}	
	
	
	
	
	//STRING FUNCTIONS -----------------------------------------------------------------	
	
	
	
	
		//determins if number is between two numbers
		public static function between($value, $min=0, $max=0){
			if(is_numeric($value) && is_numeric($min)){
				if($value >= $min){
					if(isset($max)){
						if($value <= $max){
					 		return true;
					 	}
					} else{
						return true;
					}
				}
			}
		}
	



	
		
		
		// limit the amount of WORDS to x amount and add ...
		public static function WordLimiter($text, $limit){ 
		    if(is_string($text)){
		    	$explode = explode(' ', $text); 
		    	$string  = ''; 
		    	if(!empty($explode)){ 
		    		$dots = '...'; 
		    		if(count($explode) <= $limit){ 
		    		    $dots = ''; 
		    		} 
		    		for($i=0;$i<$limit;$i++){ 
		    		    if( !empty($explode[$i]) ){
		    		    	$string .= $explode[$i]." "; 
		    		    }
		    		} 
		    		return $string.$dots; 
		    	}
		    }
		} 
	
	
		public static function excerpt($text, $excerpt_length=55) { // Fakes an excerpt if needed
		    if(is_string($text)){
		    	$text = trim($text);
			    $text = strip_tags($text);
			    $words = explode(' ', $text, $excerpt_length + 1);
			    if (count($words)> $excerpt_length) {
			    	array_pop($words);
			    //	array_push($words, '[...]');
			    	$text = implode(' ', $words);
			    }
			}
			return $text;
		}
	
	
	
		public static function print_mem_usage(){
			$return['initial'] = self::$MemStart*0.0078125;  
			$return['change'] = (memory_get_usage() - self::$MemStart) * 0.0078125;  
			$return['peak'] = memory_get_peak_usage() * 0.0078125;  
			return $return;
		}
	
	
		public static function ConvertUrls($text){
		    $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
			return preg_replace( "`[\s,\>]((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", " <a href=\"http\\3://\\5\\6\\8\\9\" target=\"_blank\">\\5\\6</a>", $text);	
		}
	
	
		public static function ConvertYoutubeUrls($text){
			return preg_replace( "`[\s,\>]http:\/\/www\.youtube\.com\/watch\?v\=((\w|\.|\-|_)+)(/)?(\S+)?`i", " <p class=\"embeded_youtube\"><iframe title=\"YouTube video player\" width=\"640\" height=\"390\" src=\"http://www.youtube.com/embed/\\1\" frameborder=\"0\" allowfullscreen></iframe></p> ", $text);	
		}
	
		
		public static function StripEmptyTags($text){
			return preg_replace( "`\<[^<]*\>\</[^<]*\>`", '', $text);	
			
		}
		
		public static function nl2br($string){
		    $string = str_replace("\n", "<br />", $string);
		    if(preg_match_all('/\<pre\>(.*?)\<\/pre\>/', $string, $match)){
		        foreach($match as $a){
		            foreach($a as $b){
		            $string = str_replace('<pre>'.$b.'</pre>', "<pre>".str_replace("<br />", "", $b)."</pre>", $string);
		            }
		        }
		    }
			return $string;
		}
	
	
	
	





		public function Storejsonfile($DataFile, $Data){
		    $FilePointer = fopen($DataFile, "w+");
	        $Content = json_encode($Data);
		    fwrite($FilePointer, $Content);
		    fclose($FilePointer);
		}







	
		public function StoreData($DataFile, $Data){
		    $FilePointer = fopen($DataFile, "w+");
	        $Content = '<?php'."\n\n";
	        foreach($Data as $key => $value){
	        	$Content .= '$'.addslashes($key).' = "'. addslashes($value) .'";'."\n";
	        }
	        $Content .= "\n".'?>';
		    fwrite($FilePointer, $Content);
		    fclose($FilePointer);
		}
	
	
	
		public function post_file_get_contents($url, $post_params=array()){
			$opts = array('http' => array(
			        'method'  	=> 'POST',
			        'header'  => 'Content-type: application/x-www-form-urlencoded',
			        'content' 	=> http_build_query($post_params),
			    )
			);
			
			return file_get_contents($url, false, stream_context_create($opts));
		}
	






		public function EraseContent($array, $replace=''){
			if(is_array($array)){	
    			foreach($array as $key => $values){
    				if(is_array($values)){
    					foreach($values as $id => $value){
    						if(is_string($value)){
    							$array[$key][$id] = $replace;
    						} elseif(is_array($value)){
    							$array[$key][$id] = self::EraseContent($value, $replace);
    						}
    					}
    				} elseif(is_string($values)) {
    					$array[$key] = $replace;
    				}
    			}
    		} elseif(is_string($array)) {
    			$array = $replace;
    		}
			return $array;
		}




	
	
		public function DumpTable($array, $header=true, $t=false, $border=true) {
				$table = "<table";
				$table .= " width=\"100%\" height=\"100%\" ".($border == true ? 'border="1px solid black" cellpadding=\"3\" cellspacing=\"0\"' : 'style="cellborder:0px; outline:0px; border:0px;" cellpadding="0" cellspacing="1"')."  >\n";
				$HeadStyle = 'style="background: #E1E1E1"';
		
				if($header){
					$first = reset($array);
					if(is_array($first)){
						$keys = array_keys($first);
						$head ='<tr><td '.$HeadStyle.'><strong>'.join($keys, '</strong></td><td '.$HeadStyle.'><strong>')."</strong></td></tr>\n";
					}
				}
				
				$head = isset($head) ? $head : '';
				$table .= "<thead>\n";	
				$table .= $head;
				$table .= "</thead>\n";	
				$table .= "<tbody>\n";	
				if(is_array($array)){	
					foreach($array as $key => $values){
						if(!$t) $table .='<tr>';
						if(is_array($values) && !empty($values)){
							foreach($values as $k => $v){
								if($v === '') $values[$k] = '&nbsp;';
							}
							foreach($values as $value){
								if(is_string($value)){
									$table .='<td>'.$value."</td>\n";
								} elseif(is_array($value)){
									$table .='<td>'.self::Dumptable($value, false, true, $border)."</td>\n";
								}
							}
						} else {
							$table .='<td>'.self::Dumptable($values, false, true, $border)."</td>\n";
						}
						if(!$t) $table .= "</tr>\n";
					}
				} else {
					$table .='<td>'.$array."</td>\n";
				}
				$table .= "</tbody>\n";	
				
				$table .= "<tfoot>\n";	
				$table .= $head;
				$table .= "</tfoot>\n";	
				
				$table .= "</table>\n";	
				return $table;
		}
	
	
	
	
	
	
	
	    public function file_content_type($filename) {
	        $mime_types = array(
	
	            'txt' => 'text/plain',
	            'htm' => 'text/html',
	            'html' => 'text/html',
	            'php' => 'text/html',
	            'css' => 'text/css',
	            'js' => 'application/javascript',
	            'json' => 'application/json',
	            'xml' => 'application/xml',
	            'swf' => 'application/x-shockwave-flash',
	            'flv' => 'video/x-flv',
	
	            // images
	            'png' => 'image/png',
	            'jpe' => 'image/jpeg',
	            'jpeg' => 'image/jpeg',
	            'jpg' => 'image/jpeg',
	            'gif' => 'image/gif',
	            'bmp' => 'image/bmp',
	            'ico' => 'image/vnd.microsoft.icon',
	            'tiff' => 'image/tiff',
	            'tif' => 'image/tiff',
	            'svg' => 'image/svg+xml',
	            'svgz' => 'image/svg+xml',
	
	            // archives
	            'zip' => 'application/zip',
	            'rar' => 'application/x-rar-compressed',
	            'exe' => 'application/x-msdownload',
	            'msi' => 'application/x-msdownload',
	            'cab' => 'application/vnd.ms-cab-compressed',
	
	            // audio/video
	            'mp3' => 'audio/mpeg',
	            'qt' => 'video/quicktime',
	            'mov' => 'video/quicktime',
	
	            // adobe
	            'pdf' => 'application/pdf',
	            'psd' => 'image/vnd.adobe.photoshop',
	            'ai' => 'application/postscript',
	            'eps' => 'application/postscript',
	            'ps' => 'application/postscript',
	
	            // ms office
	            'doc' => 'application/msword',
	            'rtf' => 'application/rtf',
	            'xls' => 'application/vnd.ms-excel',
	            'ppt' => 'application/vnd.ms-powerpoint',
	
	            // open office
	            'odt' => 'application/vnd.oasis.opendocument.text',
	            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
	        );
	
	        $ext = strtolower(array_pop(explode('.',$filename)));
	        if (function_exists('finfo_open')) {
	            $finfo = finfo_open(FILEINFO_MIME);
	            $mimetype = finfo_file($finfo, $filename);
	            finfo_close($finfo);
	            return $mimetype;
	        } elseif (array_key_exists($ext, $mime_types)) {
	            return $mime_types[$ext];
	        }
	        
	        return 'application/octet-stream';
	    }
	
	
	
		public static function RemoveNumbers($string) {
				$string = preg_replace('#[0-9.]#', '', $string);
				return $string;
		}
		   
		  
		  
		
		public static function RemoveLetters($string) {
				$string = preg_replace('#[a-zA-Z]#', '', $string);
				return $string;
		}
	
	

		public static function rgb2hex($r, $g=-1, $b=-1){
		    if (is_array($r) && sizeof($r) == 3)
		    list($r, $g, $b) = $r;
		
		    $r = intval($r); 
		    $g = intval($g);
		    $b = intval($b);
		
		    $r = dechex($r<0?0:($r>255?255:$r));
		    $g = dechex($g<0?0:($g>255?255:$g));
		    $b = dechex($b<0?0:($b>255?255:$b));
		
		    $color = (strlen($r) < 2?'0':'').$r;
		    $color .= (strlen($g) < 2?'0':'').$g;
		    $color .= (strlen($b) < 2?'0':'').$b;
		    return '#'.strtoupper($color);
		}	

		
		public static function hex2rgb($hexStr, $returnAsString=false, $seperator=','){
		    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
		    $rgbArray = array();
		    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
		        $colorVal = hexdec($hexStr);
		        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
		        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
		        $rgbArray['blue'] = 0xFF & $colorVal;
		    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
		        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
		        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
		        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
		    } else {
		        return false; //Invalid hex color code
		    }
		    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
		}












		
		public static function levenshtein($str1, $str2, $insensitive=true){
		    if($insensitive){
		    	$str1 = trim(strtolower(''.$str1));
		    	$str2 = trim(strtolower(''.$str2));
			}
			
		    $len1 = mb_strlen($str1);
		    $len2 = mb_strlen($str2);
		   
		    // strip common prefix
		    $i = 0;
		    do {
		        if(mb_substr($str1, $i, 1) != mb_substr($str2, $i, 1))
		            break;
		        $i++;
		        $len1--;
		        $len2--;
		    } while($len1 > 0 && $len2 > 0);
		    if($i > 0) {
		        $str1 = mb_substr($str1, $i);
		        $str2 = mb_substr($str2, $i);
		    }
		   
		    // strip common suffix
		    $i = 0;
		    do {
		        if(mb_substr($str1, $len1-1, 1) != mb_substr($str2, $len2-1, 1))
		            break;
		        $i++;
		        $len1--;
		        $len2--;
		    } while($len1 > 0 && $len2 > 0);
		    if($i > 0) {
		        $str1 = mb_substr($str1, 0, $len1);
		        $str2 = mb_substr($str2, 0, $len2);
		    }
		   
		    if ($len1 == 0)
		        return $len2;   
		    if ($len2 == 0)
		        return $len1;
		   
		    $v0 = range(0, $len1);
		    $v1 = array();
		   
		    for ($i = 1; $i <= $len2; $i++) {
		        $v1[0] = $i;
		        $str2j = mb_substr($str2, $i - 1, 1);
		       
		        for ($j = 1; $j <= $len1; $j++) {
		            $cost = (mb_substr($str1, $j - 1, 1) == $str2j) ? 0 : 1;
		           
		            $m_min = $v0[$j] + 1;
		            $b = $v1[$j - 1] + 1;
		            $c = $v0[$j - 1] + $cost;
		           
		            if ($b < $m_min)
		                $m_min = $b;
		            if ($c < $m_min)
		                $m_min = $c;
		           
		            $v1[$j] = $m_min;
		        }
		       
		        $vTmp = $v0;
		        $v0 = $v1;
		        $v1 = $vTmp;
		    }
		   
		    return isset($v0[$len1]) ? $v0[$len1] : true;
		}
		
		


		public static function soundsLike($original, $string, $acceptablePer){
			$strlen = (strlen($original) > strlen($string) ? strlen($original) : strlen($string));
			$acceptable = round($strlen*$acceptablePer);
			$levenshtein = SERVER::levenshtein($original, $string);
			return ($levenshtein <= $acceptable ? true : false);
		}


		public static function array_key_filter($array, $keys){
			return array_intersect_key($array, array_flip($keys));
		}



		public static function array_intersect_subkeys($array, $keys){
				$keys = array_values($keys);
				$keyCount = count($keys);
			if(!empty($array) && !empty($keys)){
				if($keyCount == 1){
					return isset($array[($keys[0])]) ? $array[($keys[0])] : null;
				} elseif($keyCount == 2){
					return isset($array[($keys[0])]) && isset($array[($keys[1])]) ? array_intersect_key($array[($keys[0])], $array[($keys[1])]) : null;
				} elseif($keyCount > 2){
					foreach($keys as $k => $key){
						if(!isset($array[$key])){ 
							unset($keys[$k]);
						}
					}
					
					eval("\$result = array_intersect_key(\$array['".implode("'], \$array['", $keys)."']);");
					return !empty($result) ? $result : null;
				}
			}
		}


/*
dat % 10 < 4 && floor(day/10) != 1

*/



	
		public static function columnSounds($array, $field, $value, $substitutions=array(), $acceptance=0.35){		
			foreach((array)$array as $key => $row){
				if(isset($row[$field]) && is_string($row[$field])){
					if(empty($substitutions)){
						$original = $row[$field];
						$string = $value;
					} else {
						$original = strval(str_replace(array_keys($substitutions), $substitutions, $row[$field]));
						$string = strval(str_replace(array_keys($substitutions), $substitutions, $value));
					}
					
					$strlen = (strlen($original) < strlen($string) ? strlen($original) : strlen($string));
					$acceptable = round($strlen*$acceptance);
					$levenshtein = SERVER::levenshtein($original, $string);
					
					if($levenshtein <= $acceptable){
						$list[$levenshtein][$key] = $key;
					}
				}
			}
			
			if(!empty($list)){
				ksort($list);
				self::loopedFlatten($list, 2, $flattened);
				return array_combine($flattened, $flattened);
			}
		}
		
		
		
		
		
		public static function ArrayDepth($array) {
			return self::array_depth($array);
		}
	
	
	
	
		public static function array_depth($array) {
		    $max_depth = 1;
		
		    foreach ($array as $value) {
		        if (is_array($value)) {
		            $depth = self::array_depth($value) + 1;
		
		            if ($depth > $max_depth) {
		                $max_depth = $depth;
		            }
		        }
		    }
		
		    return $max_depth;
		}
	
	
	
	
		public static function lastKey($array){
			$keys = array_keys((array)$array);
			return end($keys);
		}
		
		
		
	
		
		
		public static function multiSoundIntersect(&$array1, &$array2, $compare=array(), $substitutions, $acceptance=0.35){
			if(!empty($array1) && !empty($array2) && !empty($compare)){
				foreach((array)$array1 as $key => $row){
					foreach($compare as $field1 => $field2){
						if(isset($row[$field1])){
							$return[$key][$field1] = self::columnSounds($array2, $field2, $row[$field1], $substitutions, $acceptance);
						}
					}
					
					if(!empty($return[$key])){
						$array_keys = array_keys($return[$key]);
						$result[$key] = self::array_intersect_subkeys($return[$key], $array_keys);
					}
				}
				
				if(!empty($result)){
					$result = array_filter($result);
					return !empty($result) ? $result : null;
				}
			}
		}




		public static function StripAccents($string){
			return str_replace( array('à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ', 'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã','Ä', 'Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü', 'Ý'), array('a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O', 'U','U','U','U', 'Y'), $string);
		} 



		public static function firstRow2Keys(&$table){
			if(count($table) >= 2){
				$keys = array_shift($table);
				if(!empty($table)){
					foreach((array)$table as $y => $row){
						$i=0;
						if(!empty($row)){
							foreach((array)$row as $key => $contents){
								$return[$y][($keys[$i])] = $contents;
								$i++;
								if(!isset($keys[$i])) $i=0;
							}
						}
					}
				}
			}
			
			
			if(!empty($return)){
				$table = $return;
			}
			
		}





		
		public static function tagJoin($array, $glue='|'){
			return $glue.implode($glue, $array).$glue;
		}
		
		
		
		
		public static function roundTo($number, $inc=1){
			return round($number / $inc) * $inc;
		}
		
		
		


		public function numPlace($num){
			$ext = array
				(
					1 => 'st',
					2 => 'nd',
					3 => 'rd',
				);
			$LastNum = substr($num, -1);
			if( ($num < 10 || $num > 20) && in_array($LastNum, array_keys($ext)) ){
				return $num.$ext[$LastNum];
			} else {
				return $num.'th';
			}
		}


	
		
		public static function numRange($n1=1, $n2=10, $mirror=false){
			$array = array();
			if($n1 <= $n2){
				for($i=$n1; $i <= $n2; $i++){
					if($mirror){
						$array[$i] = $i;
					} else {
						$array[] = $i;
					}
				}
			} else {
				for($i=$n1; $i >= $n2; $i--){
					if($mirror){
						$array[$i] = $i;
					} else {
						$array[] = $i;
					}
				}
			}
			return $array;
		}
		
		
		public static function getHashTags($string, $tag='#'){
			preg_match_all("/($tag\w+)/", $string, $matches);
			
			if(!empty($matches)){
				$matches = $matches[0];
			}
			
			return $matches;
		}
		
		
		
		public static function loadFile($sFilename, $sCharset = 'UTF-8'){
		    if (floatval(phpversion()) >= 4.3) {
		        $sData = file_get_contents($sFilename);
		    } else {
		        if (!file_exists($sFilename)) return -3;
		        $rHandle = fopen($sFilename, 'r');
		        if (!$rHandle) return -2;
		
		        $sData = '';
		        while(!feof($rHandle))
		            $sData .= fread($rHandle, filesize($sFilename));
		        fclose($rHandle);
		    }
		 //   if ($sEncoding = mb_detect_encoding($sData, 'auto', true) != $sCharset)
		//        $sData = mb_convert_encoding($sData, $sCharset, $sEncoding);
		    return $sData;
		}		

		
		public static function age($year=0, $month=0, $weak=0, $day=0, $round=1){
			return round((($year*365.25)+($month*30)+($weak*7)+$day)/365.25, $round);
		}




		public static function array_nth_value($array, $nth=2){
			//flagg complete someday
		}




		/*
			@param coins array( name => coinValue )
		*/
		public static function findChange($pennies, $coins){
			if(!empty($coins)){
				foreach($coins as $key => $coinValue){
					if($coinValue > 0){
						$coinCount = floor($pennies/$coinValue);
				    	if($coinCount > 0){
				    		$change[$key] = $coinCount;
				    		$pennies %= $coinValue;
				    	}
				    }
				}
			}
			return !empty($change) ? $change : null;	
		}




		public static function extractStr($string, $start, $end){
			$str_two = substr(substr($string, stripos($string, $start)), strlen($start));
			$second_pos = stripos($str_two, $end);
			$str_three = substr($str_two, 0, $second_pos);
			$unit = trim($str_three); // remove whitespaces
			return $unit;
		}

		public static function odd($var){
		    // returns whether the input integer is odd
		    return($var & 1);
		}
		
		
		public static function even($var){
		    // returns whether the input integer is even
		    return(!($var & 1));
		}



	}
}



















class rowize {
 	private $i=0;
 	private $cols = 1;
	public $isRowEnd = false;
	public $isRowStart = true;
	public $col = 0;
	public $row = 1;
	public $count = 0;
	public $isLast = false;
	
 	public function __construct($cols, $i=0){
 		$this->cols = $cols;
 	}
 	
 	public function source(&$array){
 		$this->count = count($array);
 	}
 	
 	public function count($count){
 		$this->count = $count;
 	}
	
 	public function tick(){
 		$this->i++;
 		$this->col++;

		$this->isRowStart = false;
    	$this->isRowEnd = false;
 		
 		
 		if($this->col == $this->cols){
 			$this->isRowEnd = true;
 		} elseif($this->col > $this->cols){
 			$this->col = 1;
 			$this->isRowStart = true;
 			$this->row++;
 		}
 	
 		if($this->count == $this->i){
 			$this->isLast = true;
 			$this->isRowEnd = true;
 		}
 	}

 	
}

 function int($string){
 	return preg_replace("/[^0-9]/","", $string); 
 }


function p($info){
	return SERVER::PrepForStorage($info);
}
?>