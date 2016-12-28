<?php
//會先從檔案的資料夾往內找，找不到才會往外層找
function autoload($className){
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    
    $fileName .= $className . '.php';
    
    include_once $fileName;   
}

spl_autoload_register('autoload');  