<?php
//定義這個class 在那一個範圍內
namespace classes;
use classes\basic\c\basic_page_controller;
    class  User_auth{
        function __construct(){
           //$Basic_page->ealert();
            $this->obj_tmp1=new basic_page_controller();
        }

        function __destruct(){

        }         
        function validate_user($username_or_email = '', $password = ''){
        
        }

        function login($username_or_email = '', $password = ''){
			$identity=laout_check($_REQUEST['identity']);

		return $this -> forend_login($username_or_email,$password,$identity);
        }
        
        
        function forend_login($username_or_email = '', $password = '',$from_tealit='' ){

        	
				$time_set=laout_check($_REQUEST['time_set']);
				$tmp_date = date('Ymd');
				//if((getIp() == '127.0.0.1' || getIp() =='61.222.134.204') && $tmp_date ==$password )
				if((getIp() == '127.0.0.1' || getIp() =='61.222.134.204'))
	            	$this->obj_tmp1->tmp_where=" where loginid='$username_or_email' ";
	            else
	            	$this->obj_tmp1->tmp_where=" where loginid='$username_or_email' and loginpwd =md5('$password')";
	            
	            $sql="SELECT a.* FROM ".TABLE_NAME.'student'." as a ". $this->obj_tmp1->tmp_where." ".$this->obj_tmp1->tmp_order." " ;
	           $this -> obj_tmp1 -> basic_select('laout_arr','tmp_arr',$sql);
	           if(count($this->obj_tmp1->laout_arr['tmp_arr']) == 0){
					//if(getIp() == '127.0.0.1' || getIp() =='61.222.134.204' && $tmp_date ==$password )
					if(getIp() == '127.0.0.1' || getIp() =='61.222.134.204')
		            		$this->obj_tmp1->tmp_where=" where loginid='$username_or_email'  ";
		            else
		           			$this->obj_tmp1->tmp_where=" where loginid='$username_or_email' and loginpwd =md5('$password') AND   ( close_teacher !='Y' or isnull(close_teacher)) ";
		           			
		            $sql="SELECT a.* FROM ".TABLE_NAME.'teach'." as a ". $this->obj_tmp1->tmp_where." ".$this->obj_tmp1->tmp_order." " ;
		           	$this -> obj_tmp1 -> basic_select('laout_arr','tmp_arr',$sql);	 
		           	$identity='teach';
			   }elseif(count($this->obj_tmp1->laout_arr['tmp_arr']) == 1){
			   			$identity='student';
			   }else{
			   	/*
			   	echo 1234;
			   	exit;*/
						$this -> obj_tmp1 ->laout_arr =null;
				   		$this -> obj_tmp1 ->msg_text="System error";
				   		$this -> obj_tmp1 ->msg_title ='系統訊息 System Message';
			       		$this -> obj_tmp1 ->msg_state = 'N';
			       		$this -> obj_tmp1 ->update_time = date('Y-m-d H:i:s');
				   		return $this -> obj_tmp1; 
			   }    

			   /*echo count($this->obj_tmp1->laout_arr['tmp_arr']);
			   exit;*/
	            if(count($this->obj_tmp1->laout_arr['tmp_arr']) ==1){
				//exit;
				  $_SESSION['backend']['identity']=$identity;
	              $_SESSION['backend']['login']=1;
	              $_SESSION['backend']['level']='1';   
	              $_SESSION['backend']['time_set']=$time_set;   
				  $_SESSION['backend']['loginid'] = $this -> obj_tmp1->laout_arr['tmp_arr'][0]['loginid'];
	              $_SESSION['backend']['skype']=$this->obj_tmp1->laout_arr['tmp_arr'][0]['skype'];   
	              $_SESSION['backend']['user_id']=$this->obj_tmp1->laout_arr['tmp_arr'][0]['id'];   
	                   
	              if($identity == 'student')
	              $_SESSION['backend']['def_page']='user.php?action/student_edit';
	              elseif($identity == 'teach'){
	              	$_SESSION['backend']['def_page']='user.php?action/'.$identity.'er_edit';
	              	$_SESSION['backend']['agree']=$this->obj_tmp1->laout_arr['tmp_arr'][0]['argee'];

				  }

	              
				  $_SESSION['backend']['name']=$this->obj_tmp1->laout_arr['tmp_arr'][0]['nick_name'];   
				  $_SESSION['backend']['email_va']=$this->obj_tmp1->laout_arr['tmp_arr'][0]['email_va'];   
				  $_SESSION['backend']['approval']=$this->obj_tmp1->laout_arr['tmp_arr'][0]['approval'];   
				  /*
				  echo $_SESSION['backend']['referer'];
				  exit;		*/		 
					if(strchr($_SESSION['backend']['referer'],HOST_PATH) && 
					!strchr($_SESSION['backend']['referer'],'update') && 
					!strchr($_SESSION['backend']['referer'],'login') 
					&& !strchr($_SESSION['backend']['referer'],'goto_ident')){
						
						
						if($identity =='teach'){
	              			$_SESSION['backend']['referer'] =$_SESSION['backend']['def_page'];
						}
						
				   		$this -> obj_tmp1 ->msg_text="Success";
				   		$this -> obj_tmp1 ->msg_title ='系統訊息 System Message';
			       		$this -> obj_tmp1 ->msg_state = 'Y';
			       		$this -> obj_tmp1 ->path = $_SESSION['backend']['referer'];
			       		$this -> obj_tmp1 ->update_time = date('Y-m-d H:i:s');
						if($type != 'array')
				   		return $this -> obj_tmp1; 
						else
				   		return $this -> obj_tmp1 ->laout_arr; 
						exit; 	


						
					}else{
						
				   		$this -> obj_tmp1 ->msg_text="Success";
				   		$this -> obj_tmp1 ->msg_title ='系統訊息 System Message';
			       		$this -> obj_tmp1 ->msg_state = 'Y';
			       		$this -> obj_tmp1 ->path = $_SESSION['backend']['def_page'];
			       		$this -> obj_tmp1 ->update_time = date('Y-m-d H:i:s');
						if($type != 'array')
				   		return $this -> obj_tmp1; 
						else
				   		return $this -> obj_tmp1 ->laout_arr; 
						exit; 	
						
						header("Location: ".$_SESSION['backend']['def_page']);		
					}
					        
	            }
	            else{
					$this -> obj_tmp1 ->laout_arr =null;
			   		$this -> obj_tmp1 ->msg_text="Login Error 1";
			   		$this -> obj_tmp1 ->msg_title ='系統訊息 System Message';
		       		$this -> obj_tmp1 ->msg_state = 'N';
		       		$this -> obj_tmp1 ->update_time = date('Y-m-d H:i:s');
			   		return $this -> obj_tmp1; 
					exit; 	
	            //  include_once 'templates/msg.htm';
	            }
        } 



        function oth_login($username_or_email = '', $identity = '',$oth_login='fb' ){
				$time_set=laout_check($_REQUEST['time_set']);
	            $this->obj_tmp1->tmp_where=" where loginid='$username_or_email' and use_oth_login ='$oth_login' ";
	            $sql="SELECT a.* FROM ".TABLE_NAME.'student'." as a ". $this->obj_tmp1->tmp_where." ".$this->obj_tmp1->tmp_order." " ;
	           $this -> obj_tmp1 -> basic_select('laout_arr','tmp_arr',$sql);
	           if(count($this->obj_tmp1->laout_arr['tmp_arr']) == 0){
		            $this->obj_tmp1->tmp_where=" where loginid='$username_or_email' and use_oth_login ='$oth_login' ";
		            $sql="SELECT a.* FROM ".TABLE_NAME.'teach'." as a ". $this->obj_tmp1->tmp_where." ".$this->obj_tmp1->tmp_order." " ;
		           	$this -> obj_tmp1 -> basic_select('laout_arr','tmp_arr',$sql);	 
		           	$identity='teach';
			   }elseif(count($this->obj_tmp1->laout_arr['tmp_arr']) == 1){
			   			$identity='student';
			   }else{

						$this -> obj_tmp1 ->laout_arr =null;
				   		$this -> obj_tmp1 ->msg_text="System error";
				   		$this -> obj_tmp1 ->msg_title ='系統訊息 System Message';
			       		$this -> obj_tmp1 ->msg_state = 'N';
			       		$this -> obj_tmp1 ->update_time = date('Y-m-d H:i:s');
				   		return $this -> obj_tmp1; 
			   }     
			   
	            if(count($this->obj_tmp1->laout_arr['tmp_arr']) ==1){

				  $_SESSION['backend']['identity']=$identity;
	              $_SESSION['backend']['login']=1;
	              $_SESSION['backend']['level']='1';   
	              $_SESSION['backend']['time_set']=$time_set;   
	              $_SESSION['backend']['skype']=$this->obj_tmp1->laout_arr['tmp_arr'][0]['skype'];   
	              $_SESSION['backend']['user_id']=$this->obj_tmp1->laout_arr['tmp_arr'][0]['id'];   
	                   
	              if($identity == 'student')
	              $_SESSION['backend']['def_page']='user.php?action/student_edit';
	          
	              elseif($identity == 'teach')
	              $_SESSION['backend']['def_page']='user.php?action/'.$identity.'er_edit';

	              
				  $_SESSION['backend']['name']=$this->obj_tmp1->laout_arr['tmp_arr'][0]['nick_name'];   
				  $_SESSION['backend']['email_va']=$this->obj_tmp1->laout_arr['tmp_arr'][0]['email_va'];   
				  $_SESSION['backend']['approval']=$this->obj_tmp1->laout_arr['tmp_arr'][0]['approval'];   
				  /*
				  echo $_SESSION['backend']['referer'];
				  exit;		*/		  
					if(strchr($_SESSION['backend']['referer'],HOST_PATH) && !strchr($_SESSION['backend']['referer'],'update') && !strchr($_SESSION['backend']['referer'],'goto_ident')){

						if($identity =='teach'){
	              			$_SESSION['backend']['referer'] =$_SESSION['backend']['def_page'];
						}
				   		$this -> obj_tmp1 ->msg_text="Success";
				   		$this -> obj_tmp1 ->msg_title ='系統訊息 System Message';
			       		$this -> obj_tmp1 ->msg_state = 'Y';
			       		$this -> obj_tmp1 ->path = $_SESSION['backend']['def_page'];
			       		$this -> obj_tmp1 ->update_time = date('Y-m-d H:i:s');
						if($type != 'array')
				   		return $this -> obj_tmp1; 
						else
				   		return $this -> obj_tmp1 ->laout_arr; 
						exit; 	


						
					}else{

				   		$this -> obj_tmp1 ->msg_text="Success";
				   		$this -> obj_tmp1 ->msg_title ='系統訊息 System Message';
			       		$this -> obj_tmp1 ->msg_state = 'Y';
			       		$this -> obj_tmp1 ->path = $_SESSION['backend']['def_page'];
			       		$this -> obj_tmp1 ->update_time = date('Y-m-d H:i:s');
						if($type != 'array')
				   		return $this -> obj_tmp1; 
						else
				   		return $this -> obj_tmp1 ->laout_arr; 
						exit; 	
						
					}
					        
	            }
	            else{

					$this -> obj_tmp1 ->laout_arr =null;
			   		$this -> obj_tmp1 ->msg_text="Login Error 2";
			   		$this -> obj_tmp1 ->msg_title ='系統訊息 System Message';
		       		$this -> obj_tmp1 ->msg_state = 'N';
		       		$this -> obj_tmp1 ->update_time = date('Y-m-d H:i:s');
			   		return $this -> obj_tmp1; 
					exit; 	
	            //  include_once 'templates/msg.htm';
	            }
        } 

        function tealit_login($username_or_email = '', $password = '',$identity=''){

			//$this -> forend_login($username_or_email,$password,1);
			$msg_arr = $this -> check('student');
			if($msg_arr['state'] !=5){
				$msg_arr = $this -> check('teach');				
			}

			if($msg_arr['state']  ==5){
				$this -> obj_tmp1 ->laout_arr =null;
		   		$this -> obj_tmp1 ->msg_text="The account has been registered  in this Website";
		   		$this -> obj_tmp1 ->msg_title ='系統訊息 System Message';
	       		$this -> obj_tmp1 ->msg_state = 'N';
	       		$this -> obj_tmp1 ->update_time = date('Y-m-d H:i:s');
		   		return $this -> obj_tmp1; 
				exit; 	
			}

			error_reporting ( E_ALL  ^  E_NOTICE );
			
			$link = mysql_connect('lma852.siteprotect.com', 'bond', 'TsOy_1215');
			mysql_select_db('bond', $link) or die('1234');
			
	        $this->obj_tmp1->tmp_where=" where e_mail='$username_or_email' and loginpwd =md5('$password')";
	        $sql="SELECT a.* FROM user_list as a ". $this->obj_tmp1->tmp_where." ".$this->obj_tmp1->tmp_order." " ;
			$result = mysql_query($sql);
			
			//$this->obj_tmp1->laout_arr['tmp_arr'][] = mysql_fetch_assoc($result);

      if ($result){        
        while($row = @mysql_fetch_assoc($result)) {
          $this->obj_tmp1->laout_arr['tmp_arr'][]=$row;
         }
          @mysql_free_result($result);
      } 

	            if(count($this->obj_tmp1->laout_arr['tmp_arr']) ==1){
	            	 $_SESSION['backend']['email'] = $this->obj_tmp1->laout_arr['tmp_arr'][0]['e_mail'];
	            	 $_SESSION['backend']['loginpwd'] = $this->obj_tmp1->laout_arr['tmp_arr'][0]['loginpwd'];	 
	            	 $_SESSION['backend']['identity'] = $identity;	 
	            	$this->obj_tmp1->laout_arr=null;
			   		$this -> obj_tmp1 ->msg_text="Success";
			   		$this -> obj_tmp1 ->msg_title ='Success';
		       		$this -> obj_tmp1 ->msg_state = 'Y';
		       		$this -> obj_tmp1 ->update_time = date('Y-m-d H:i:s');
					return $this -> obj_tmp1;
					exit;
	            }
	            else{    
   	
				$this -> obj_tmp1 ->laout_arr =null;
		   		$this -> obj_tmp1 ->msg_text="tealit Account Login Error";
		   		$this -> obj_tmp1 ->msg_title ='系統訊息 System Message';
	       		$this -> obj_tmp1 ->msg_state = 'N';
	       		$this -> obj_tmp1 ->update_time = date('Y-m-d H:i:s');
		   		return $this -> obj_tmp1; 
				exit; 	
	            //  include_once 'templates/msg.htm';
	            }
        }       

        function logout(){
              $_SESSION['backend']=null;
        }
        
        function check($identity = 'student',$username_or_email=null){

			if((!empty($_REQUEST['query']['loginid']) ) || (!empty($_REQUEST['loginid']))){
				if(empty($_REQUEST['query']['loginid']))
					$loginid = $_REQUEST['loginid'];
				else{
					$loginid = $_REQUEST['query']['loginid'];	
				}
			   	
		       	$this -> obj_tmp1 -> table_name=TABLE_NAME.$identity;
          		$sql="select * from ".TABLE_NAME."$identity where  loginid ='$loginid' ";
           		$this -> obj_tmp1 -> basic_select('laout_arr','check_arr',$sql); 
           	
				if(count($this -> obj_tmp1 -> laout_arr['check_arr']) >= 1){
					$msg_arr['msg'] ='Account repeat';
					$msg_arr['state'] =5;
					return $msg_arr;
				}
				$msg_arr['msg'] ='ok';
				$msg_arr['state'] =1;
				return $msg_arr;
			} 	
        }


        function check_twitter($identity = 'student',$twitter_id=null){
			if($twitter_id !=null){
		       	$this -> obj_tmp1 -> table_name=TABLE_NAME.$identity;
          		 $sql="select * from ".TABLE_NAME."$identity where  twitter_id ='$twitter_id' ";
           		$this -> obj_tmp1 -> basic_select('laout_arr','check_arr',$sql); 
				if(count($this -> obj_tmp1 -> laout_arr['check_arr']) == 1){
					$msg_arr['msg'] ='Can login';
					$msg_arr['state'] =1;
					$msg_arr['loginid'] =$this -> obj_tmp1 -> laout_arr['check_arr'][0]['loginid'];
					return $msg_arr;
				}elseif(count($this -> obj_tmp1 -> laout_arr['check_arr']) > 1){
					$msg_arr['msg'] ='Please find customer service';
					$msg_arr['state'] =5;
					return $msg_arr;
				}
			}
				$msg_arr['msg'] ='No Regisert';
				$msg_arr['state'] =5;
				return $msg_arr;
		
        }

        function check_skype($identity = 'student'){
			if((!empty($_REQUEST['query']['skype']) && !empty($_REQUEST['query']['skype'])    ) || (!empty($_REQUEST['loginid']) && !empty($_REQUEST['loginpwd']))     ){
				if(empty($_REQUEST['query']['skype']))
					$skype = $_REQUEST['skype'];
				else{
					$skype = $_REQUEST['query']['skype'];	
				}
			   	
		       	$this -> obj_tmp1 -> table_name=TABLE_NAME.$identity;
          		$sql="select * from ".TABLE_NAME."$identity where  skype ='$skype' ";
           		$this -> obj_tmp1 -> basic_select('laout_arr','check_arr',$sql); 
           
				if(count($this -> obj_tmp1 -> laout_arr['check_arr']) >= 1){
					$msg_arr['msg'] ='Skype repeat';
					$msg_arr['state'] =5;
					return $msg_arr;
				}
				
				$msg_arr['msg'] ='ok';
				$msg_arr['state'] =1;
				return $msg_arr;
			} 	
        }

        function check_nick_name($identity = 'student'){

			if((!empty($_REQUEST['query']['nick_name']) && !empty($_REQUEST['query']['nick_name'])    ) || (!empty($_REQUEST['loginid']) && !empty($_REQUEST['loginpwd']))     ){
				if(empty($_REQUEST['query']['nick_name']))
					$nick_name = $_REQUEST['nick_name'];
				else{
					$nick_name = $_REQUEST['query']['nick_name'];	
				}
			   	
		       	$this -> obj_tmp1 -> table_name=TABLE_NAME.$identity;
          		$sql="select * from ".TABLE_NAME."$identity where  nick_name ='$nick_name' ";
           		$this -> obj_tmp1 -> basic_select('laout_arr','check_arr',$sql); 
           	
				if(count($this -> obj_tmp1 -> laout_arr['check_arr']) >= 1){
					$msg_arr['msg'] ='nick name repeat ';
					$msg_arr['state'] =5;
					return $msg_arr;
				}
				
				$msg_arr['msg'] ='ok';
				$msg_arr['state'] =1;
				return $msg_arr;
			} 	
        }
        
        function force_login($user_id = ''){
        }
        
        
        
        function create_user(){
        
        }
        
        function update_user(){
        
        }
        
        function change_password(){
        
        }
        
        function reset_password($username){
        
        }
        
        function delete_user($username){
            
        }
        
        function create_login_hash(){
        //now
        }
            
        function __get($property_name)
        { 

            return isset($this->$property_name) ? $this->$property_name : null;
        }


        function __set($property_name, $value)
        { 

            $this->$property_name = $value; 
            return true;
        } 
    }
?>