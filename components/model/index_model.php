<?php
//定義這個class 在那一個範圍內
namespace components\model;
use components\basic\m\basic_page_model;

class  index_model {
	
	function __construct(){
		$this -> model = new basic_page_model();
	}

	function __destruct(){

	}               

	function index(){
		// Taking data from data source (here database)
		$sql = "select * from article";
		$this->model->basic_select('data', 'article', $sql);
		// End taking data
		return $this -> model-> data;
	}

}