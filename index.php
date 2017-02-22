<?php
include_once 'configs/config.php';
use components\model\index_model;

class index extends dispatcher {

    function __construct(){ 	
        $this->data_model = new index_model();
        parent::__construct();
    }    

    function index(){
        // get some data from data source
        //$data = $this->data_model->index();
		//send only some data
        //$this->controller->response($data);
        // get the html template
        $template = get_class($this);
        //send view
        $this->controller->view($template);
    }

}

if (class_exists(index)){
    $start_classes =new index();
}
