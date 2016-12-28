<?php
//pubic func  
function action_counter($action){

  $url_log=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
  $action_visitor_where=null;
  if (!isset($_SESSION['ssion']['visitor_counter'])) {
      $_SESSION['ssion']['visitor_counter']=1;
      $visitor_counter=$_SESSION['ssion']['visitor_counter'];
      $action_visitor_where=" || action='visitor'";
    }
    
  $action_counter_sql="select * from action_counter where action='$action'";
  $result = mysql_query($action_counter_sql);
  $num_rows = mysql_num_rows($result);
  if($num_rows>=1){
    $action_counter_sql="update action_counter set counter=counter+1 , url_log='$url_log' where action='$action' || action='pageview' $action_visitor_where";
    mysql_query($action_counter_sql);
  }
  else{
    $action_counter_sql="INSERT INTO `action_counter` (`id` ,`action` ,`counter`,`url_log`) VALUES (null, '$action', '1','$url_log');";
    mysql_query($action_counter_sql);
    $action_counter_sql="update action_counter set counter=counter+1 ,url_log='$url_log' where action='pageview' $action_visitor_where";
    mysql_query($action_counter_sql);
  }
  mysql_free_result($result);
}
/*
function str_make($tmp_x){
  return mysql_escape_string($tmp_x);
}
*/

/*
function laout_check($value)
{
// 去除斜杠
if (get_magic_quotes_gpc())
{
$value = stripslashes($value);
}
// 如果不是数字则加引号
if (!is_numeric($value))
{
  $value =mysql_real_escape_string($value);
}
return $value;
}
*/

function get_counter(){
  $action_counter_sql="select * from action_counter where action='pageview'";
  $result = mysql_query($action_counter_sql);
  while($row = mysql_fetch_assoc($result)) {
    $count=$row['counter'];
    
    return $count;
   } 
}

function getIP ()
{
  global $_SERVER;
  if (getenv('HTTP_CLIENT_IP')) {
  echo $ip = getenv('HTTP_CLIENT_IP');
  exit;
  } else if (getenv('HTTP_X_FORWARDED_FOR')) {
  $ip = getenv('HTTP_X_FORWARDED_FOR');
  } else if (getenv('REMOTE_ADDR')) {
  $ip = getenv('REMOTE_ADDR');
  } else {
  $ip = $_SERVER['REMOTE_ADDR'];
  }
  list($a, $b, $c, $d) = explode('.', $ip);
  $a=(int)$a;  $b=(int)$b;  $c=(int)$c;  $d=(int)$d;
  if($a<=255 && $a>=0 && $b<=255 && $b>=0 && $c<=255 && $c>=0 && $d<=255 && $d>=0)
  $ip="$a.$b.$c.$d";
  else
  $ip=false;
  return $ip;
}

function upload_file_to_fd($first_path,$file_type=null,$old_file_name=null,$w=null,$h=null)
{

if(empty($_FILES)){return "";}
  foreach ($_FILES["file"]["name"] as $key =>&$value) {

    $check_pass=null; //mine是否通過
    $value1=null; 
    $check_type=null; //確認mine副檔名
    $limit_name=null; //副檔名
    $tmp_time=null; //亂數不重複時間亂碼
    $name=null; //命名變數
    if($file_type !=null){
      $check_type=explode(',',$file_type);
      foreach ($check_type as &$value1) {
        if($value1 == $_FILES["file"]["type"][$key] ){
          $check_pass=1;
        }
      }
    }
    else{
      $check_pass=1;
    }
    /*
          echo "Upload: " . $_FILES["file"]["tmp_name"][$key] . "<br />";
          echo "Type: " . $_FILES["file"]["type"][$key] . "<br />";
          echo "Size: " . ($_FILES["file"]["size"][$key] / 1024) . " Kb<br />";
          echo "Temp file: " . $_FILES["file"]["tmp_name"][$key] . "<br />";
           exit;
    */
    if(!empty($_FILES["file"]["tmp_name"][$key]) && $check_pass =='1'){ //確認檔案存在，並且有
          if($w && $h)resizeTo($_FILES["file"]["tmp_name"][$key],$_FILES["file"]["tmp_name"][$key],$w,$h);
    
          if ($_FILES["file"]["error"][$key] > 0){
            echo "Return Code: " . $_FILES["file"]["error"][$key] . "<br />";
          }
          else
          {

          
            //抓取副檔名
            if(substr($_FILES["file"]["name"][$key],-4,4) =='html'){
              $limit_name=substr($_FILES["file"]["name"][0],-5,5);
            }
            else{
              $limit_name=substr($_FILES["file"]["name"][0],-4,4);
            }
            //end 抓取副檔名
            
            //避開exe 檔
            if($limit_name =='exe'){
              echo "error,don't upload .exe";
            }
            //end 避開exe 檔
            $tmp_time=uniqid(PAGE_NAME.'_'); 
            $name=$tmp_time.$limit_name;
            $first_path;
            if(file_exists($first_path)){
              //確認檔案是否有重複
              while(file_exists($first_path.$name)){
                $tmp_time=uniqid(PAGE_NAME.'_'); 
                $name=$tmp_time.$limit_name;
              }
              //end  確認檔案是否有重複

              if(@move_uploaded_file($_FILES["file"]["tmp_name"][$key],"$first_path".$name)){

                //刪除update之前的圖片
                if($old_file_name[$key] !=null){
                    @unlink($first_path."$old_file_name[$key]");
                  }
                //end  刪除update之前的圖片
                $x[$key]=$name;
              } 
            }
            else{
              //新增資料夾
              @mkdir($first_path, 0700);
              //end  新增資料夾
            }
                 
           // echo "Stored in: " . "upload/$first_name/" . $name; 
          }
    }
    else{

      return "";
    }
  }
  return $x;
}

//for 前台
function upload_file_to_fd_fontend($first_path,$file_type=null,$old_file_name=null,$w=null,$h=null)
{
if(empty($_FILES)){return "";}
  foreach ($_FILES["file"]["name"] as $key =>&$value) {
	if($key ==0){
		;
	}
	else{
		;
		$after_path = 'sml/';		
	}
    $check_pass=null; //mine是否通過
    $value1=null; 
    $check_type=null; //確認mine副檔名
    $limit_name=null; //副檔名
    $tmp_time=null; //亂數不重複時間亂碼
    $name=null; //命名變數
    if($file_type !=null){
      $check_type=explode(',',$file_type);
      foreach ($check_type as &$value1) {
        if($value1 == $_FILES["file"]["type"][$key]){
          $check_pass=1;
        }
      }
    }
    else{
      $check_pass=1;
    }
    /*
          echo "Upload: " . $_FILES["file"]["tmp_name"][$key] . "<br />";
          echo "Type: " . $_FILES["file"]["type"][$key] . "<br />";
          echo "Size: " . ($_FILES["file"]["size"][$key] / 1024) . " Kb<br />";
          echo "Temp file: " . $_FILES["file"]["tmp_name"][$key] . "<br />";
           exit;
    */
    if(!empty($_FILES["file"]["tmp_name"][$key]) && $check_pass =='1'){ //確認檔案存在，並且有
          if($w && $h)resizeTo($_FILES["file"]["tmp_name"][$key],$_FILES["file"]["tmp_name"][$key],$w,$h);
    
          if ($_FILES["file"]["error"][$key] > 0){
            echo "Return Code: " . $_FILES["file"]["error"][$key] . "<br />";
          }
          else
          {

          
            //抓取副檔名
            if(substr($_FILES["file"]["name"][$key],-4,4) =='html'){
              $limit_name=substr($_FILES["file"]["name"][0],-5,5);
            }
            else{
              $limit_name=substr($_FILES["file"]["name"][0],-4,4);
            }
            //end 抓取副檔名
            
            //避開exe 檔
            if($limit_name =='exe'){
              echo "error,don't upload .exe";
            }
            //end 避開exe 檔
            $tmp_time=uniqid(PAGE_NAME.'_'); 
            $name=$tmp_time.$limit_name;
            $first_path =$first_path.$after_path;
            if(file_exists($first_path)){
              //確認檔案是否有重複
              while(file_exists($first_path.$name)){
                $tmp_time=uniqid(PAGE_NAME.'_'); 
                $name=$tmp_time.$limit_name;
              }
              //end  確認檔案是否有重複
              
	
              if(copy($_FILES["file"]["tmp_name"][$key],"$first_path".$name)){

                //刪除update之前的圖片
                if($old_file_name[$key] !=null){
                    @unlink($first_path."$old_file_name[$key]");
                  }
                //end  刪除update之前的圖片
                $x[$key]=$name;
              } 
              
				$after_path = 'sml/';	
            	$first_path =$first_path.$after_path;
				resizeTo($_FILES["file"]["tmp_name"][$key],$_FILES["file"]["tmp_name"][$key],'87','87');
				
              if(@move_uploaded_file($_FILES["file"]["tmp_name"][$key],"$first_path".$name)){
                //刪除update之前的圖片
                if($old_file_name[$key] !=null){
                    @unlink($first_path."$old_file_name[$key]");
                  }
                //end  刪除update之前的圖片
                $x[$key]=$name;
              }  
            }
            else{
              //新增資料夾
              @mkdir($first_path, 0700);
              //end  新增資料夾
            }
                 
           // echo "Stored in: " . "upload/$first_name/" . $name; 
          }
    }
    else{

      return "";
    }
  }
  return $x;
}


function laout_check($str_arr=null){
  $linki = $GLOBALS['linki'];
  if(is_array($str_arr)){
    foreach ($str_arr as $key=>$value){
      $str_arr[$key]=htmlspecialchars($value);
	  $str_arr[$key]=stripslashes($value);
      $str_arr[$key]=mysqli_real_escape_string($linki,$value);
    }
  }
  elseif(!is_null($str_arr) ){ 
      $str_arr=htmlspecialchars($str_arr);
	  $str_arr=stripslashes($str_arr);
      $str_arr=mysqli_real_escape_string($linki,$str_arr);      
  }
  else{
    $str_arr=null;
  }
return $str_arr;
}

function index_counter(){
  $index_counter_sql="SELECT * FROM `action_counter` where action='pageview'";
  $result=mysql_query($index_counter_sql);
  while($row = mysql_fetch_assoc($result)) {
    $index_counter_arr[]=$row;
   }
   return $index_counter_arr;
}

function check_pree($str_arr=null){
 //form is posted
    //function 
      include("secur/securimage.php");
      $img = new Securimage();
      $valid = $img->check($_POST['code']);
    
      if($valid != true) {
      $msg_tmp='Sorry, the code you entered was invalid.';
      //laout
        $msg_arr['msg']=$msg_tmp;
      //end laout
      include_once 'templates/message.htm';
        exit;
      }
    //function//
}

function admin_check_pree($str_arr=null){
 //form is posted
    //function 
      include("../secur/securimage.php");
      $img = new Securimage();
      $valid = $img->check($_POST['code']);
    
      if($valid != true) {
        echo "<center>Sorry, the code you entered was invalid.";
        exit;
      }
    //function//
}

function resizeTo($filename,$to=null,$w,$h)
{
/*echo 1234;
exit;*/
    $size = getimagesize($filename);
   $width=$size['0']>=$w?$w:$size['0'];
   $height=$size['1']>=$h?$h:$size['1'];
   
    $image_p = imagecreatetruecolor($width, $height);
    switch($size[2])
    {
        case 1:
            $func = 'imagecreatefromgif';
            $func2 = 'imagegif';
            break;
        case 2:
            $func = 'imagecreatefromjpeg';
            $func2 = 'imagejpeg';
            break;
        case 3:
            $func = 'imagecreatefrompng';
            $func2 = 'imagepng';
            break;
    }
    $image = $func($filename);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
    //header("content-type: image/jpeg");
    $func2($image_p,$to);
}

function MultiValuedInOne($tmp_arr)
{
        if(isset($tmp_arr))foreach($tmp_arr as $key =>$value){
          if($key==0){
            $tmp_x=$value;
          }
          else{
            $tmp_x="$tmp_x,$value";
          }
        }

        return $tmp_x;

}

function MultiTxtdInOne($retun_arr,$text_arr)
{
        if(isset($retun_arr))foreach($retun_arr as $key =>$value){
           foreach($text_arr as $key1 =>$value1){
                if($value1['id'] ==$value){
              if($key==0){
                $retun_x=$value1['name'];
                }
                else{
                  $retun_x="$retun_x,$value1[name]";
                }
            }   
        }
      }


        return $retun_x;

}


function Who_Own($tmp_x,$tmp_y,$msg="你不是原始發布者，請重新登入",$go_to="<br /> <a href='javascript:history.go(-1)' /> 返回</a>")
{
  if($tmp_x !=  $tmp_y){
  include_once 'templates/msg_who_own.htm';
  exit;
  }
}

     function httprequest($url, $ispost = FALSE, $postparams = array())
    {
        $result = '';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $url);
        if ($ispost)
        {
            curl_setopt($ch, CURLOPT_POST, true); // 啟用POST

            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $postparams ));
        }
        
        $result = curl_exec($ch);
        
        curl_close($ch);
        
        return $result;
    }


function pub_vote_arr(){
      $order='order by a.id asc '; 
      $tmp_sql="SELECT a. * , if( b.rows >0, b.rows+37, 0+37) as rows 
FROM pub_vote AS a
LEFT JOIN (

SELECT count( pub_vote_id ) AS
ROWS , pub_vote_id
FROM pub_vote_log where true_mail ='1'
GROUP BY pub_vote_id
) AS b ON a.id = b.pub_vote_id
  $order ";
      $result=mysql_query($tmp_sql);
      while($row = mysql_fetch_assoc($result)) {
        $tmp_arr[]=$row;
       }
       return $tmp_arr;

}

function pub_vote_insert($id,$local_ip,$email){
$mdate=date("Y-m-d H:i:s",strtotime('now'));
$check_day=date("Y-m-d",strtotime('now'));
$check_day2=date("Y-m-d",strtotime('now +1day'));

       $tmp_sql="SELECT * FROM `pub_vote_user`   where email ='$email'";
      $result=mysql_query($tmp_sql);
      $num_rows = mysql_num_rows($result);
      
$e_code= substr(md5($email.rand()),0,5);          
    
$tmp_sql="INSERT INTO `pub_vote_log` 
(`id` ,`ip` ,`pub_vote_id` ,`vote_datetime`,`email`,e_code,true_mail )
VALUES ('', '$local_ip', '$id', '$mdate','$email','$e_code',0); ";
$e_code_url="你的email 驗證網址為 \r\n http://badefun.com.tw/index.php?action=index_preview&webpage=stack_vote_email_vote&e_code=$e_code ";
mysql_query($tmp_sql);
mail("$email","八德意象設計票選驗證碼",$e_code_url );

/*
      if(mysql_query($tmp_sql)){
        $tmp_sql="update  pub_vote set vote_count=vote_count+1 where id ='$id'";
      if(mysql_query($tmp_sql)){
        echo "投票成功";
        exit;
        }
    }
    */


      // return $tmp_arr;

}


function pub_vote_check($id,$local_ip){
$mdate=date("Y-m-d H:i:s",strtotime('now'));
$check_day=date("Y-m-d",strtotime('now'));
$check_day2=date("Y-m-d",strtotime('now +1day'));
$tmp_sql="select * from pub_vote_log where email ='$email' and true_mail='1' and vote_datetime  between '$check_day' and '$check_day2'  ";
$result=mysql_query($tmp_sql);
$num_rows = mysql_num_rows($result);
if($num_rows >=2){ 
  $msg="你今天已經投超過兩次了";
  include_once 'templates/msg.htm';
exit;}
      // return $tmp_arr;

}

    
function strip_tags_array($array,$key){
      foreach ($array as  $key1=> $value1 ){
      if(!is_array($value1)){
        $_REQUEST[$key][$key1]=strip_tags($value1);
       }
       else{
        strip_tags_array($value1,$key1);
       }   
  }
   
}


//end pubic func
?>
