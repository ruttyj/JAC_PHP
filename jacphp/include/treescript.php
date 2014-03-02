<?php error_reporting(E_ERROR | E_PARSE); 	//Easy Code No warings/notices errors
	require_once __DIR__ . '/globals.php';
        require_once SERVER_CLASS; //Paste to unlock
        require_once DB1_CLASS;
        ini_set('memory_limit', '640M');


	
	//&field=citylpkw
	$FIELD = isset($_GET['field']) ? $_GET['field'] : 'emission';
	

	//will take the sorted structure above and create the desired structure
	//as long as the data follows the child-index.... data form above it does not matter hoe many nests there are.
	function TREEMAP_R($source, &$id=1, $field='emission', $key='root', $depth=0){
		
		//set node information
		$return = array();
		$return['name'] = $key;
		$return['id'] = $id;
		$return['data'] = array();
		$return['data']['count'] = (isset($source[$field]) ? 1 : 0);
		$return['data']['value'] = (isset($source[$field]) ? $source[$field] : 0);
		
		//init data
		if(isset($source[$field])){
			$return['data']['sum_engine'] 	 = $source['engine'];
			$return['data']['sum_cylinders'] = $source['cylinders'];
			$return['data']['sum_citylpkw']  = $source['citylpkw'];
			$return['data']['sum_hwylpkw'] 	 = $source['hwylpkw'];
			$return['data']['sum_annualfuel']= $source['annualfuel'];
			$return['data']['sum_emission']  = $source['emission'];
		}
		//process nested data
		foreach($source as $info_key => $info_data){
		
			if($info_key != 'children'){
				$return['data'][$info_key] = $info_data;			
			} else {
				//process children
				foreach($source['children'] as $childKey => $sourcechild){
					//add child
					$id++; //inc id
					$child = TREEMAP_R($sourcechild, $id, $field, $childKey, $depth+1);
					$return['children'][] = $child;
					
					
					//data comming back from the depths
					$return['data']['value'] += $child['data']['value'];
					$return['data']['count'] += $child['data']['count'];
					
					
					
					$return['data']['sum_engine'] 	 += $child['data']['sum_engine'];
					$return['data']['sum_cylinders'] += $child['data']['sum_cylinders'];
					$return['data']['sum_citylpkw']  += $child['data']['sum_citylpkw'];
					$return['data']['sum_hwylpkw'] 	 += $child['data']['sum_hwylpkw'];
					$return['data']['sum_annualfuel']+= $child['data']['sum_annualfuel'];
					$return['data']['sum_emission']  += $child['data']['sum_emission'];
					
				}
			}
		}
		
		//calculate the area value for this node
		if($return['data']['count'] > 0){
			$return['data']['$area'] = $return['data']['value']/$return['data']['count'];
		} else {
			$return['data']['$area'] = 0;
		}
		
		return $return;
	}



////////////////////////////////////////////////////////////////////////////////////////////////////

	$generate = true;

	//Retreive data and generate
	if($generate){
		$DB = new DB1($DBc);
		$DB->OpenConnection(); 
		//==============================================================
		//example fo some capabilities
		$fetchParams = array(
			'table'         =>  'records',
		    'select_items'  =>  '*',
		  //'limit'			=>	100,	    
		);
		
		$result = $DB->FetchRow($fetchParams);
		//SERVER::dump($result);
		
		
		
		
		//Build Recursive structure -------------------------
		$LIST = array();
		foreach($result as $key => $row){
			$cartype = $row['cartype'];
			$make = $row['maker'];
			$model = $row['model'];
			$year = $row['year'];
			
			//create layers for treemap
			$LIST['children'][$cartype]['children'][$make]['children'][$year.' '.$model] = $row;
		}
		
		
		
		
		//Convert nested structure to a TREEMAP Json string 
		if(1){
			$id = 0;
			$result = TREEMAP_R($LIST, $id, $FIELD);
			unset($LIST);
			$jsonStr = json_encode($result);
		}
	}
	
	
	
	
	//Escape all control charaters by json encoding and taking a substring
	$array = array(""=>$jsonStr);
	$escappedJson = json_encode($array);
	$escappedJson =  substr($escappedJson, 4, strlen($escappedJson)-5);
	
	
	//save content to file
	//file_put_contents('jsonStr.txt', $escappedJson);
	
	//$pretty = SERVER::json_pretty($LIST);
	
	if(isset($_GET['JSON'])){
		SERVER::dump($result);
	}
	//SERVER::dump($pretty);
?>




var labelType, useGradients, nativeTextSupport, animate;

(function() {
  var ua = navigator.userAgent,
      iStuff = ua.match(/iPhone/i) || ua.match(/iPad/i),
      typeOfCanvas = typeof HTMLCanvasElement,
      nativeCanvasSupport = (typeOfCanvas == 'object' || typeOfCanvas == 'function'),
      textSupport = nativeCanvasSupport 
        && (typeof document.createElement('canvas').getContext('2d').fillText == 'function');
  //I'm setting this based on the fact that ExCanvas provides text support for IE
  //and that as of today iPhone/iPad current text support is lame
  labelType = (!nativeCanvasSupport || (textSupport && !iStuff))? 'Native' : 'HTML';
  nativeTextSupport = labelType == 'Native';
  useGradients = nativeCanvasSupport;
  animate = !(iStuff || !nativeCanvasSupport);
})();

var Log = {
  elem: false,
  write: function(text){
    if (!this.elem) 
      this.elem = document.getElementById('log');
    this.elem.innerHTML = text;
    this.elem.style.left = (500 - this.elem.offsetWidth / 2) + 'px';
  }
};


function init(){
  //init data
  var json = <?=$escappedJson;?>;
  //end
  //init TreeMap
  var tm = new $jit.TM.Squarified({
    //where to inject the visualization
    injectInto: 'infovis',
    //show only one tree level
    levelsToShow: 1,
    //parent box title heights
    titleHeight: 0,
    //enable animations
    animate: animate,
    //box offsets
    offset: 1,
    //use canvas text
    Label: {
      type: labelType,
      size: 9,
      family: 'Tahoma, Verdana, Arial'
    },
    //enable specific canvas styles
    //when rendering nodes
    Node: {
      CanvasStyles: {
        shadowBlur: 0,
        shadowColor: '#000'
      }
    },
    //Attach left and right click events
    Events: {
      enable: true,
      onClick: function(node) {
        if(node) tm.enter(node);
      },
      onRightClick: function() {
        tm.out();
      },
      //change node styles and canvas styles
      //when hovering a node
      onMouseEnter: function(node, eventInfo) {
        if(node) {
          //add node selected styles and replot node
          node.setCanvasStyle('shadowBlur', 7);
          node.setData('color', '#888');
          tm.fx.plotNode(node, tm.canvas);
          tm.labels.plotLabel(tm.canvas, node);
        }
      },
      onMouseLeave: function(node) {
        if(node) {
          node.removeData('color');
          node.removeCanvasStyle('shadowBlur');
          tm.plot();
        }
      }
    },
    //duration of the animations
    duration: 1000,
    //Enable tips
    Tips: {
      enable: true,
      type: 'Native',
      //add positioning offsets
      offsetX: 20,
      offsetY: 20,
      //implement the onShow method to
      //add content to the tooltip when a node
      //is hovered
      onShow: function(tip, node, isLeaf, domElement) {
        var html = "<div class=\"tip-title\"><b>" + node.name 
          + "</b></div><div class=\"tip-text\">";
        var data = node.data;
        
        
        
        //Cars ------------------------------------
		if(data.img) {
          html += "<img src=\""+ data.img +"\" width=\"125px;\"/>";
        }
        
        
        if(data.year) {
          html += "Year: " + data.year + "<br />";
		}

        if(data.cartype) {
          html += "Category: " + data.cartype + "<br/>";
        }
        
        if(data.engine) {
          html += "Engine: " + data.engine + "<br/>";
        }
        
        if(data.cylinders) {
          html += "Cylenders: " + data.cylinders + "<br/>";
        }
        
        if(data.transmission) {
          html += "Transmission: " + data.transmission + "<br/>";
        }
        /*
        if(data.fueltype) {
          html += "Fuel type: " + data.fueltype + "<br/>";
        }*/
        
        if(data.citylpkw) {
          html += "City (L/100km): " + data.citylpkw + "<br/>";
        }
        
        if(data.hwylpkw) {
          html += "Highway (L/100km): " + data.hwylpkw + "<br/>";
        }
        
        
        
        
        
        
        //PARENT ====================
        
        if(data.count > 1){
       		 html += "AVERAGES<br/>";
       		 
       		 if(data.sum_engine) {
       		   	html += "Engine Size: " + Math.round(data.sum_engine / data.count) + " L <br />";
	   			}
	   			
	   			if(data.sum_cylinders) {
       		   	html += "Cylinders: " + Math.round(data.sum_cylinders / data.count) + " <br />";
	   			}
	   			
	   			if(data.sum_citylpkw) {
       		   	html += "City: " + Math.round(data.sum_citylpkw / data.count) + "(L/100km) <br />";
	   			}
	   		
	   			if(data.sum_hwylpkw) {
       		   	html += "Hwy: " + Math.round(data.sum_hwylpkw / data.count) + "(L/100km) <br />";
	   			}
	   			
	   			
	   			if(data.annualfuel) {
       		   	html += "Annual Fuel: " + Math.round(data.annualfuel / data.count) + " L <br />";
	   			}
	   		
	   			if(data.sum_emission) {
       		   	html += "CO2 Emission: " + Math.round(data.sum_emission / data.count) + " (kg/Year) <br />";
	   			}
		}
		        
        
        
        
        
        
        tip.innerHTML =  html; 
      }  
    },
    //Implement this method for retrieving a requested  
    //subtree that has as root a node with id = nodeId,  
    //and level as depth. This method could also make a server-side  
    //call for the requested subtree. When completed, the onComplete   
    //callback method should be called.  
    request: function(nodeId, level, onComplete){  
      var tree = eval('(' + json + ')');  
      var subtree = $jit.json.getSubtree(tree, nodeId);  
      $jit.json.prune(subtree, 1);  
      onComplete.onComplete(nodeId, subtree);  
    },
    //Add the name of the node in the corresponding label
    //This method is called once, on label creation and only for DOM labels.
    onCreateLabel: function(domElement, node){
        domElement.innerHTML = node.name;
    }
  });
  
  var pjson = eval('(' + json + ')');  
  $jit.json.prune(pjson, 1);
  
  tm.loadJSON(pjson);
  tm.refresh();
  //end
  var sq = $jit.id('r-sq'),
      st = $jit.id('r-st'),
      sd = $jit.id('r-sd');
  var util = $jit.util;
  util.addEvent(sq, 'change', function() {
    if(!sq.checked) return;
    util.extend(tm, new $jit.Layouts.TM.Squarified);
    tm.refresh();
  });
  util.addEvent(st, 'change', function() {
    if(!st.checked) return;
    util.extend(tm, new $jit.Layouts.TM.Strip);
    tm.layout.orientation = "v";
    tm.refresh();
  });
  util.addEvent(sd, 'change', function() {
    if(!sd.checked) return;
    util.extend(tm, new $jit.Layouts.TM.SliceAndDice);
    tm.layout.orientation = "v";
    tm.refresh();
  });
  //add event to the back button
  var back = $jit.id('back');
  $jit.util.addEvent(back, 'click', function() {
    tm.out();
  });
}