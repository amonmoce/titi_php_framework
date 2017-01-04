<?php
//定義這個class 在那一個範圍內
namespace components\model;
use components\basic\m\basic_page_model;

class  default_set_model {

	function __construct(){
		
		//default set
		$this -> obj_tmp1= new basic_page_model();
		$this -> obj_tmp1 -> table_name=TABLE_NAME.PAGE_NAME;
		$this -> obj_tmp1 -> tmp_where;
		$this -> obj_tmp1 -> tmp_order ='order by id asc';
		$this -> obj_tmp1 -> tmp_id;  
		//end default set 
		
		//setting
		// $sql="select * from tch_setting";	
		// $this -> obj_tmp1 -> basic_select('laout_arr','setting',$sql);
		
		// foreach($this -> obj_tmp1 ->laout_arr['setting'] as $key => $value ){
		// 	$this -> obj_tmp1 ->laout_arr['setting'][$value['code_name']] = $value;
		// }   	 
		//end setting
				
		//set search
	// 	$this -> obj_tmp1 -> tmp_where;
	// 	$this -> obj_tmp1 -> tmp_order ='order by id asc';

	// 	$where_key=$_REQUEST['where_key'];
	// 	$where_value=$_REQUEST['where_value'];
	// 	if($where_key !='' && $where_value !=''){
	// 	$this -> obj_tmp1 -> tmp_where="where $where_key ='$where_value'";   
	// 	}
	// 	$this -> obj_tmp1 -> laout_set=true;
	// 	//end set search
	
	// 	//紀錄學生點數與方案到期日
	// 	if($_SESSION['backend']['identity'] == 'student' ){ 
	// 			$sql="select * from ".TABLE_NAME."student where id = ".$_SESSION['backend']['user_id'] ;
	// 			$this -> obj_tmp1 -> basic_select('laout_arr','tmp_arr',$sql);				
	// 			$_SESSION['backend']['point'] = $this -> obj_tmp1->laout_arr['tmp_arr'][0]['point'];
	// 			$_SESSION['backend']['point_date_limit']=$this->obj_tmp1->laout_arr['tmp_arr'][0]['point_date_limit'];	              
	// 			$_SESSION['backend']['loginid'] = $this -> obj_tmp1->laout_arr['tmp_arr'][0]['loginid'];
	// 			$_SESSION['backend']['skype']=$this->obj_tmp1->laout_arr['tmp_arr'][0]['skype'];	              	
	// 			$this -> obj_tmp1 -> laout_arr['tmp_arr'] =null; 
	// 	}elseif($_SESSION['backend']['identity'] == 'teach'){
	// 			$sql="select * from ".TABLE_NAME."teach where id = ".$_SESSION['backend']['user_id'] ;
	// 			$this -> obj_tmp1 -> basic_select('laout_arr','tmp_arr',$sql);				
	// 			$_SESSION['backend']['loginid'] = $this -> obj_tmp1->laout_arr['tmp_arr'][0]['loginid'];
	// 			$_SESSION['backend']['skype']=$this->obj_tmp1->laout_arr['tmp_arr'][0]['skype'];	              
	// 			$this -> obj_tmp1 -> laout_arr['tmp_arr'] =null; 	
	// 	}
	// 	//end 紀錄學生點數與方案到期日
	// }

	// function __destruct(){
	// }         

	// function __get($property_name){ 
	// 	return isset($this->$property_name) ? $this->$property_name : null;
	// }

	// function __set($property_name, $value){ 
	// 	$this->$property_name = $value; 
	// 	return true;
	// } 
	}
}