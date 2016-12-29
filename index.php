<?php
include_once 'include/main.php';
use components\model\index_model;

class index extends dispatcher {

    function __construct(){ 	
        //$this->db_model = new index_model();
        parent::__construct();
    }    

    function index(){
        $data['reply'] = 'yes';
		$this->controller->response($data);
    }


}

if (class_exists(index)){
    $start_classes =new index();
}
