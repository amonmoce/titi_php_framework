<?php
namespace components\basic\m;

class  basic_page_model{
    // protected $table_name;
    // protected $tmp_where;
    // protected $tmp_order ='order by id asc';
    // protected $tmp_id;

    function __construct(){
	    $this->linki = $GLOBALS['linki'];
    }
    
    function __destruct(){

    }    
  
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

    }
  //end basic_select   

    function basic_sql_run($tmp_sql,$debug='off'){ 
       
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
//     //把tmp_array的放到指定的obj_array 裡 $this->[參數1][參數2][參數4]

//     function basic_array_set($arr_name,$arr_key,$tmp_variable,$arr_subkey='',$debug='off'){
//       if($arr_subkey =='')
//         $this->{$arr_name}[$arr_key][]=$tmp_variable;
//       else
//         $this->{$arr_name}[$arr_key][$arr_subkey]=$tmp_variable;

//       if($debug!='off'){
//         $this->obj_debug($debug,$tmp_sql,$this->{$arr_name}[$arr_key]);
//       }
//     }
//     //  將物件屬性組合成sql執行
//     function edit_update($query_arr,$debug='off'){
//      // $this->form_valid($query_arr);
//       $col_var=html_col_var('update',$query_arr);
//       //echo $tmp_sql="update $this->table_name set ".implode(", ",$col_var['var'])." $this->tmp_where ;";
//       //exit;
//       $tmp_sql="update $this->table_name set ".implode(", ",$col_var['var'])." $this->tmp_where ;";
      

//       if($debug!='off'){
//         $this->obj_debug($debug,$tmp_sql,$this->{$arr_name}[$arr_key]);
//       }elseif($this->log_set ==TRUE){
// 	  	$this->log($tmp_sql,__FUNCTION__,__METHOD__);
// 	  } 
    
//       if($this->laout_set== false){
//         if(mysqli_query($this->linki,$tmp_sql))
//           echo "<script language=\"javascript\">location.href='".PAGE_NAME.".php';</script>";
//         }
//         else{
//         if(mysqli_query($this->linki,$tmp_sql))
//           return true;
//         }           
//     }   


//     //  將物件屬性組合成sql執行
//     function insert_update($query_arr,$debug='off'){
//       //$this->form_valid($query_arr);
//       $col_var=html_col_var('insert',$query_arr);
//       //echo $tmp_sql="INSERT INTO `$this->table_name` ( ".implode(', ',$col_var['col'])." ) values ( ".implode(", ",$col_var['var'])." );";   
//       //exit;
//       $tmp_sql="INSERT INTO `$this->table_name` ( ".implode(', ',$col_var['col'])." ) values ( ".implode(", ",$col_var['var'])." );";   
      
//       if($debug!='off'){
//         $this->obj_debug($debug,$tmp_sql,$this->{$arr_name}[$arr_key]);
//       }elseif($this->log_set ==TRUE){
//       	if($this->table_name !='tch_student_log' && $this->table_name !='tch_teach_log' && $this->table_name !='tch_non_user_log' ){
// 			$this->log($tmp_sql,__FUNCTION__,__METHOD__);
//       }
//       }  
   
   
//       if($this->laout_set== false){
//         if(mysqli_query($this->linki,$tmp_sql))
//           echo "<script language=\"javascript\">location.href='".PAGE_NAME.".php';</script>";
//         }
//         else{
//         if(mysqli_query($this->linki,$tmp_sql))
//           return true;
//         }  
//     }
    
//     function delete_update($debug='off'){  
//       $tmp_sql="delete from $this->table_name  $this->tmp_where ;";
//       if($debug!='off'){
//         $this->obj_debug($debug,$tmp_sql,$this->{$arr_name}[$arr_key]);
//       }elseif($this->log_set ==TRUE){
// 	  	$this->log($tmp_sql,__FUNCTION__,__METHOD__);
// 	  } 
  
//     } 
    


}


?>