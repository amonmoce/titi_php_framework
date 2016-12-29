<?php
//定義這個class 在那一個範圍內
namespace classes\model;
class  index_model extends default_list_model {
	
	function __construct(){
		parent::__construct();
	}

	function __destruct(){
		parent::__destruct();  
	}               

	function view_list($type ='array'){
		echo $this; exit;
		if($type != 'array')
			return $this -> obj_tmp1; 
		else
			return $this -> obj_tmp1 ->laout_arr;	
	}
	
	function __get($property_name){ 
		return isset($this->$property_name) ? $this->$property_name : null;
	}

	function __set($property_name, $value){ 
		$this->$property_name = $value; 
		return true;
	}

}

?>