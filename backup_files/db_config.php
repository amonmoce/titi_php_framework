<?php
error_reporting ( E_ALL  ^  E_NOTICE );
$linki = mysqli_connect('localhost', 'root', '0000');
mysqli_select_db($linki,'tiehua') or die('1234');
define ("PAGE_NAME", basename($_SERVER['PHP_SELF'],'.php'));
define ("FILE_PATH", dirname($_SERVER['PHP_SELF']));
define ("FILE_REAL_PATH", dirname($_SERVER['SCRIPT_FILENAME']));
define ("ROOT_PATH", $_SERVER['DOCUMENT_ROOT']);
define ("SITE_DIR", '/tealit_api');
	if(!empty($_SERVER['DOCUMENT_ROOT'])){
		define ("SITE_PATH", ROOT_PATH.SITE_DIR);	
	}else{
		define ("SITE_PATH", "D:/UniServerZ/www".SITE_DIR);		
	}
	//echo SITE_PATH;
	//exit;
if(!empty($_SERVER['HTTP_HOST'])){
	define ("HOST_PATH", 'http://'.$_SERVER['HTTP_HOST'].SITE_DIR);
}else{
	define ("HOST_PATH", 'http://'.'talk.com'.SITE_DIR);
	
}	
/*echo HOST_PATH;
exit;*/

date_default_timezone_set("Asia/Taipei");
$tmp_subfix = explode("_", PAGE_NAME);
define ("PAGE_FIRST_NAME",$tmp_subfix[0]);
define ("TABLE_NAME",'tch_');

mysqli_query($linki,'SET NAMES utf8');
mysqli_query($linki,'SET CHARACTER_SET_CLIENT=utf8');
mysqli_query($linki,'SET CHARACTER_SET_RESULTS=utf8');

?>
