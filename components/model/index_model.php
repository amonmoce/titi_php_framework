<?php

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

	function event_result(){
		// Taking data from data source (here database)
		$sql = "select name, cel, code, store, time from users";
		$this->model->basic_select('data', 'users', $sql);
		// End taking data
		return $this -> model-> data;
	}

	function event(){
		$code = "A12-3243432";
		$sql = "insert into users (name, cel, code, store)
				values ('".urldecode($_REQUEST['name'])."', '".urldecode($_REQUEST['cel'])."', '".$code."', '".urldecode($_REQUEST['store'])."')";
		$this->model->basic_sql_run($sql);
		//$this -> model-> data["result"] = 0;
		$this -> model-> data["code"] = $code;
		$this -> model-> data["barcode_img"] = "sajdksa.jpg";
		return $this -> model-> data;
	}
}
