<?
	//////////////////////////////////////////////////////////////////////////////////////////
	// MYSQLI DATABASE Class
	//////////////////////////////////////////////////////////////////////////////////////////

class DBI{

	public 	 	$connection;
	protected 	 	$connected;
	public			$database;	
	protected		$credentials;
	

	//////////////////////////////////////////////////////////////////////////////////////////	
	
	// 										Constructors
	
	//////////////////////////////////////////////////////////////////////////////////////////	
	public function __construct($params=false, $autoConnect){
		if(!is_array($params)){
			$args = func_get_args();
			$params['host'] 	=	ExistsElse($args[0]);
			$params['username']	=	ExistsElse($args[1]);
			$params['password']	=	ExistsElse($args[2]);
			$params['database']	=	ExistsElse($args[3]);
		}
		$this->credentials = $params;

		if($autoConnect == true){
			$this->Connect();
		} else
			$this->connected = false;
	}
	
	
	
	public function __destruct(){
		$this->Disconnect();			
	}	
	
	
	
	//////////////////////////////////////////////////////////////////////////////////////////	
	
	// 									Database Connection
	
	//////////////////////////////////////////////////////////////////////////////////////////	
	public function Connect(){
		if(!$this->connected){
			$this->connection = new mysqli($this->credentials['host'], $this->credentials['username'], $this->credentials['password'], $this->credentials['database']);	
			$this->connected = true;
		}
		return $this->connected;
	}
	
	public function Disconnect(){
		if($this->connected){
			$this->connection->close();
			$this->connected = false;
		}
		return $this->connected;
	}
	

	
	//////////////////////////////////////////////////////////////////////////////////////////	
	
	// 									Database Actions
	
	//////////////////////////////////////////////////////////////////////////////////////////
	public function Insert($params){
		//prepair function varaibles
		$table 		 = isset($params['table']) 			? $params['table'] 			: false;
		$insertItems = isset($params['insert_items']) 	? $params['insert_items'] 	: false;
		$execute 	 = isset($params['execute']) 		? $params['execute'] 		: true;
		$print 	 	 = isset($params['print']) 			? $params['print'] 			: false;

		//Preform Insert on table
		if(!empty($insertItems)){
			//create sql from items provided
			$insert = $this->buildInsert($table, $insertItems);
			
			//print sql
			if($print)
				SERVER::dump($insert['statement']);
				
			//execute sql
 			if($execute == true){
 				//connect if not already
 				$this->Connect();				
 				
 				//prepair assembled statement
    			$theStatement = $this->connection->prepare($insert['statement']);
    			
    			//Dynamicly Bind assembled params to statement
    			call_user_func_array(array($theStatement, 'bind_param'), $insert['bindParams']);
				
				//execute statement
				$sucess = $theStatement->execute();
				
				//return sucess state
				$theStatement->close();
				return $sucess;
  			}
  		}
	}

	
	
	public function FetchRows($params, &$meta=null){
		
		//parse params 	**not finished more validation and switches to come
		$selectItems = $params['select_items'];
		$where = !empty($params['where_items']) ? $params['where_items'] : null;
		$table = $params['from'];
		
		$isWhereString = (isset($params['where_items']) && is_array($params['where_items']) && count($params['where_items']) > 0);
		
		
		///////////////////////////////////////////////////////////
		//BUILD QUERY /////////////////////////////////////////////
		$SQL = '';
		
		//BUILD SELCET ============================================
		$selectString = 'SELECT '.join(", ", (array)$selectItems);
		
		//BUILD WHERE ==============================================
		$fromString = 'FROM '.$table;
		
		//BUILD WHERE ==============================================
		//$isWhereString
		//$where
		$whereString = '';
		if(!empty($where) && is_array($where)){
			$whereBindParams = array();
			$whereString = $this->buildWhere($isWhereString, $whereBindParams, $where);
		} else {
			$whereString = 'WHERE 1 = 1';
		}
		
		//COMPILE STATEMENT ===========================================
		$SQL = $selectString.' '.$fromString.' '.$whereString;
		//SERVER::dump($SQL);
		///////////////////////////////////////////////////////////				<-- split seperate functions
		
		
		//RUN QUERY ///////////////////////////////////////////////				<-- might need to accept other params from order by or group
		//PREPAIR STATEMENT =========================================
		$theStatement = $this->connection->prepare($SQL);
		
		if(!empty($whereBindParams)){
			call_user_func_array(array($theStatement, 'bind_param'), $whereBindParams); // replace $whereBindParams with list of fields from emta data of statement
		}
		
		//BIND RESULT ================================================
		$bind_result = array();	

		if (!empty($selectItems) && is_array($selectItems)){
			DBI::bindResult($theStatement, $selectItems, $bind_result); // modify to expect from statement
		}
		
		//EXECUTE FETCH ===========================================
		$theStatement->execute();
		$result = array();
		while($theStatement->fetch()){
			$aRow = array();	//clone values of referenced array
			foreach($bind_result as $key => $value){
				$aRow[$key] = $value;
			}
			$result[] = $aRow;
		}
		$theStatement->close();
		
		return $result;
	}
	
	
	
	
	
	public function DeleteRows($params, &$meta=null){
		
		//parse params 	**not finished more validation and switches to come
		$where = $params['where_items'];
		$table = $params['from'];
		
		$isWhereString = (isset($params['where_items']) && is_array($params['where_items']) && count($params['where_items']) > 0);
		
		///////////////////////////////////////////////////////////
		//BUILD QUERY /////////////////////////////////////////////
		$SQL = '';		
		//BUILD WHERE ==============================================
		$fromString = 'FROM '.$table;
		
		//BUILD WHERE ==============================================
		//$isWhereString
		//$where
		$whereString = '';
		$whereBindParams = array();
		$whereString = $this->buildWhere($isWhereString, $whereBindParams, $where);
		
		//COMPILE STATEMENT ===========================================
		$SQL = 'DELETE '.$fromString.' '.$whereString;
		//SERVER::dump($SQL);
						

		///////////////////////////////////////////////////////////				<-- split seperate functions
		//RUN QUERY ///////////////////////////////////////////////				<-- might need to accept other params from order by or group
		//PREPAIR STATEMENT =========================================
		$theStatement = $this->connection->prepare($SQL);
		call_user_func_array(array($theStatement, 'bind_param'), $whereBindParams); // replace $whereBindParams with list of fields from emta data of statement
		
		//EXECUTE FETCH ===========================================
		$sucess = false;
		$sucess = $theStatement->execute();
		$theStatement->close();
	
		return $sucess;
	}
	
	
	
	
	
	public function buildWhere(&$isWhereString, &$whereBindParams, &$where){
		//$isWhereString
		//$where
		$whereString = '';
		if ($isWhereString){
			$whereString .= 'WHERE';
			$whereParamTypes = &$whereBindParams[0];	//first param passed to bind_param('ssii', ..)
			$i=0;
			foreach($where as $k => $item){
			//	SERVER::dump($item);
				$fieldName = '';
				//append fieldtype (s,i...) to first element of array
				$whereParamTypes  .= DBi::SplitField($item['field'], $fieldName); //'s:username' return and remove type from field
				
				//-------------------------------------------
				//allow arrays of values to be passed
				if(is_array($where[$k]['value'])      and false){           //needs more testing
					$where[$k]['value'] = join(', ', $where[$k]['value']);
					$operator = 'IN';
					$opTemplate = '(?)';
				} else {
					$operator = isset($item['operator']) ? $item['operator'] : '=';
					$opTemplate = '?';
				}
				//-------------------------------------------
				
				//append field to bind array
				$whereBindParams[] = &$where[$k]['value'];
				$condition    = ($i == 0) ? '' : ' '.$item['condition']; // first condition following WHERE not needed
				
				$whereString .= $condition.' '.$fieldName.' '.$operator.' '.$opTemplate;
				$i++;
			}
		}

		return $whereString;
	}
	
	
	
	
	
	/* Bind Result Dynamicly ===================================
		this statement will bind a dynamicly generated array 
		which will hold values of a row upon fetch
	============================================================*/
	public static function bindResult($theStatement, $fields, &$bind_result){
		//create array to store information
		$storageArray = array();
		foreach($fields as $field){
			$storageArray[$field] = null;
		}
		
		//create refrence array to bind data with	
		foreach($storageArray as $key => $val){
			$bind_result[$key] = &$storageArray[$key];
		}
		
		//Dynamic $theStatement->bind_result(...) function call
		call_user_func_array(array($theStatement, 'bind_result'), $bind_result); 
	}
	
	
	
	
	public static function SplitField($field, &$fieldName, &$type=null){
		$fieldName = substr($field, 2);
    	$type = substr($field, 0,1);
    	return $type;
	}
	
	
	
	
	////////////////////////////////////////////////////////////////////////////////////
	
	//								Support Functions								  //
	
	////////////////////////////////////////////////////////////////////////////////////
    public function buildInsert($table, $items){
    	$types = array();
    	$values = array();
    	$typeString = '';
    	foreach($items as $field => $value){
    		$fieldName = '';
    		$typeString .= self::SplitField($field, $fieldName);
    		$values[$fieldName] = &$items[$field];
    	}
		
		$insertStr = 'insert into '.$table;
		$insertStr .= ' ('.join(array_keys($values), ", ").')';
		$insertStr .= ' values ('.substr(str_repeat("?, ", count($values)), 0, -2).')'; 		
		$array = array(
			'statement' => $insertStr,
			'bindParams'=> $typeString, 
		);
		
		return $array;
	}







    public function buildUpdate($table, $items, $where){
    	$types = array();
    	$values = array();
    	$bindParams[0] = '';
    	foreach($items as $field => $value){
    		$fieldName = substr($field, 2);
    		$values[$fieldName] = &$items[$field];
    		$bindParams[0] .= substr($field, 0,1);
    		$bindParams[/*$fieldName*/] = &$items[$field];
    	}
		//'UPDATE '.$userTable.' SET lastlogin = CURRENT_TIMESTAMP, num_sucess_login = num_sucess_login + 1, num_fail_login = 0, blocked = 0 WHERE id NOT ?';
		
		$insertStr = 'UPDATE '.$table;
		$insertStr .= 'SET '.join(array_keys($values), ' = ?, ').' = ? ';
		$array = array(
			'statement' => $insertStr,
			'bindParams'=> $bindParams, 
		);
		
		return $array;
	}



	private function ExistsElse(&$var, $else){
		$else = isset($else) ? $else : false;	//default else = false if not specified
		return !empty($var) ? $var : $else;		//return var if exists else...
	}
	
	
}//DBI CLASS END ///////////////////////////////////////////////////////////////////////
//======================================================================================
?>