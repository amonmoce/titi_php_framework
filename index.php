<?php
include_once 'include/main.php';
use classes\model\index_model;

class index extends default_list {

    function __construct(){ 	
        //$this->db_model = new index_model();
        parent::__construct();
    }    

    function view_list(){
		$data;
		$this->controller->response($data);
    } 


}
include_once dirname(__FILE__).'/include/footer.php';
?>

