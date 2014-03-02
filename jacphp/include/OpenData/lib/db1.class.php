<?php 
// THIS CLASS CANNOT HANDLE EMPTY PASSWORDS
/*
	MySQL Database Library
	
*/
class DB1{ 

	public 	$OpenConnection;
	protected 	$EnableDebug		= 	false;
	public 		$DBType				=	'mysql';
	protected	$debug_backtrace	=	true;
	private		$db_pointer;
	private 	$host, $username, $password, $database, $table = null;


	public function __construct($params=false)
	{
		if(!is_array($params))
		{
			$params = func_get_args();
			
			
			$paramLabels = array('host', 'username', 'password', 'database', 'type');
			
			for($i=0; $i<5; $i++)
				$params[($paramLabels[$i])] = (!empty($params[$i]) ? $params[$i] : false);		//params default to false if not present
			/*
			$params['host'] 	=	(!empty($params[0]) ? $params[0] : false);
			$params['username']	=	(!empty($params[1]) ? $params[1] : false);
			$params['password']	=	(!empty($params[2]) ? $params[2] : false);
			$params['database']	=	(!empty($params[3]) ? $params[3] : false);
			$params['type']		=	(!empty($params[4]) ? $params[4] : false);
			*/
		}	
		
		$this->host		=	$params['host'];
		$this->username	=	$params['username'];
		$this->password	=	$params['password'];
		$this->database	=	$params['database'];
		$this->DBType	=	(	!empty($params['type'])		?	$params['type']		:	$this->DBType	);
		
		$this->OpenConnection();
	}
	
	
	public function __get($name)
    {
        $this->table = $name;
        return $this;
    }

	
	public function __wakeup()
    {
		$this->OpenConnection();
    }
	
	
	public function __destruct()
	{
		$this->CloseConnection();
	}







	public  function OpenConnection(&$debug=false)
	{		
		$debug = ( $debug && $this->debug_backtrace ? $debug : debug_backtrace() );

		if($this->DBType == 'mysql')		
			return $this->OpenMySQLConnection($debug);
	}
	


	public  function CloseConnection($params=array(), &$debug=false)
	{		
		$debug = ( $debug && $this->debug_backtrace ? $debug : debug_backtrace() );

		if($this->DBType == 'mysql')			
			return $this->CloseMySQLConnection($debug);
    	
	}
	
	

	public function Insert($insertItems){
		if(!empty($this->table)){
			$this->InsertRow(array(
				'table'	=>	$this->table,
				'insert_items'	=>	$insertItems,
			));
			$this->table = null;
		} else
			$this->InsertRow($insertItems);
	}

	public  function FetchAll(&$debug=false)
	{
		$debug = ( $debug && $this->debug_backtrace ? $debug : debug_backtrace() );

		if($this->DBType == 'mysql')			
			$return = $this->MySQLFetchRow($this->table, $debug);
			$this->table = null;
			return $return;
	}


	public  function CountRow($params=array(), &$debug=false)
	{
		$debug = ( $debug && $this->debug_backtrace ? $debug : debug_backtrace() );

		if($this->DBType == 'mysql')		
			return $this->MySQLCountRow($params, $debug);
		
	}



	public  function JoinFetchRow($params=array(), &$debug=false)
	{
		$debug = ( $debug && $this->debug_backtrace ? $debug : debug_backtrace() );

		if($this->DBType == 'mysql')			
			return $this->MySQLJoinFetchRow($params, $debug);
		
	}




	public  function FetchRow($params=array(), &$debug=false)
	{
		$debug = ( $debug && $this->debug_backtrace ? $debug : debug_backtrace() );

		if($this->DBType == 'mysql')			
			return $this->MySQLFetchRow($params, $debug);
	}




	public  function InsertRow($params=array(), &$debug=false)
	{
		$debug = ( $debug && $this->debug_backtrace ? $debug : debug_backtrace() );

		if($this->DBType == 'mysql')			
			return $this->MySQLInsertRow($params, $debug);
		
	}




	public  function UpdateRow($params=array(), &$debug=false)
	{
		$debug = ( $debug && $this->debug_backtrace ? $debug : debug_backtrace() );

		if($this->DBType == 'mysql')		
			return $this->MySQLUpdateRow($params, $debug);
		
	}		



	//if info is provided will creat/update, if data is not then delete any rows with same "where" 
	public function InsertUpdateOrDeleteRow($params=array(), $UniqueField=null, &$debug=false)
	{
	//flagg add
		$params['insert_items'] = !empty($params['insert_items']) ? $params['insert_items'] : $params['update_items'];
		$params['update_items'] = !empty($params['update_items']) ? $params['update_items'] : $params['insert_items'];
		
		if(!empty($params['update_items']) && !empty($params['insert_items']))
			$I_U = $this->InsertOrUpdateRow($params, $UniqueField, $debug);
		
		return (!empty($I_U) || !empty($D)) ? true : false;
	}






	public function Save($params=array(), $where_items=false, $UniqueField=null, &$debug=false)
	{		
		return $this->InsertOrUpdateRow(array(
			'insert_items' 	=> $params,
			'update_items' 	=> $params,
			'where_items'	=> $where_items,
		), $UniqueField, $debug);
	}

	




	//if info is provided will creat/update	
	public function InsertOrUpdateRow($params=array(), $UniqueField=null, &$debug=false)
	{
		$debug = ( $debug && $this->debug_backtrace ? $debug : debug_backtrace() );
		$params['limit'] = 1;

		if(!empty($this->table)){
			$params['table'] = $this->table;
			$this->table = null;
		}
		
		if(empty($params['table'])){
			print 'Forgot to Enter SQL Table';
			return false;
		}
		
		if(!empty($params['where_items'])){
			$COUNT = $this->CountRow($params, $debug);
			if($COUNT > 0){
				if(isset($params['update_items'])){			
					$Update = $this->UpdateRow($params, $debug);
					if($Update && !empty($params['return_id']) && !empty($UniqueField)){
					
						//use the uniquefield to determin which rows where affected.
						if(isset($params['where_items']))
							$FetchParams['where_items'] = $params['where_items'];
						elseif(isset($params['where_advanced']))
							$FetchParams['where_advanced'] = $params['where_advanced'];
						
						$FetchParams['table'] 			= $params['table'];
						$FetchParams['select_items'] 	= $UniqueField;
						$FetchParams['flat_result'] 	= true;
						
						$uniques = $this->FetchRow($FetchParams, $debug);
						if( count($uniques) == 1 )
							return reset($uniques);
						else
							return $uniques;
					} elseif($Update)
						return true;
				} else
					return false;
			} 
		}
		
		if(!empty($params['insert_items']))
		{
		    $insert = $this->InsertRow($params, $debug);
		    if($insert && !empty($params['return_id']))
		    	return $insert;
		    elseif($insert) 
		    	return true;
		}
	}








	public  function DeleteRow($params=array(), &$debug=false)
	{
		$debug = ( $debug && $this->debug_backtrace ? $debug : debug_backtrace() );

		if($this->DBType == 'mysql')			
			return $this->MySQLDeleteRow($params, $debug);
	}	










	public  function PrepForStorage( $data=false, $PrepForStorage_type='none' )
	{
		if(!function_exists('PrepForStorageDeep'))
		{       
		    function PrepForStorageDeep($value){
		        if( is_array($value) )
		    		$value = array_map('PrepForStorageDeep', $value);
		        else 
		        {
					$value	=	(	get_magic_quotes_gpc()	?	stripslashes($value)	:	$value	);
					$value 	= 	htmlentities($value);
					$value	=	str_replace('¨', '"', $value);
		    		$value	=	addslashes($value);
		    	}
		        return $value;
		    }
		}
        return PrepForStorageDeep($data);
	}






	public function PrepForRetrevial($value)
	{
		if(!function_exists('PrepForRetrevialDeep'))
		{       
			function PrepForRetrevialDeep($value)
			{
			    if( is_array($value) )
					$value = array_map('PrepForRetrevialDeep', $value);
			    else 
					$value = stripslashes(html_entity_decode($value));
					
			    return $value;
			}
		}
		return PrepForRetrevialDeep($value);
	}



//MYSQL==================================================================================================


	public function OpenMySQLConnection(&$debug=false)
	{		
		$debug		=	( $debug	?	$debug	: 	false  );
		$this->db_pointer = $this->database.'.';
		
		if($this->host && $this->database && $this->username && $this->password)
		{
		    $this->OpenConnection = mysql_connect($this->host, $this->username, $this->password, true) or die();
    	    if ($this->OpenConnection) { 
    	    	mysql_select_db($this->database, $this->OpenConnection);  
    	    	return true;
    	    } 
    	    else 
    	    {
		    	$this->MysqlFatalError(debug_backtrace());
    	    	return false;
    	    }
    	} 
    	else 
    	{
		    $this->MysqlFatalError(debug_backtrace());
    	    return false;    		
    	}
	}




	public function CloseMySQLConnection()
	{		
		if( gettype($this->OpenConnection) == "resource") {
    		mysql_close($this->OpenConnection);
		}
	}










	public function Tablecols($table, &$debug=false)
	{
		$table	=	$this->PrepForStorage($table);
		$debug 	= ( $debug && $this->debug_backtrace ? $debug : debug_backtrace() );
	    $cols 	= 	$this->MySQLFetch('SHOW COLUMNS FROM '.$table, $debug);
		return (!empty($cols) ? $cols : null);
	}



	public  function MySQLCountRow($params=array(), &$debug=false)
	{
		$where_string	=		(	isset($params['where_string'])	&&	!empty($params['where_string'])		?	$params['where_string']					:	false					);
		$from_string 	= 		(	isset($params['from_string'])	&&	!empty($params['from_string'])		? 	$params['from_string'] 				    : 	false					);
		$condition		=		(	isset($params['condition'])		&&	!empty($params['condition'])		?	strtoupper($params['condition'])	    :	'AND'					);
		$operator		=		(	isset($params['operator'])		&&	!empty($params['operator'])			?	strtoupper($params['operator'])		    :	'='						);

		$params			=			$this->PrepForStorage($params);

		$count_items	=		(	isset($params['count_items'])	&&	!empty($params['count_items'])						?	$params['count_items']	:	false					);
		$count_items	=		(	isset($params['count_items']) 	&& $count_items && 	is_array($params['count_items'])	?	$count_items			:	array($count_items)		);
		$count_items	=		(	!empty($count_items) 																	?	$count_items			:	false					);
		
		$limit			=		(	isset($params['limit'])			&&	!empty($params['limit'])				?	$params['limit']			:	false	);		
		$table 			= 		(	isset($params['table'])			&& !empty($params['table'])					? 	$params['table'] 			: 	false	);
		
		
		$where_items	= 		(	isset($params['where_items']) 	&&	!empty($params['where_items'])			? 	$params['where_items'] 		: 	true	);
		$execute		=		(	isset($params['execute']) 		&&	!$params['execute']						? 	false 						: 	true	);

		$debug 			= 		( 	$debug && $this->debug_backtrace ? $debug : debug_backtrace() );

		$print			=		(	is_array($params) && isset($params['print']) && $params['print'] == true	? 	true	: 	false	);
		$append_names	=		(	empty($params['append_names'])												?	false	:	true 	);

		$table_pointer	= 		(	$append_names ? $this->db_pointer.$table.'.' : '');


		if(!empty($where_items) || !empty($where_string) || !empty($from_string))
		{
			//SELECT
	    	if(isset($params['count_items']) && count($count_items) == 1)
	    	{
	    		$select_sql = 	$this->CompileMySQL(array(
	    			'wrapper'		=>	array('SELECT Count(', ')'),
	    			'items'			=>	$count_items,
	    			'value_only'	=>	true,
	    			'condition'		=>	',',
	    		));
	    	} 
	    	else 
	    		$select_sql = "SELECT Count(*)";
	
	    	//FROM
	    	if($from_string)
	    		$from_sql 	= 	$from_string;
	    	else
	    		$from_sql	=	"FROM ".$this->db_pointer."$table";
	    	
	    	
			//WHERE
			$this->where($where_sql, $where_items, $condition, $operator,  $where_string, $where_advanced, $table_pointer);


	    	if($limit)
	    	    $limit_sql = "LIMIT $limit";
	    	else
	    	    $limit_sql = false;			
	    	

	
	    	//EXECUTE									
	    	$query = "$select_sql $from_sql $where_sql $limit_sql";

	    	if($print)
	    		print $query;
	    	

	    	if($execute){
	    		$count = $this->MySQLFetch($query, $debug);
	    		if(isset($count[0])){
	    			if( count($count[0]) == 1)
	    				foreach($count[0] as $value){
	    					return $value;
	    				}
	    			else
	    				return $count;
	    			
	    		}
	    	} else
	    		return $query;
		}
	}
	
	
	
	
	



	public  function MySQLFetchRow($params, &$debug=false){
		if(is_string($params))
			$params = array('table' => $params);
		
																																		
		$query			=		(	!empty($params['query'])								?	$params['query']						:	false	);
		$query			=		(	isset($params) && !is_array($params)					?	$params									:	$query	);
		$order_by		=		(	!empty($params['order_by'])								?	$params['order_by']						:	false	);
		$order			=		(	!empty($params['order'])								?	$params['order']						:	false	);
		$by				=		(	!empty($params['by'])									?	$params['by']							:	false	);
								 																										
		$where_string	=		(	!empty($params['where_string'])							?	$params['where_string']					:	false	);
		$from_string 	= 		(	!empty($params['from_string'])							? 	$params['from_string'] 					: 	false	);
		$where_advanced	=		(	!empty($params['where_advanced'])						?	$params['where_advanced']				:	false	);
		$condition		=		(	!empty($params['condition'])							?	strtoupper($params['condition'])		:	'AND'	);
		$operator		=		(	!empty($params['operator'])								?	strtoupper($params['operator'])			:	'='	 	);
																																		
		$params			=			$this->PrepForStorage($params);																														
																																		
		$append_names	=		(	empty($params['append_names'])							?	false									:	true	);
		$row_key		=		(	!empty($params['row_key'])		&&	is_array($params)	?	$params['row_key']						:	false	);
		$row_value		=		(	!empty($params['row_value'])	&&	is_array($params)	?	$params['row_value']					:	false	);


		$flat_result	=		(	!empty($params['flat_result'])	&&	is_array($params)	|| 	$row_value	?	true					:	false				);
		$mirror			=		(	!empty($params['mirror'])		&&	is_array($params)					?	true					:	false				);
		$table 			= 		(	!empty($params['table'])		 										? 	$params['table'] 		: 	$from_string		);
		$select_items	=		(	!empty($params['select_items'])											?	$params['select_items']	:	false				);
		$select_items	=		(	isset($params['select_items'])	&&	is_array($params['select_items'])	?	$select_items			:	array($select_items));						
		$select_items	=		(	!empty($params['select_items'])											?	$select_items			:	array('*')			);
		
		$where_items	=		(	!empty($params['where_items'])	?	$params['where_items']	:	false	);
		$random			=		(	!empty($params['random'])		?	true					:	false	);
		$group_by		=		(	!empty($params['group_by'])		?	$params['group_by']		:	false	);
		$limit			=		(	!empty($params['limit'])		?	$params['limit']		:	false	);		
		$offset			=		(	!empty($params['offset'])		?	$params['offset']		:	false	);
		$extra_sql		=		(	!empty($params['extra_sql'])	?	$params['extra_sql']	:	false	);

		$execute		=		(	is_array($params) && isset($params['execute']) 	&&	!$params['execute']				? 	false 	: 	true);
		$print			=		(	is_array($params) && isset($params['print']) 	&&	$params['print']	== true		? 	true	: 	false);
		$debug 			= 		( 	$debug && $this->debug_backtrace ? $debug : debug_backtrace() );

		$table_pointer	= 		( $append_names ? $this->db_pointer.$table.'.' : '');
		$json 			= 		false;
			
			
		if($mirror && $row_key){
			$row_value = $row_key;
			$flat_result = true;
		}	
			
		if(!$query){

			$json		=		(	isset($params['json']) 			&&	!empty($params['json'])				?	$params['json']							:	false					);																				

			if($select_items && !empty($select_items)){
			    $select_sql = 	$this->CompileMySQL(array(
			    				'wrapper'		=>	array('SELECT'),
			    				'items'			=>	$select_items,
			    				'value_only'	=>	true,
			    				'condition'		=>	',',
			    				));
			} else { $select_sql = "SELECT * ";}		
			
			//FROM
	    	$this->from($from_sql, $from_string, $table);	
	    
			//WHERE
			$this->where($where_sql, $where_items, $condition, $operator,  $where_string, $where_advanced, $table_pointer);
			
			//ORDER		
			if($random){
			    $order_sql = "ORDER BY rand()";
			} elseif($order_by || $by || $order ){
			
				if($by){
					$accepted_ASC = array('up', 'increasing', 'increase', 'growing', 'ASC', '<', 'ascending');
					if(in_array(strtolower($order), $accepted_ASC)){
						$order = 'ASC';
					} else {
						$order = 'DESC';
					}
					$order_sql = "ORDER BY $by $order";
				
				}elseif($order_by){
			    	$order_sql = "ORDER BY $order_by";
			    }
			}else {
			    $order_sql = false;			
			} 

			//GROUP BY
			$group_by_sql = ($group_by ? "GROUP BY $group_by" : false);
			
			//LIMIT
			$limit_sql = ($limit ? "LIMIT $limit" : false);

			//OFFSET
			$offset_sql = ($offset ? "OFFSET $offset" : false);

			//QUERY					
			$query =  "$select_sql $from_sql $where_sql $extra_sql $group_by_sql $order_sql $limit_sql $offset_sql; ";
		} 

		//EXECUTE					
		if($query){	
			if($print){
				print $query;
			}
		
			if($execute){
	    		$array = $this->MySQLFetch($query, $debug, $row_key, $flat_result, $row_value, ($limit == 1 ? true : false));
	    		return (!empty($json) ? json_encode($array) : $array);
	    	} else {
	    		return $query;
	    	}
	    }
	}


















	public  function MySQLInsertRow($params=array(), &$debug=false){
		$query			=		(	isset($params['query'])			&&	!empty($params['query'])			?	$params['query']					:   false				);
		$where_string	=		(	isset($params['where_string'])	&&	!empty($params['where_string'])		?	strtoupper($params['where_string'])	:   false				);
																																											
		$params			=			$this->PrepForStorage($params);																							  						
		$table 			= 		(	isset($params['table'])	&& !empty($params['table'])					 	? 	$params['table'] 					:   false				);
		$items 			= 		(	isset($params['items']) 												? 	$params['items'] 					:   false				);
		$items 			= 		(	isset($params['insert_items']) 	&& !isset($params['items'])				? 	$params['insert_items'] 			:   false				);
		$execute		=		(	isset($params['execute']) 	&&	!$params['execute']						? 	false 								:	true				);
		$print			=		(	is_array($params) && isset($params['print']) 	&&	$params['print']	== true				? 	true				: 	false);
		$debug 			= 		( 	$debug && $this->debug_backtrace 										? 	$debug 								: 	debug_backtrace() 	);
		$return_id		=		(	isset($params['return_id'])	&&	$params['return_id']					?	$params['return_id']				:	false				);

		if(!$query && $items){
			if($this->DBType == 'mysql'){			
	    		$insert_sql = 	$this->CompileMySQL(array(
	    						'wrapper'		=>	array("INSERT INTO ".$this->db_pointer."$table (", ")"),
	    						'items'			=>	$items,
	    						'key_only'		=>	true,
	    						'condition'		=>	',',
	    						));
	    	
	    	
	    		$value_sql = 	$this->CompileMySQL(array(
	    						'wrapper'		=>	array("VALUES (" , ")"),
	    						'items'			=>	$items,
	    						'value_only'	=>	true,
	    						'item_wrapper'	=>	array("'","'"),
	    						'condition'		=>	',',
	    						));
	    		//QUERY	
	    		$query = "$insert_sql $value_sql; ";
	   		}
	    }
	    
		//EXECUTE					
		if($query){	
			if($print)
	    		print $query;
			if($execute){
	    		if( $this->Query($query, $debug)){
	    			if($return_id){
	    				return mysql_insert_id();
	    			} else {
	    				return true;
	    			}
	    		}
	    	} else {
	    		return $query;
	    	}
	    	
	    }
	}





	

	

	public  function MySQLUpdateRow($params=array(), &$debug=false){
		$where_string	=		(	isset($params['where_string'])	&&	!empty($params['where_string'])		?	strtoupper($params['where_string'])		:	false			);
		$from_string 	= 		(	isset($params['from_string'])	&& !empty($params['from_string'])		? 	$params['from_string'] 					: 	false			);
		$condition		=		(	isset($params['condition'])												?	strtoupper($params['condition'])		:	'AND'			);
		$operator		=		(	isset($params['operator'])												?	strtoupper($params['operator'])			:	'='				);
		$params			=			$this->PrepForStorage($params);
		$table 			= 		(	isset($params['table'])	&& !empty($params['table'])					 	? 	$params['table'] 						: 	false			);
		$items 			= 		(	isset($params['items']) 												? 	$params['items'] 						: 	false			);
		$items 			= 		(	isset($params['update_items']) 	&& !isset($params['items'])				? 	$params['update_items'] 				: 	false			);
		$where_items	= 		(	isset($params['where_items']) 											? 	$params['where_items'] 					: 	false			);
		$where_items	=		(	isset($params['where_item'])											?	$params['where_item']					:	$where_items	);
		
		
		$execute		=		(	isset($params['execute']) 		&&	!$params['execute']					? 	false 									:	true			);
		$print			=		(	is_array($params) && isset($params['print']) 	&&	$params['print']	== true				? 	true				: 	false);
		$debug 			= 		( 	$debug && $this->debug_backtrace ? $debug : debug_backtrace() );
		
		
		if(!empty($table) && !empty($items) && is_array($items)) {
		
    		if($table){
    			$params['table']			=	$table;
    		} elseif($from_string){
    			$params['from_string']		=	$from_string;
    		}
    		$params['condition']			=	$condition;
    		$params['operator']				=	$operator;
    		if($where_items){
    			$params['where_items']		=	$where_items;
    		} elseif($where_string){
    			$params['where_string']		=	$where_string;
    		}
    		
    		$update_sql 	= 	$this->CompileMySQL(array(
        		'wrapper'		=>	array("UPDATE ".$this->db_pointer."$table SET"),
        		'items'			=>	$items,
            	'item_wrapper'	=>	array("'","'"),
        		'condition'		=>	',',
        		'operator'		=>	'=',
        	));
	    	//WHERE
	    	$this->where($where_sql, $where_items, $condition, $operator,  $where_string, $where_advanced, $table_pointer);
        	
        
        	//QUERY	
        	$query = "$update_sql $where_sql; ";
        	//EXECUTE					
        	if($query){	
	    		if($print){
	    			print $query;
	    		}
	
        		if($execute){
        			return $this->Query($query, $debug);
        		} else {
        			return $query;
        		}
        	}
        
		}
	}







	public  function MySQLDeleteRow($params=array(), &$debug=false){
		$from_string 	= 		(	isset($params['from_string'])	&& !empty($params['from_string'])		? 	$params['from_string'] 					: 	false			);		
		$where_string	=		(	isset($params['where_string'])	&&	!empty($params['where_string'])		?	strtoupper($params['where_string'])		:	false			);
		$condition		=		(	isset($params['condition'])	 	&&	!empty($params['condition'])		?	strtoupper($params['condition'])		:	'AND'			);
		$operator		=		(	isset($params['operator'])	 	&&	!empty($params['operator'])			?	strtoupper($params['operator'])			:	'='				);
		$params			=		$this->PrepForStorage($params);

		$table 			= 		(	isset($params['table'])	&& !empty($params['table'])					 	? 	$params['table'] 						: 	false			);
		$where_items	= 		(	isset($params['where_items']) 	&&	!empty($params['where_items'])		? 	$params['where_items'] 					:	false			);
		$execute		=		(isset($params['execute']) 	&&	!$params['execute']							? 	false 									: true);
		$print			=		(	is_array($params) && isset($params['print']) 	&&	$params['print']	== true				? 	true				: 	false);
		$debug 			= 		( 	$debug && $this->debug_backtrace ? $debug : debug_backtrace() );

		if($this->DBType == 'mysql'){			
	
	    	$this->from($from_sql, $from_string, $table);			
			$this->where($where_sql, $where_items, $condition, $operator,  $where_string, $where_advanced, $table_pointer);
			
			//EXECUTE
			$query = "DELETE $from_sql $where_sql; ";		
			if($print){
	    		print $query;
	    	}

			if($execute){
	    		if( !empty($where_sql) ){
	    			return $this->Query($query, $debug);
	    		}
			} else {
				return $query;
			}
		} 
	}


















	public  function MySQLFetch($params=array(), &$debug=false, $row_key=false, $flat_result=false, $row_value=false, $limit=false){
		if(!empty($params)){
			$query			= 	(	isset($params['query']) 		? 	$params['query'] 			: 	false				);
			$query			=	(	!is_array($params)				?	$params						:	$query				);
			$FilterExtra 	= 	(	isset($params['filter_extra']) 	? 	$params['filter_extra'] 	: 	false				);
			$debug 			= 	( 	$debug && $this->debug_backtrace ? $debug : debug_backtrace() );

			if(!is_array($query) && !empty($query)) {
				$sql_result = $this->query($query, $debug);
				if($sql_result){
					$sql_rowCheck = mysql_num_rows($sql_result); 
					if($sql_rowCheck != false) { 
						while($sql_row = mysql_fetch_array($sql_result)) {
							
							
							//prevent numberic indexes from mysql
							if(!empty($sql_row) && is_array($sql_row)){
								$newList = array();
								foreach($sql_row as $k => $v){
									if(!is_numeric($k)){
										$newList[$k] = $v;
									}
								}
								$sql_row = $newList;
							}
						
						
							//FILTER EXTRA
							if($FilterExtra){	
								foreach (array_keys($sql_row) as $key => $value){
									if ( !is_numeric($value) ){
										$subresult[$value] = $sql_row[$value];
									}
								}
								if(!empty($row_key) && isset($subresult[$row_key]) )
									$result[($subresult[$row_key])] = $subresult;
								 else 
									$result[] = $subresult;
								
							} else {
								if(!empty($row_key) && isset($sql_row[$row_key]) )
									$result[($sql_row[$row_key])] = $sql_row;
								else 
									$result[] = $sql_row;
								
							}
							
							//FLAT RESULT
							if(!empty($flat_result) && !empty($result)){
								if(!empty($row_value)){
									foreach($result as $key => $array){
										if(empty($temp_result[$key])){
											$temp_result[$key] = (is_array($array) ? $array[$row_value] : false);
										}
									}
								} elseif($limit == 1){
									foreach($result as $key => $array){
										if(empty($temp_result[$key])){
											foreach($array as $subkey => $value){
												$temp_result[$subkey] = $value;
											}											
										}
									}
								}else {
									foreach($result as $key => $array){
										if(empty($temp_result[$key])){
											$temp_result[$key] = (is_array($array) ? reset($array) : false);
										}
									}
								}
								$result = $temp_result;
							}
						}
						$result = ( isset($result) ? $result : array() );
						return $this->PrepForRetrevial($result);	//IMPORTANT
					} 
				}
			} 
		}
	}




	public  function Query($params=array(), &$debug=false){
		$query			=	(	!is_array($params)					?	mysql_query($params, $this->OpenConnection)	:	false				);
		$debug 			= 	( 	$debug && $this->debug_backtrace 	? 	$debug 					: 	debug_backtrace() 	);
		
		if($this->DBType == 'mysql'){			
			if($query)	{	
				return $query;								
			} else{	
				//failed query callback
				$this->MysqlFatalError($debug, $params);
			}
		}
	}




	public  function MysqlFatalError($debug=false, $string=false){
		if( $debug && is_array($debug) && !empty($debug) ){
			print '<h1>MySQL Fatal Error:</h1>'; 
			print '<b>In File:</b> '.$debug[0]['file'].'<br/>';
			print '<b>Around Line:</b> '.$debug[0]['line'].'<br/>';
			print '<b>Function:</b> '.$debug[0]['function'].'<br/>';
			print '<b>Belongs to Class:</b> '.$debug[0]['class'].'<br/>';
			print '<b>SQL String:</b> '.$string.'<br/>';
			if($this->EnableDebug){
				print '<br/><pre>';
				print_r($debug)."\n";
				print '</pre><br/>';
			}
			print '<b>Official Error:</b> '.mysql_error();
			exit();	
		}
	}











	public  function CompileMySQL($params=array()){
		$append				=		(	isset($params['append']) 		&& 	!empty($params['items'])		? 	$params['append'] 	: 	false	);
		$append				=		(	$append 		&& 	!is_array($append)								? 	$append 			: 	false	);	
		$append_cond		=		(	isset($params['append_cond']) && $params['append_cond'] == true		?	true				:	false	);

		$wrapper			=		(	isset($params['wrapper'])	 	&& 	!empty($params['wrapper'])		?	$params['wrapper']	:	false			);
		$wrapper_start		=		(	$wrapper 		&& is_array($wrapper)		&& isset($wrapper[0])	?	$wrapper[0]			:	false			);
		$wrapper_start		=		(	!$wrapper_start	&& !is_array($wrapper)								?	$wrapper			:	$wrapper_start	);
		$wrapper_end		=		(	$wrapper 		&& is_array($wrapper)		&& isset($wrapper[1])	?	$wrapper[1]			:	false			);


		$item_wrapper		=		(	isset($params['item_wrapper'])	&& 	!empty($params['item_wrapper'])		?	$params['item_wrapper']	:	false				);
		$item_wrapper_start	=		(	$item_wrapper 	&& is_array($item_wrapper)	&& isset($item_wrapper[0])	?	$item_wrapper[0]		:	false				);
		$item_wrapper_start	=		(	!$item_wrapper_start 			&& !is_array($item_wrapper)				?	$item_wrapper			:	$item_wrapper_start	);
		$item_wrapper_end	=		(	$item_wrapper 	&& is_array($item_wrapper)	&& isset($item_wrapper[1])	?	$item_wrapper[1]		:	false				);
		$sql = '';
		$condition			=		(	isset($params['condition'])	 	&& 	!empty($params['condition'])	?	strtoupper($params['condition'])    :	false	);
		$operator			=		(	isset($params['operator'])	 	&& 	!empty($params['operator'])		?	strtoupper($params['operator'])	    :	false	);


		$params				=			$this->PrepForStorage($params);
		$items				=		(	isset($params['items']) 		&& 	!empty($params['items'])		?	$params['items']		:	false	);
		$key_only			=		(	isset($params['key_only']) 		&& 	!empty($params['key_only'])		?	$params['key_only']		:	false	);
		$value_only			=		(	isset($params['value_only']) 	&& 	!empty($params['value_only'])	?	$params['value_only']	:	false	);
		$table 				= 		(	isset($params['table'])	&& !empty($params['table'])					? 	$params['table'] 		: 	false	);


			if( !empty($items) ){
				
				//sort into arrays and strings
				foreach((array)$items as $field => $message){ 
					if(is_array($message) && count($message) > 1){
						$array[$field] = $message;
					} elseif(is_array($message) && count($message) == 1){
						$strings[$field] = reset($message);
					} elseif(is_string($message)){
						$strings[$field] = $message;
					}
		    	}
		    	
		    	//Compile strings
				$i=1;
		    	if(isset($strings) && !empty($strings)){
					foreach($strings as $field => $message){					
						$not = (bool)substr_count($field, '!') ? '!' : '';
						$field = str_replace('!', '', $field);
						
						$value = $message;
						$I=1;
			    			if($key_only){
			    				$sql 	.= 	$item_wrapper_start.$table.$field.$item_wrapper_end.' '.$not.$operator;
			    			} elseif($value_only){
			    				$sql 	.= 	$item_wrapper_start.$table.$value.$item_wrapper_end.' '.$not.$operator;
			    			} else{	
			    				if(is_numeric($field)){	$field = '1';}
			    				$sql 	.= 	$table.$field.' '.$not.$operator.' '.$item_wrapper_start.$value.$item_wrapper_end;
							}
			    			
			    			if( $i != count($strings) || $I != count($message)){
			    				$sql 	.= 	" $condition ";
			    			}
			    			$I++;
			    		$i++;
		    		}
		    	}
		    


		    	//Compile arrays		    	
		    	if(isset($array) && !empty($array) && is_array($array)){
					$source = array($sql);
					foreach($array as $field => $arr){
						$not = (bool)substr_count($field, '!') ? 'NOT' : '';
					    $field = str_replace('!', '', $field);

					    $arr		=	join("$item_wrapper_end, $item_wrapper_start",$arr);
					    $temp 		=	"$field $not IN (".$item_wrapper_start.(string)$arr.$item_wrapper_end.")";
					    $temp		.=	(!empty($sql) || $append_cond ? " $condition $sql" : false);	
					}
					$sql = "$temp";
		    	}

	    	
				$sql = "$wrapper_start $sql $wrapper_end $append";
			}
			return $sql;
	}









	public function whereCompiler(&$string, $array, $table_pointer='table', $advanced=null, $DEF_con='AND', $DEF_op='=', $DEF_ow="'", $DEF_cw="'"){
	
		$_['associative'] = (array_keys($array) !== range(0, count($array)-1));
		$_['depth'] = SERVER::array_depth($array);
		$_['count'] = count($array);
		$i=0;
		
		if($_['associative'] && $_['depth'] >= 2){
			foreach($array as $column => $item){
				$cleaned[$i] = array(
					'column' => $column,
					'operation' => $DEF_op,
					'open_wrap' => $DEF_ow,
					'value' => $item,
					'close_wrap' => $DEF_cw,
					'condition' => $i < $_['count']-1 ? $DEF_con : null,
				);
				$i++;
			}
		
		} else {
		
			foreach($array as $k => $value){
			    $mark=0;
				$column = (!empty($value[$mark]) ? $value[$mark] : false ); $mark++;
				
				
				if(isset($value[$mark]) && (is_array($value[$mark]) || strlen($value[$mark]) > 2)){
				    $oper = "=";
				} else {
				    $oper = (!empty($value[$mark]) ? $value[$mark] : $DEF_op ); $mark++;
				}
				
				
				if(isset($value[$mark]) && (is_array($value[$mark]) || strlen($value[$mark]) > 2)){
				    $start_wrap = "'"; 
				} else {
				    $start_wrap = (!empty($value[$mark]) ? $value[$mark] : $DEF_ow ); $mark++;
				}
				
				$item = (!empty($value[$mark]) ? $value[$mark] : "1" ); $mark++;
				
				if(isset($value[$mark]) && (is_array($value[$mark]) || strtolower($value[$mark]) == 'or' || strlen($value[$mark]) > 2)){
				    $end_wrap = "'";
				} else {
				    $end_wrap = (!empty($value[$mark]) ? $value[$mark]	:	$DEF_cw		); $mark++;
				}
				
				
				$cond = (!empty($value[$mark]) ? $value[$mark] : $DEF_con);
				
				
				if(!is_array($item) && trim(strtoupper($oper)) == 'LIKE' && (bool)strpos($start_wrap.$end_wrap, '%')){
				    $item = str_replace(array('saint', 'st', "'", '`', '.', ',', ' ', '-', '�', ''), '%', strtolower($item));
				}
				
				
			    	
		
				$cleaned[$i] = array(
					'column' => $column,
					'operation' => $oper,
					'open_wrap' => $start_wrap,
					'value' => $item,
					'close_wrap' => $end_wrap,
					'condition' => $i < $_['count']-1 ? $cond : null,
				);
		
				$i++;
			}		
		}
		
		
		$_['cleaned'] = $cleaned;
		$string = $_;

	
	}
















	private function where(&$where_sql, &$where_items=array(), $condition, $operator, &$where_string=null, &$where_advanced=null, &$table_pointer=null){
			if(!empty($where_advanced)){
				$where_sql = 'WHERE ';
				$r = 1;
				$a_keys = array_keys($where_advanced);
				$last = end($a_keys);
			    foreach($where_advanced as $k => $value){
			    	$i=0;
			    
			    	$colum = (!empty($value[$i]) ? $value[$i] : false ); $i++;

					
			    	if(isset($value[$i]) && (is_array($value[$i]) || strlen($value[$i]) > 2)){
			    		$oper = "=";
			    	} else {
			    		$oper = (!empty($value[$i]) ? $value[$i] : '=' ); 
			    		$i++;
			    	}

			    
			    	if(isset($value[$i]) && (is_array($value[$i]) || strlen($value[$i]) > 2)){
			    		$start_wrap = "'"; 
			    	} else {
			    		$start_wrap = (!empty($value[$i]) ? $value[$i] : "'" ); 
			    		$i++;
			    	}
			    	
			    	$item = (!empty($value[$i]) ? $this->PrepForStorage($value[$i]) : "1" ); 
			    	$item = is_array($item) && count($item) == 1 ? reset($item) : $item;
			    	
			    	//correct operator if array only contains one item
			    	if(!empty($item) && (!is_array($item) || count($item) == 1) && strtoupper($oper) == 'IN'){
			    		$oper = '=';
			    	}
			    	$i++;
			    
			    	if(isset($value[$i]) && (is_array($value[$i]) || strtolower($value[$i]) == 'or' || strlen($value[$i]) > 2)){
			    		$end_wrap = "'";
			    	} else {
			    		$end_wrap = (!empty($value[$i]) ? $value[$i]	:	"'"		); 
			    		$i++;
			    	}
			    	
			    	
			    	
			    	$cond = ( $last == $k ? '' : (!empty($value[$i]) ? $value[$i] : 'AND'));
			    	
			    	
			    
			    
			    
			    	if(!is_array($item) && trim(strtoupper($oper)) == 'LIKE' && (bool)strpos($start_wrap.$end_wrap, '%')){
			    		$item = str_replace(array('saint', 'st', "'", '`', '.', ',', ' ', '-', '�', ''), '%', strtolower($item));
			    	}
			    	
			    	
			    	
			    	$sql = array(
			    		'items'			=>	array($colum => $item),
		        		'item_wrapper'	=>	array($start_wrap, $end_wrap),
		        		'append_cond'	=>	!($last == $k),
			    		'operator'		=>	$oper,
						'table'			=>	$table_pointer,
			    	);

			    	
			    	$where_sql 	.= 	$this->CompileMySQL($sql);
			    	if($r != count($where_advanced)){
			    		$where_sql .= " $cond ";
			    	}
			    	
			    	$r++;
			    }
			    $where_sql	=	($where_sql != 'WHERE ' ?	$where_sql	:	"WHERE 1=0");
			} elseif( $where_items && !$where_string){
				if(is_array($where_items)){
					
					foreach($where_items as $key => $value){
						if(is_array($value) && count($value) == 1)
							$where_items[$key] = reset($value);
					}
					//FLAGG redesign
					
					
					$sql = array(
						'wrapper'		=>	array('WHERE'),
						'items'			=>	$where_items,
						'item_wrapper'	=>	array("'","'"),
						'condition'		=>	$condition,
						'operator'		=>	$operator,
						'table'			=>	$table_pointer,
					);
					
					$where_sql 	= 	$this->CompileMySQL($sql);
					$where_sql	=	(!empty($where_sql) ?	$where_sql	:	"WHERE 1=0");
				} else if(is_string($where_items)){
				    $where_sql = "WHERE 1='1'";
				}
			} elseif($where_string) { 
				$where_sql = "$where_string";
			} else {
				$where_sql = "WHERE 1='1'";
			}
			
	}




	private function from(&$from_sql, &$from_string, &$table){
		if($table){
	    	$from_sql	=	"FROM ".$this->db_pointer."$table ";
	    } elseif($from_string){
	    	$from_sql	=	$from_string;
	    } else {
	    	$from_sql	=	'';	    		
	    }
	}
	





	
	public  function MySQLJoinFetchRow($params, &$debug=false){
		$query			=		(	isset($params['query'])			&&	!empty($params['query'])		?	$params['query']				:	false	);
		$query			=		(	isset($params)					&&	!is_array($params)				?	$params							:	$query	);
		$order_by		=		(	isset($params['order_by'])		&&	!empty($params['order_by'])		?	$params['order_by']				:	false	);
		$condition		=		(	isset($params['condition'])		&&	!empty($params['condition'])	?	strtoupper($params['condition']):	'AND'	);
		$operator		=		(	isset($params['operator'])		&&	!empty($params['operator'])		?	strtoupper($params['operator'])	:	'='		);
		$order			=		(	isset($params['order'])			&&	!empty($params['order'])		?	$params['order']				:	false	);
		$by				=		(	isset($params['by'])			&&	!empty($params['by'])			?	$params['by']					:	false	);
		$params			=			$this->PrepForStorage($params);										    								    										
		$join_type		=		(	isset($params['join_type'])		&&	$params['join_type']			?	$params['join_type']			:	'left'	);


		$left_table['select_items']		=	SERVER::isthere($params['left_table']['select_items']);
		$left_table['join']				=	SERVER::isthere($params['left_table']['join']);
		$left_table['table']			=	SERVER::isthere($params['left_table']['table']);
		$left_table['where_items']		=	SERVER::isthere($params['left_table']['where_items']);
		$right_table['select_items']	=	SERVER::isthere($params['right_table']['select_items']);
		$right_table['join']			=	SERVER::isthere($params['right_table']['join']);
		$right_table['table']			=	SERVER::isthere($params['right_table']['table']);
		$right_table['where_items']		=	SERVER::isthere($params['right_table']['where_items']);
	
		$row_key		=		(	isset($params['row_key'])		&&	$params['row_key']			?	$params['row_key']	:	false);
		$random			=		(	isset($params['random'])		&&	!empty($params['random'])	?	true				:	false);
		$group_by		=		(	isset($params['group_by'])		&&	!empty($params['group_by'])	?	$params['group_by']	:	false);
		$limit			=		(	isset($params['limit'])			&&	!empty($params['limit'])	?	$params['limit']	:	false);		
		$offset			=		(	isset($params['offset'])		&&	!empty($params['offset'])	?	$params['offset']	:	false);
		
		$execute		=		(	is_array($params) && isset($params['execute']) 	&&	!$params['execute']			? 	false : true	);
		$print			=		(	is_array($params) && isset($params['print']) 	&&	$params['print']	== true	? 	true  : false	);
		
		$debug 			= 		( 	$debug && $this->debug_backtrace ? $debug : debug_backtrace() );


		if(!$query){
			if(!empty($left_table['select_items'])){

				if($left_table['select_items'] && !empty($left_table['select_items']) && is_array($left_table['select_items']) && reset($left_table['select_items']) != '*'){
				    $select_sql['left'] = 	$this->CompileMySQL(array(
				    'items'			=>	$left_table['select_items'],
				    'value_only'	=>	true,
				    'condition'		=>	',',
					'table'			=>	$this->db_pointer.$left_table['table'].'.',
				    	));
				    $select_sql['left'] = trim($select_sql['left']);
				} elseif( $left_table['select_items'] == '*' || reset($left_table['select_items']) == '*' ){
					$select_sql['left'] = 	'*';
				} 
				else{
					$select_sql['left'] = 	'';
				}
			}
			
			if(!isset($select_sql['left']) || empty($select_sql['left'])){
				$select_sql['left'] = 	'';
			}
			
			

			if(!empty($right_table['select_items'])){
				if($right_table['select_items'] && !empty($right_table['select_items']) && is_array($right_table['select_items']) && reset($right_table['select_items']) != '*'){
				    $select_sql['right'] = 	$this->CompileMySQL(array(
						'items'			=>	$right_table['select_items'],
			    		'value_only'	=>	true,
			    		'condition'		=>	',',
			    		'table'			=>	$this->db_pointer.$right_table['table'].'.',
			    	));
				    $select_sql['right'] = trim($select_sql['right']);
				} elseif( $right_table['select_items'] == '*' || reset($right_table['select_items']) == '*' ){
					$select_sql['right'] = 	'*';
				} 
			}
			
			if(!isset($select_sql['right']) || empty($select_sql['right'])){
				$select_sql['right'] = 	'';
			}

			if($select_sql['left'] == '*' || $select_sql['right'] == '*'){
				$select_sql = '*';
			} else{
				if(!empty($select_sql['left']) && !empty($select_sql['right'])){
					$select_sql = implode(', ', $select_sql);
				} else {
					$select_sql = implode('', $select_sql);				
				}		
			}
			$select_sql = "SELECT $select_sql";
			
			$from_sql = 'FROM '.$this->db_pointer.$left_table['table'].' '.strtoupper($join_type).' JOIN '.$this->db_pointer.$right_table['table'];
			
			$on_sql	=	'ON '.$this->db_pointer.$left_table['table'].'.'.$left_table['join'].' = '.$this->db_pointer.$right_table['table'].'.'.$right_table['join'];
		
			
			//WHERE
			
			if($left_table['where_items'] === 1 || $right_table['where_items'] === 1 || $left_table['where_items'] === '1' || $right_table['where_items'] === '1' ){
				$where_sql = "1 = '1'";
			} else {
				if($left_table['where_items'] && !empty($left_table['where_items']) && is_array($left_table['where_items'])){
				    $where_sql['left'] =  	$this->CompileMySQL(array(
				    	'items'			=>	$left_table['where_items'],
		    	    	'item_wrapper'	=>	array("'","'"),
				    	'condition'		=>	$condition,
				    	'operator'		=>	$operator,
						'table'			=>	$this->db_pointer.$left_table['table'].'.',
				    ));
				    $where_sql['left'] = trim($where_sql['left']);
				} else{
					$where_sql['left'] = 	'';
				}
				
				
				if($right_table['where_items'] && !empty($right_table['where_items']) && is_array($right_table['where_items'])){
				    $where_sql['right'] = 	$this->CompileMySQL(array(
				    	'items'			=>	$right_table['where_items'],
		    	    	'item_wrapper'	=>	array("'","'"),
				    	'condition'		=>	$condition,
				    	'operator'		=>	$operator,
						'table'			=>	$this->db_pointer.$right_table['table'].'.',
				    ));
				    $where_sql['right'] = trim($where_sql['right']);
				} else{
					$where_sql['right'] = 	'';
				}
				
				if($where_sql['left'] == '*' || $where_sql['right'] == '*'){
					$where_sql = '*';
				} else{
					if(!empty($where_sql['left']) && !empty($where_sql['right'])){
						$where_sql = implode(" $condition ", $where_sql);
					} else {
						$where_sql = implode('', $where_sql);				
					}		
				}
			}
			$where_sql = ($where_sql ? "WHERE $where_sql" : false);


			if($random){
			    $order_sql = "ORDER BY rand()";
			} elseif($order_by || $by || $order ){
			
				if($by){
					$accepted_ASC = array('up', 'increasing', 'increase', 'growing', 'ASC', 'ascending');
					if(in_array(strtolower($order), $accepted_ASC)){
						$order = 'ASC';
					} else {
						$order = 'DESC';
					}
					$order_sql = "ORDER BY $by $order";
				
				}elseif($order_by){
			    	$order_sql = "ORDER BY $order_by";
			    }
			}else {
			    $order_sql = false;			
			} 

			//GROUP BY
			$group_by_sql = ($group_by ? "GROUP BY $group_by" : false);
			
			//LIMIT
			$limit_sql = ($limit ? "LIMIT $limit" : false);

			//OFFSET
			$offset_sql = ($offset ? "OFFSET $offset" : false);			
			
			//QUERY
			$query =  "$select_sql $from_sql $on_sql $where_sql $group_by_sql $order_sql $limit_sql $offset_sql; ";

		} 

		//EXECUTE					
		if($query){	
			if($print){
				print $query;
			}
		
			if($execute){
	    		return $this->MySQLFetch($query, $debug, $row_key);
	    	} else {
	    		return $query;
	    	}
	    }
	}









	
	
	public function MysqlDBInsertBackup() {
	    $return = '';
	    $line_count = 0;
	    $tables = mysql_list_tables($this->database);
	    $sql_string = NULL;
	    while ($table = mysql_fetch_array($tables)) {   
	      $table_name = $table[0];
	      $sql_string = "DELETE FROM $table_name; \n";
	      $array[$table_name]['delete'][] = "DELETE FROM $table_name; \n";
	
	      $table_query = mysql_query("SELECT * FROM `$table_name`");
	      $num_fields = mysql_num_fields($table_query);
	      while ($fetch_row = mysql_fetch_array($table_query)) {
	        $sql_string .= "INSERT INTO $table_name VALUES(";
	
	        $first = TRUE;
	        for ($field_count=1;$field_count<=$num_fields;$field_count++){
	          if (TRUE == $first) {
	            $sql_string .= "'".mysql_real_escape_string(utf8_encode($fetch_row[($field_count - 1)]))."'";
	            $first = FALSE;            
	          } else {
	            $sql_string .= ", '".mysql_real_escape_string(utf8_encode($fetch_row[($field_count - 1)]))."'";
	          }
	        }
	        $sql_string .= ");";
	        if ($sql_string != ""){
	    	  $array[$table_name]['insert'][] = $sql_string."\n";
	
	          $return .= $sql_string."\n";     
	          $line_count++;
	        }
	        $sql_string = NULL;
	      }    
	    }
	    return $return;
	  }
	







/*


//----------------------------------------------------------------------------
START
MYSQL QUERY CONSTRUCTION AIDE FUNCTIONS
*/




/*
//KEEP DUPLICATES ONLY (keeps first in value array) very primitive
	$table 			= 	'group_has_locations';
	$colum 			= 	'group_id';
	$by				=	'id';	
	$order			=	'acs';
	$unique_colum	=	'id';
	
	$fetch = array
		(
			'select_items'	=>	'*',
			'table'			=>	$table,
			'row_key'		=>	'group_id',
			'order'			=>	$order,
			'by'			=>	$by,
		);
	
	$fetch_result 		= $this->DB->FetchRow($fetch);

	if(!empty($fetch_result)){
		foreach($fetch_result as $key => $value){
				$LOCATION->DB->DeleteRow(array(
					'table'			=>	$table,
					'where_items'	=>	array(
											$unique_colum	=>	$value[$unique_colum],
										),
				));
		}
	}
*/






/*
//DELETE DUPLICATES ONLY (untested)
	$table 			= 	'group_has_locations';
	$colum 			= 	'group_id';
	$by				=	'id';	
	$order			=	'acs';
	$unique_colum	=	'id';
	$db_object 		=	&$this->DB;
	
	$fetch = array
		(
			'select_items'	=>	'*',
			'table'			=>	$table,
			'row_key'		=>	$colum,
			'order'			=>	$order,
			'by'			=>	$by,
		);
	
	$fetch_result 		= $db_object->FetchRow($fetch);

	if(!empty($fetch_result)){
		foreach($fetch_result as $key => $value){
			$fetch_result_v2[($value[$colum])][] = $value;
		}
	}

	if(!empty($fetch_result_v2)){
		foreach($fetch_result_v2 as $array){
			if(count($array) > 1){
				foreach($array as $key => $value){
					$db_object->DeleteRow(array(
						'table'			=>	$table,
						'where_items'	=>	array(
												$unique_colum	=>	$value[$unique_colum],
											),
					));
				}
			}
		}
	}
*/








}





?>