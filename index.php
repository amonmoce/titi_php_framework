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
        //send the name of this class to view its template
        $this->controller->view(get_class($this));
    }
    function event(){
        $data = $this->data_model->event();
        $this->controller->response($data);
        //$this->controller->view(get_class($this), $data);
    }
    function event_result(){
        $data = $this->data_model->event_result();
        //$this->controller->response($data);
        $this->controller->view(get_class($this), $data);
    }
}

if (class_exists(index)){
    $start_classes =new index();
}
