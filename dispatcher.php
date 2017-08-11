<?php
use components\basic\c\basic_page_controller;

class dispatcher {
    protected $action;

    function __construct(){
        $this -> controller = new basic_page_controller();
      
        $action_switch = laout_check($_REQUEST['action']);
      
        switch ($action_switch) {
            case 'event_result':
                $this->event_result();
                break;   
            case 'event':
                $this->event();
                break;
            default:                       
                $this->index();
                break;
        }   
 
    }   

}

