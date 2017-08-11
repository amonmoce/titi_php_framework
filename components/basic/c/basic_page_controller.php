<?php
namespace components\basic\c;

use components\basic\URLRewrite;

class  basic_page_controller{

    function __construct(){
        $ReURL = new URLRewrite();
        $ReURL->ParseUrl();
    }
 
    function __destruct(){
    }

    function response($data){
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    function view($template, $data=null){
        $this->data = $data;
        $this->template = $template;
        include_once 'templates/layout.html.php';
    }
}