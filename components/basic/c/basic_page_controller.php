<?php
namespace components\basic\c;

use components\basic\URLRewrite;

class  Basic_page_controller{

    function __construct(){
        $ReURL = new URLRewrite();
        $ReURL->ParseUrl();
    }
 
    function __destruct(){
    }

    function response($data){
        echo json_encode($data);
    }
}