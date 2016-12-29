<?php
namespace classes\basic\m;
//obj_debug 使用方式 
/*
$this->obj_debug($debug='off',$tmp_sql='',$query_arr=''); 預設為不執行 debug =off, sql='' , query_array='' 
$this->obj_debug($debug='sql',$tmp_sql,$query_arr=''); 輸出sql
$this->obj_debug($debug='query_arr',$tmp_sql='',$query_arr); 輸出array


*/
//namespace basic;

class  Basic_page_model{
    protected $table_name;
    protected $tmp_where;
    protected $tmp_order ='order by id asc';
    protected $tmp_id;
    
    protected $log_set=false;
    protected $log_text='';
    protected $log_write='dest';
    //先把log存到一個變數之後在利用父層的解構程式把所有的sql寫入到資料庫   
    public    $func_arr =array();

    function __construct(){
		  $this->linki = $GLOBALS['linki'];
    }
    
    function __destruct(){
    	/*
    	$this->laout_set='dont_change';
    	$this->multi_sql_run($this->linki,$this->log_text);
    	*/
    }    
    
    function app_microtime(){
        return microtime(true);
    }    
    
    //  將物件屬性組合成sql執行後回傳指定物件陣列為 $this->[參數1][參數2]
    //dd
    function tmp_select($arr_name='laout_arr',$arr_key='tmp_arr',$debug='off'){
      $tmp_sql='SELECT * FROM '.$this->table_name.'   '.$this->tmp_where.'  '.$this->tmp_order; 
      $result=mysqli_query($this->linki,$tmp_sql);
      if ($result){        
        while($row = @mysqli_fetch_assoc($result)) {
          $this->{$arr_name}[$arr_key][]=$row;
         }
          @mysqli_free_result($result);
      }         
      
      if($debug!='off'){
        $this->obj_debug($debug,$tmp_sql,$this->{$arr_name}[$arr_key]);
      }elseif($this->log_set ==TRUE){
	  	$this->log($tmp_sql,__FUNCTION__,__METHOD__);
	  }               
               
    }   
  
 //  $basic_sql='select * from news order by id asc ';
 //  $obj_tmp1->tmp_select('tmp_arr',$basic_sql);
 //  執行sql回傳指定物件陣列為 $this->[參數1][參數2][參數4]

    function basic_select($arr_name,$arr_key,$tmp_sql,$arr_subkey='',$debug='off'){
      $result=mysqli_query($this->linki,$tmp_sql);
      if($result){
        while($row = @mysqli_fetch_assoc($result)) {
            if($arr_subkey =='')
              $this->{$arr_name}[$arr_key][]=$row;
            else
              $this->{$arr_name}[$arr_key][$arr_subkey]=$row;
            }
          @mysqli_free_result($result);            
        }
 
      if($debug!='off'){
        $this->obj_debug($debug,$tmp_sql,$this->{$arr_name}[$arr_key]);
      }elseif($this->log_set ==TRUE){
	  	$this->log($tmp_sql,__FUNCTION__,__METHOD__);
	  }       
      
      
    }
  //end basic_select   

    //單純執行sql，沒有回傳
    //dd
    function basic_sql_run($tmp_sql,$debug='off'){ 
      if($debug!='off'){
        $this->obj_debug($debug,$tmp_sql,$this->{$arr_name}[$arr_key]);
      } 

      if($this->laout_set === false){
        if(mysqli_query($this->linki,$tmp_sql))
          echo "<script language=\"javascript\">location.href='".PAGE_NAME.".php';</script>";
      }
      elseif($this->laout_set === true){
        if(mysqli_query($this->linki,$tmp_sql))
          include_once "templates/".$this->laout_htm;
      }
      else{
        if(mysqli_query($this->linki,$tmp_sql))
          return true;
      } 
            
    }
//end basic_sql_run   



    //單純執行sql，沒有回傳
    //dd
    function multi_sql_run($linki,$tmp_sql,$debug='off'){  
      if($debug!='off'){
        $this->obj_debug($debug,$tmp_sql,$this->{$arr_name}[$arr_key]);
      }

      if($this->laout_set===false){
        if(mysqli_multi_query($this->linki,$tmp_sql))
          echo "<script language=\"javascript\">location.href='".PAGE_NAME.".php';</script>";
      }
      elseif($this->laout_set===true){
        if(mysqli_multi_query($this->linki,$tmp_sql))
          include_once "templates/".$this->laout_htm;
      }
      else{
        if(mysqli_multi_query($this->linki,$tmp_sql))
          return true;
      } 
            
    }
    //end basic_sql_run 
    
    
    
    //把tmp_array的放到指定的obj_array 裡 $this->[參數1][參數2][參數4]

    function basic_array_set($arr_name,$arr_key,$tmp_variable,$arr_subkey='',$debug='off'){
      if($arr_subkey =='')
        $this->{$arr_name}[$arr_key][]=$tmp_variable;
      else
        $this->{$arr_name}[$arr_key][$arr_subkey]=$tmp_variable;

      if($debug!='off'){
        $this->obj_debug($debug,$tmp_sql,$this->{$arr_name}[$arr_key]);
      }
    }
    //  將物件屬性組合成sql執行
    function edit_update($query_arr,$debug='off'){
     // $this->form_valid($query_arr);
      $col_var=html_col_var('update',$query_arr);
      //echo $tmp_sql="update $this->table_name set ".implode(", ",$col_var['var'])." $this->tmp_where ;";
      //exit;
      $tmp_sql="update $this->table_name set ".implode(", ",$col_var['var'])." $this->tmp_where ;";
      

      if($debug!='off'){
        $this->obj_debug($debug,$tmp_sql,$this->{$arr_name}[$arr_key]);
      }elseif($this->log_set ==TRUE){
	  	$this->log($tmp_sql,__FUNCTION__,__METHOD__);
	  } 
    
      if($this->laout_set== false){
        if(mysqli_query($this->linki,$tmp_sql))
          echo "<script language=\"javascript\">location.href='".PAGE_NAME.".php';</script>";
        }
        else{
        if(mysqli_query($this->linki,$tmp_sql))
          return true;
        }           
    }   


    //  將物件屬性組合成sql執行
    function insert_update($query_arr,$debug='off'){
      //$this->form_valid($query_arr);
      $col_var=html_col_var('insert',$query_arr);
      //echo $tmp_sql="INSERT INTO `$this->table_name` ( ".implode(', ',$col_var['col'])." ) values ( ".implode(", ",$col_var['var'])." );";   
      //exit;
      $tmp_sql="INSERT INTO `$this->table_name` ( ".implode(', ',$col_var['col'])." ) values ( ".implode(", ",$col_var['var'])." );";   
      
      if($debug!='off'){
        $this->obj_debug($debug,$tmp_sql,$this->{$arr_name}[$arr_key]);
      }elseif($this->log_set ==TRUE){
      	if($this->table_name !='tch_student_log' && $this->table_name !='tch_teach_log' && $this->table_name !='tch_non_user_log' ){
			$this->log($tmp_sql,__FUNCTION__,__METHOD__);
      }
      }  
   
   
      if($this->laout_set== false){
        if(mysqli_query($this->linki,$tmp_sql))
          echo "<script language=\"javascript\">location.href='".PAGE_NAME.".php';</script>";
        }
        else{
        if(mysqli_query($this->linki,$tmp_sql))
          return true;
        }  
    }
    //  將物件屬性組合成sql執行
    
    //  將物件屬性組合成sql執行
    
    function delete_update($debug='off'){  
      $tmp_sql="delete from $this->table_name  $this->tmp_where ;";
      if($debug!='off'){
        $this->obj_debug($debug,$tmp_sql,$this->{$arr_name}[$arr_key]);
      }elseif($this->log_set ==TRUE){
	  	$this->log($tmp_sql,__FUNCTION__,__METHOD__);
	  } 
  
    } 
    
    //表單md5驗證：只有admin 和本機執行時會寫進資料庫，其他時候就是表單驗證
    //nd
    function form_valid($query_arr,$debug='off'){  //update
        //admin in valid 
      $action=laout_check($_REQUEST['action']);
      if(empty($action)){ $laout=PAGE_NAME.'_preview';$action='preview';}
      else $laout=PAGE_NAME.'_'.$action;
        
      $md5_code=md5(implode(",",array_keys($query_arr)));
      $url=$_SERVER['REQUEST_URI'];
        
      if(getIP() == '127.0.0.1'  || $decode=='sewrw' || $_SESSION[Code]['web_develop'] =='1'){
        $tmp_select_sql="select * from ".TABLE_NAME."form_valid where action='$action' and `url`='$url' and `laout_html`='$laout'";
        $result=mysql_query($tmp_select_sql);
        $num_rows = mysql_num_rows($result);   
          if($num_rows==1){
            $tmp_sql="update form_valid set action='$action', laout_html='$laout', md5='$md5_code',url='$url'";            
            mysql_query($tmp_sql);
          }
          elseif($num_rows==0){
            $tmp_sql="INSERT INTO `form_valid` (`id` ,`action` ,`laout_html`,`md5`,url) VALUES (null, '$action', '$laout','$md5_code','$url');"; 
            mysql_query($tmp_sql);
          }
          else{
            echo $tmp_select_sql;
            echo '<br />同一動作，同一表單，相同md5有兩個';
            exit;
          }
      }
      else{
        //from md5 valid
        $tmp_select_sql="select * from form_valid where action='$action' and md5='$md5_code' and laout_html='$laout'";
        $result=mysql_query($tmp_select_sql);
        $num_rows = mysql_num_rows($result);
          if($num_rows!=1){
            echo '操作錯誤';
            exit;
          }
      }
    }    
    
    //  除錯函數，請看最上方
    function obj_debug($debug='off',$tmp_sql='',$query_arr=''){
      if(getIP() == '127.0.0.1' || getIP() == '61.222.134.204'  || $decode=='sewrw' || $use_admin =='1'){
        if($debug =='sql'){
          echo $tmp_sql;
          exit;
        }
            
        if($debug =='query_arr'){
          echo '<pre>';
          print_r($query_arr);
          echo '</pre>';
          exit;
        }
      }
      
    }
    function log($tmp_sql,$function,$method){
	    if($_SESSION['backend']['identity'] =='admin'){
		        session_destroy();	 
		        header("Location:".PAGE_NAME.'.php' );
	            echo "<script>location.href=".PAGE_NAME."'php';</script>"; 
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
    	$this->table_name = TABLE_NAME.$identity_table;
    	if($this->log_write =='db'){
			$this->insert_update($query_arr);			
		}elseif($this->log_write =='dest'){ //解構子
			$this->insert_update_dest($query_arr);	
		}
		else{
			$this->insert_update_file($query_arr);	
		}
    	$this->table_name = $tmp_table;
    	
    	//exit;
	//$this
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