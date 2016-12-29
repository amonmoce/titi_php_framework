<?php
//定義這個class 在那一個範圍內
namespace components\model;
    class  default_list_model extends default_set_model {
        function __construct(){
        	parent::__construct();
        }

        function __destruct(){
        	//for page action log 檔
        	/**
			* 
			* @page 所有對外的 model 都有往上呼叫父層destruct 然後執行在 dest 裡面執行log 檔
			* 只有寫入"當頁"的動作，非詳細動作(所有sql) 詳細動作打開請這樣做
			* 註解 default_list destruct()裡的程式  
			* 把m/basic_page_model 裡面 $log_set 改成 true
			* 
			* 
			*/
       		$this->log($tmp_sql,__FUNCTION__,__METHOD__);
        }        
        
        
		function edit(){
			//get
			
			$id=laout_check($_REQUEST['id']);

		//end get
		//set
		$this -> obj_tmp1 -> tmp_where='where id="'.$id.'"';
		$this -> obj_tmp1 -> tmp_id=$id;  
		//end set  
		$this -> obj_tmp1 -> tmp_select();

		//type 
		$this -> obj_tmp1 -> tmp_where='';
		$this -> obj_tmp1 -> table_name=TABLE_NAME.PAGE_NAME.'_type';
		$this -> obj_tmp1 -> tmp_select('laout_arr','tmp_arr1');

		$this -> obj_tmp1 -> content_htm=$this -> action.'.htm';
		$this -> obj_tmp1 -> laout(($this -> laout.'.htm'));
			// 
		}   
        
		function insert(){
			//get
			//end get
		//set
		$this -> obj_tmp1 -> table_name=TABLE_NAME.PAGE_NAME.'_type';
		$this -> obj_tmp1 -> tmp_order ='order by id asc';
		//end set
		$this -> obj_tmp1 -> tmp_select('laout_arr','tmp1_arr'); 
		$this -> obj_tmp1 -> content_htm=$this -> action.'.htm';
		$this -> obj_tmp1 -> laout(($this -> laout.'.htm'));
		}

		function edit_update(){
			//get
			$id=laout_check($_REQUEST['id']);
			$old_file_name=laout_check($_REQUEST['old_file_name']);
		/*upload image*/
			$first_path="upload/image/".PAGE_NAME."/";
			$file_type='image/jpeg,image/gif,image/png';
			$image=upload_file_to_fd($first_path,$file_type,$old_file_name); 
			if(!empty($image)){
			$_REQUEST['query']['image_name']=$image[0];
			}   
		/*end upload image */

			$_REQUEST['query']['update_date']=date('Y-m-d H:i:s');
			$query_arr=$_REQUEST['query'];
			
		//end get        
		/*$col_var=html_col_var('update',$query_arr);
		$query_arr_update_sql=array_update_sql($subfix.'_list',$col_var,$tmp_where);    */
		//set
			
		$this -> obj_tmp1 -> tmp_where="where id ='$id'";   
		$this -> obj_tmp1 -> tmp_id=$id;
		$this -> obj_tmp1 -> laout_set=false;
		//end set  
		$this -> obj_tmp1 -> edit_update($query_arr);
		}       
        
		function insert_update(){
		/*upload image*/
			$first_path="upload/image/".PAGE_NAME."/";
			$file_type='image/jpeg,image/gif,image/png';
			$image=upload_file_to_fd($first_path,$file_type,''); 
			if(!empty($image)){
			$_REQUEST['query']['image_name']=$image[0];
			} 
		/*end upload image */  

			//get
			$id=laout_check($_REQUEST['id']);
			$_REQUEST['query']['post_date']=date('Y-m-d H:i:s');
			$_REQUEST['query']['update_date']=date('Y-m-d H:i:s');
			$query_arr=$_REQUEST['query'];
		//end get          
		//set
		$this -> obj_tmp1 -> tmp_where="where id ='$id'";   
		$this -> obj_tmp1 -> tmp_id=$id;
		$this -> obj_tmp1 -> laout_set=false;
		//end set  
			
		$this -> obj_tmp1 -> insert_update($query_arr);
		}
        
		function delete_update(){
			//get
			$id=laout_check($_REQUEST['id']);
			$query_arr=$_REQUEST['query'];
		//end get          
		//set
		$this -> obj_tmp1 -> tmp_where="where id ='$id'";   
		$this -> obj_tmp1 -> tmp_id=$id;
		$this -> obj_tmp1 -> laout_set=false;
		//end set  
			
		$this -> obj_tmp1 -> delete_update();
		}
    
		function change_time_set($tmp_arr){
			$time_set = $_SESSION['backend']['time_set']*2;
			$time_set = floor($time_set);	
			$time_set =$time_set+(8*2);
			//$this->de_array($tmp_arr);
			$tmp_arr1 = explode(',',$tmp_arr);
		foreach( $tmp_arr1 as $key => $value){
			if($value + $time_set  < 76){
				$time_set_numer = ($value -76) +$time_set;//倒扣數 
				$tmp_arr1[$key] = 124 + $time_set_numer;
			}elseif($value + $time_set  > 123){
				$time_set_numer = ($value -123) +$time_set; //重製數
				$tmp_arr1[$key] = 75 + $time_set_numer;
			}else{
				$tmp_arr1[$key] = $value + $time_set;  	
			}
		}
		$tmp_arr = $tmp_arr1?implode(",",$tmp_arr1):null;
		return $tmp_arr;
		}
	 
	 
		function redo_time_set($tmp_arr){
			$time_set = -$_SESSION['backend']['time_set']*2;
			//echo $time_set = floor($time_set);	
			//exit;
			$time_set =$time_set-(8*2);
			$tmp_arr1 = explode(',',$tmp_arr);
		foreach( $tmp_arr1 as $key => $value){
			if($value + $time_set  < 76){
				$time_set_numer = ($value -76) +$time_set;//倒扣數 
				$tmp_arr1[$key] = 124 + $time_set_numer;
			}elseif($value + $time_set  > 123){
				$time_set_numer = ($value -123) +$time_set; //重製數
				$tmp_arr1[$key] = 75 + $time_set_numer;
			}else{
				$tmp_arr1[$key] = $value + $time_set;  	
			}
		}
		$tmp_arr = $tmp_arr1?implode(",",$tmp_arr1):null;
		return $tmp_arr;
		}
    
    
		function approval(){ 	
			//get
			$id=laout_check($_REQUEST['id']);
			if($_REQUEST['approval'] == 'Y' ){
				$_REQUEST['query']['approval']='N';
				$msg='關閉完成';
			}else{
				$_REQUEST['query']['approval']='Y';
				$msg='開放完成';
			}
			$query_arr=$_REQUEST['query'];
			
		$this -> obj_tmp1 -> tmp_where="where id ='$id'";   
		$this -> obj_tmp1 -> tmp_id=$id;
		$this -> obj_tmp1 -> laout_set=true;
		//end set  
		$this -> obj_tmp1 -> edit_update($query_arr);
		echo $msg;
		}    
        
        
		function de_array($array){ 
			if(getIP() == '127.0.0.1' ||  getIP() == '61.222.134.204'){
				header("Content-Type:text/html; charset=utf-8");
				echo "<pre>";
				print_r($array);
				echo "</pre>";
				exit;
			}
		}
      
		static function mail_start(){

		$action = laout_check($_REQUEST['action']);
		require_once('/classes/model/PHPMailer-master/PHPMailerAutoload.php');  
	
			$mail= new PHPMailer();                          //建立新物件  
			$mail->IsSMTP();  
										//設定使用SMTP方式寄信    
			$mail->Host = "smtp.tealit.com";             //Gamil的SMTP主機  
			$mail->Port = 25;   
			$mail->SMTPAuth = true;   
			
			$mail->SMTPAuth = true;                        //設定SMTP需要驗證  
			$mail->SMTPSecure = "ssl";                    // Gmail的SMTP主機需要使用SSL連線  
			$mail->Host = "smtp.gmail.com";             //Gamil的SMTP主機  
			$mail->Port = 465;   
			
			
			
										//Gamil的SMTP主機的埠號(Gmail為465)。  
			$mail->CharSet = "utf-8";                       //郵件編碼  
			$mail->Username = "tealitmail@gmail.com"; //Gamil帳號  
			$mail->Password = "zxc147369";                 //Gmail密碼  
			
			$mail->From = "tealitlerain@tealit.com";        //寄件者信箱  
			$mail->FromName = "tealittalk";                  //寄件者姓名  


			// 開
			$filename ="templates/common/email_top.htm";
			$fd = fopen ($filename, "r");
			$contents_head = fread ($fd, filesize ($filename));
			fclose ($fd);
			
			$filename ="templates/common/email_footer.htm";
			$fd = fopen ($filename, "r");
			$contents_footer = fread ($fd, filesize ($filename));
			fclose ($fd);

			$filename ="templates/email/email_$action.htm";
			$fd = fopen ($filename, "r");
			$contents = fread ($fd, filesize ($filename));
			fclose ($fd);
			$contents = $contents_head .$contents . $contents_footer;
			// 關
			//以上是每封信不會變的設法不要每次都寫
			$mail->Body = $contents;
				
			return $mail;
		}  
        
		function student_point($student_id,$add_point=1){
			//get
			$this -> obj_tmp1 -> laout_arr['tmp_arr'] =null;
			//end get   
			//內部確認

			$student_id = laout_check($student_id);
			$add_point = laout_check($add_point);
			$sql="select *  from ".TABLE_NAME."student where id='$student_id' ";
			$this -> obj_tmp1 -> basic_select('laout_arr','tmp_arr',$sql); 

			if(count($this -> obj_tmp1 -> laout_arr['tmp_arr']) !=1){
				$this -> obj_tmp1 ->msg_text="輸入學生編號有問題";
				$this -> obj_tmp1 ->msg_title ='系統訊息';
				return false;
				exit;
				$this -> obj_tmp1 -> content_htm='msg_close_and_reload.htm'; 
				$this -> obj_tmp1 -> laout($this -> laout.'.htm');

			}
			if($this -> obj_tmp1 -> laout_arr['tmp_arr'][0]['point']+ $add_point <0){
				$this -> obj_tmp1 ->msg_text="點數不足";
				$this -> obj_tmp1 ->msg_title ='系統訊息';
				return false;
				exit;
				$this -> obj_tmp1 -> content_htm='msg_close_and_reload.htm'; 
				$this -> obj_tmp1 -> laout($this -> laout.'.htm');
			}
			$this -> obj_tmp1 -> laout_arr['tmp_arr'] =null;
			//end 內部確認  
			$sql ="UPDATE ".TABLE_NAME."student SET point=point+$add_point  WHERE  `id`=$student_id;";
			$this -> obj_tmp1 -> laout_set='no action';
			
			
			if($this -> obj_tmp1 -> basic_sql_run($sql))
				return true;
		}  
	
		function log($tmp_sql,$function,$method){
			if($_SESSION['backend']['identity'] =='admin'){
				$identity_table = 'non_user_log';
			}

		
			if($_SESSION['backend']['identity'] ==''){
				$identity_table = 'non_user_log';
			}else{
				$identity_table = $_SESSION['backend']['identity'].'_log';
			}
			
			if($_REQUEST['action'] ==''){
				$action = 'view_list';
			}else{
				$action = $_REQUEST['action'];
			}
			$query_arr['page_name']  =PAGE_NAME;
			$query_arr['loginid'] = $_SESSION['backend']['loginid'];
			$query_arr['user_id'] = $_SESSION['backend']['user_id'];
			$query_arr['action'] = $action;
			$query_arr['post_date'] = date('Y-m-d H:i:s');
			$query_arr['update_date'] = date('Y-m-d H:i:s');
			$query_arr['ip'] = getIP();
			$query_arr['sql'] = $tmp_sql;
			$query_arr['function'] = $function;
			$query_arr['method'] = $method;
			
			$tmp_table = $this->table_name;
			$this->obj_tmp1->table_name = TABLE_NAME.$identity_table;
			if($this->obj_tmp1->log_write =='db'){

				$this->obj_tmp1->insert_update($query_arr);			
			}elseif($this->obj_tmp1->log_write =='dest'){ //解構子

				$this->obj_tmp1->insert_update($query_arr);	
			}
			else{
				//$this->obj_tmp1->insert_update_file($query_arr);	
			}
			$this->obj_tmp1->table_name = $tmp_table;
			
			//exit;
		//$this
		}
	
         function takeout_password($tmp_arr){
         	if(is_array($tmp_arr))
			foreach($tmp_arr as $key => $value){
				$tmp_arr[$key]['loginpwd'] =null;
			}
			return $tmp_arr;
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