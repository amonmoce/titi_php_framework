<?php
namespace classes\basic\c;

class  Basic_page_controller{

    function __construct(){
		  //$this->linki = $GLOBALS['linki'];
    }
 
    function __destruct(){
    }

    function response($data){
      //header('Content-Type: application/json');
      echo json_encode($data);
    }

    // function __get($property_name){
    //     return isset($this->$property_name) ? $this->$property_name : null;
    // }

    // function __set($property_name, $value){
    //     $this->$property_name = $value; 
    //     return true;
    // }

}