<?php

class default_list extends default_set  {
    // protected $action;

    function __construct(){
        parent::__construct();
    }

    // function edit(){
    //     //get
        
    //     $id=laout_check($_REQUEST['id']);

    //    //end get
    //    //set
    // //    $this -> controller -> tmp_where='where id="'.$id.'"';
    // //    $this -> controller -> tmp_id=$id;  
    // //   //end set  
    // //    $this -> controller -> tmp_select();

    //    //type 
    // //    $this -> controller -> tmp_where='';
    // //    $this -> controller -> table_name=TABLE_NAME.PAGE_NAME.'_type';
    // //    $this -> controller -> tmp_select('laout_arr','tmp_arr1');

    // //    $this -> controller -> content_htm=$this -> action.'.htm';
    // //    $this -> controller -> laout(($this -> laout.'.htm'));
    //     // 
    // }    
        
    // function insert(){
    //      //get
    //     //end get
    //    //set
    // //    $this -> controller -> table_name=TABLE_NAME.PAGE_NAME.'_type';
    // //    $this -> controller -> tmp_order ='order by id asc';
    // //   //end set
    // //   $this -> controller -> tmp_select('laout_arr','tmp1_arr'); 
    // //   $this -> controller -> content_htm=$this -> action.'.htm';
    // //   $this -> controller -> laout(($this -> laout.'.htm'));
    // }

    // function edit_update(){
    //     //get
    //     $id=laout_check($_REQUEST['id']);
    //     $old_file_name=laout_check($_REQUEST['old_file_name']);
    // /*upload image*/
    //     $first_path="upload/image/".PAGE_NAME."/";
    //     $file_type='image/jpeg,image/gif,image/png';
    //     $image=upload_file_to_fd($first_path,$file_type,$old_file_name); 
    //     if(!empty($image)){
    //       $_REQUEST['query']['image_name']=$image[0];
    //     }   
    // /*end upload image */

    //     $_REQUEST['query']['update_date']=date('Y-m-d H:i:s');
    //     $query_arr=$_REQUEST['query'];
        
    //    //end get        
    //    /*$col_var=html_col_var('update',$query_arr);
    //    $query_arr_update_sql=array_update_sql($subfix.'_list',$col_var,$tmp_where);    */
    //    //set
        
    //    $this -> controller -> tmp_where="where id ='$id'";   
    //    $this -> controller -> tmp_id=$id;
    //    $this -> controller -> laout_set=false;
    //   //end set  
    //    $this -> controller -> edit_update($query_arr);
    // }        
        
    // function insert_update(){
    // /*upload image*/
    //     $first_path="upload/image/".PAGE_NAME."/";
    //     $file_type='image/jpeg,image/gif,image/png';
    //     $image=upload_file_to_fd($first_path,$file_type,''); 
    //     if(!empty($image)){
    //       $_REQUEST['query']['image_name']=$image[0];
    //     } 
    // /*end upload image */  

    //     //get
    //     $id=laout_check($_REQUEST['id']);
    //     $_REQUEST['query']['post_date']=date('Y-m-d H:i:s');
    //     $_REQUEST['query']['update_date']=date('Y-m-d H:i:s');
    //     $query_arr=$_REQUEST['query'];
    //    //end get          
    //    //set
    //    $this -> controller -> tmp_where="where id ='$id'";   
    //    $this -> controller -> tmp_id=$id;
    //    $this -> controller -> laout_set=false;
    //   //end set  
        
    //    $this -> controller -> insert_update($query_arr);
    // }
        
    // function delete_update(){
    //     //get
    //     $id=laout_check($_REQUEST['id']);
    //     $query_arr=$_REQUEST['query'];
    //    //end get          
    //    //set
    //    $this -> controller -> tmp_where="where id ='$id'";   
    //    $this -> controller -> tmp_id=$id;
    //    $this -> controller -> laout_set=false;
    //   //end set  
        
    //    $this -> controller -> delete_update();
    // }
    
    // function approval(){ 	
    //     //get
    //     $id=laout_check($_REQUEST['id']);
    //     if($_REQUEST['approval'] == 'Y' ){
    //     	$_REQUEST['query']['approval']='N';
    //     	$msg='關閉完成';
	// 	}else{
    //     	$_REQUEST['query']['approval']='Y';
    //     	$msg='開放完成';
	// 	}
    //     $query_arr=$_REQUEST['query'];
        
    //    $this -> controller -> tmp_where="where id ='$id'";   
    //    $this -> controller -> tmp_id=$id;
    //    $this -> controller -> laout_set=true;
    //   //end set  
    //    $this -> controller -> edit_update($query_arr);
    //    echo $msg;
    // }    

    // function student_point($student_id,$add_point=1){
    //     //get
	// 	$this -> controller -> laout_arr['tmp_arr'] =null;
    //   	//end get   
    //     //內部確認
    //     	$student_id = laout_check($student_id);
    //     	$add_point = laout_check($add_point);
    //         $sql="select *  from ".TABLE_NAME."student where id='$student_id' ";
    //         $this -> controller -> basic_select('laout_arr','tmp_arr',$sql,'sql'); 
    //        if(count($this -> controller -> laout_arr['tmp_arr']) !=1){
	// 		   $this -> controller ->msg_text="輸入學生編號有問題";
	// 		   $this -> controller ->msg_title ='系統訊息';
	// 		   return false;
	// 		   exit;
	// 	       $this -> controller -> content_htm='msg_close_and_reload.htm'; 
    //    		   $this -> controller -> laout($this -> laout.'.htm');

	// 	   }
	// 	   if($this -> controller -> laout_arr['tmp_arr'][0]['point']+ $add_point <0){
	// 		   $this -> controller ->msg_text="點數不足";
	// 		   $this -> controller ->msg_title ='系統訊息';
	// 		   return false;
	// 		   exit;
	// 	       $this -> controller -> content_htm='msg_close_and_reload.htm'; 
    //    		   $this -> controller -> laout($this -> laout.'.htm');
	// 	   }
    //        $this -> controller -> laout_arr['tmp_arr'] =null;
	// 	//end 內部確認  
	//  	$sql ="UPDATE ".TABLE_NAME."student SET point=point+$add_point  WHERE  `id`=$student_id;";
	//     $this -> controller -> laout_set='no action';
		
		
	// 	if($this -> controller -> basic_sql_run($sql))
	// 		return true;
    // }  

    // function view_list(){

    // }
    
    // function de_array($array){ 
	//    if(getIP() == '127.0.0.1'){
	//    	header("Content-Type:text/html; charset=utf-8");
	// 	echo "<pre>";
	// 	print_r($array);
	// 	echo "</pre>";
	// 	exit;
	// 	}
    // }
	
    // function change_time_set($tmp_arr){
	//   	$time_set = $_SESSION['backend']['time_set']*2;
	// 	$time_set = floor($time_set);	
	//   	$time_set =$time_set+(8*2);
    //    	$tmp_arr1 = explode(',',$tmp_arr);
    //    foreach( $tmp_arr1 as $key => $value){
	// 	   if($value + $time_set  < 76){
	// 	   	$time_set_numer = ($value -76) +$time_set;//倒扣數 
	// 	   	$tmp_arr1[$key] = 124 + $time_set_numer;
	// 	   }elseif($value + $time_set  > 123){
	// 	   	 $time_set_numer = ($value -123) +$time_set; //重製數
	// 	   	 $tmp_arr1[$key] = 75 + $time_set_numer;
	// 	   }else{
	// 	   	$tmp_arr1[$key] = $value + $time_set;  	
	// 	   }
	//    }
	//    $tmp_arr = $tmp_arr1?implode(",",$tmp_arr1):null;
	//    return $tmp_arr;
	//  }
	 
	 
    // function change_time_local_set($tmp_arr){
	//   	$time_set = -$_REQUEST['time_set']*2;
	// 	$time_set = floor($time_set);	
    //    	$tmp_arr1 = explode(',',$tmp_arr);
    //     foreach( $tmp_arr1 as $key => $value){
            
    //         if($value + $time_set  < 76){
    //             $time_set_numer = ($value -76) +$time_set;//倒扣數 
    //             $tmp_arr1[$key] = 124 + $time_set_numer;
    //         }elseif($value + $time_set  > 123){
    //             $time_set_numer = ($value -123) +$time_set; //重製數
    //             $tmp_arr1[$key] = 75 + $time_set_numer;
    //         }else{
    //             $tmp_arr1[$key] = $value + $time_set;  	
    //         }
    //     }

	//    $tmp_arr = $tmp_arr1?implode(",",$tmp_arr1):null;
	//    return $tmp_arr;
	//  }
    
}

?>

