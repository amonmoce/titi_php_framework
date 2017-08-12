<?php
define ("PAGE_NAME", basename($_SERVER['PHP_SELF'],'.php'));
define ("FILE_PATH", dirname($_SERVER['PHP_SELF']));
define ("FILE_REAL_PATH", dirname($_SERVER['SCRIPT_FILENAME']));
define ("ROOT_PATH", $_SERVER['DOCUMENT_ROOT']);
define ("SITE_DIR", '/zakafrica_api');
if(!empty($_SERVER['DOCUMENT_ROOT'])){
		define ("SITE_PATH", ROOT_PATH.SITE_DIR);
}else{
	define ("SITE_PATH", "C:/UniServerZ/www".SITE_DIR);
}
if(!empty($_SERVER['HTTP_HOST'])){
	define ("HOST_PATH", 'http://'.$_SERVER['HTTP_HOST'].SITE_DIR);
}
