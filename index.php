<?php
include_once 'configs/config.php';
use components\model\index_model;

class index extends dispatcher {

    function __construct(){ 	
        $this->data_model = new index_model();
        parent::__construct();
    }    

    function index(){
        $data = $this->data_model->index();
		$this->controller->response($data);
    }


}

if (class_exists(index)){
    $start_classes =new index();
}
