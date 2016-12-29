<?php
use components\basic\c\basic_page_controller;

class dispatcher {
    protected $action;

    function __construct(){
        $this -> controller = new basic_page_controller();
      
        //預設輸入資料擷取
        //$action = laout_check($_REQUEST['action']);
        $action_switch = laout_check($_REQUEST['action']);
        //end 預設輸入資料擷取
        
        //end
      
        // $identity = $_SESSION['backend']['identity'];
        // $student_tmp_arr = explode(",","student_edit,student_booking,student_password_edit,edit_update,edit_pw_update,booking_record,student_rate,student_booking_choose,student_lesson_cancel,student_rate_update,student_point_record,buy_product,buy_product_record,buy_order_update,pay_result,open_window_word,open_window_article_link,select_resources,article_update,open_lesson_room,create_room_url,apt_record");
        // $teacher_tmp_arr = explode(",","teacher_edit,teacher_booking_record,teacher_password_edit,can_tutor_time_update,edit_update,can_tutor_time_update,edit_pw_update,can_tutor_time,teacher_lesson_cancel,teacher_dayoff,open_window_word,open_window_article_link,teacher_confirm_lesson,teacher_confirm_lesson_update,teacher_open_lesson_room,teacher_first_edit,teacher_first_edit_update,teacher_training,teacher_request_help,teacher_request_help_sendmail,create_room_url,lesson_word,agree_update,agree,tandsinterface,teach_in_room,teacher_apt_record"); 
        // $nomal_tmp_arr = explode(",","text,register,register_choose,logout,forget,preveiw,search,goto_ident,teacher_list,pay_not_credit_result,wakeup_account,forget_update,reset_password,tealit_login,tealit_login_update,register_tealit_update,register_teacher,check_account,fb_login,twitter_login,twitter_check_account,login,test_room_booking,teacher_open_lesson_room_substitute,take_out_all_9stalk,test_list,faq,request_help,request_help_sendmail,");
        // if($identity == 'student'){

        //     if(!in_array($action_switch,$student_tmp_arr) && !in_array($action_switch,$nomal_tmp_arr)  ){
        //         $_SESSION['backend']=null;
        //         echo "<script>alert('請先登入帳號 Please sign in'); location.href='user.php';</script>";
        //         exit;				
        //     }
        // }
        // elseif($identity == 'teach'){
        //     if(!in_array($action_switch,$teacher_tmp_arr) && !in_array($action_switch,$nomal_tmp_arr)){
        //         $_SESSION['backend']=null;
        //         echo "<script>alert('請先登入帳號 Please sign in'); location.href='user.php';</script>";
        //         exit;				
        //     }
        // }
        // else{
        //     if(in_array($action_switch,$teacher_tmp_arr) || in_array($action_switch,$student_tmp_arr)){
        //         $_SESSION['backend']=null;
        //         //echo "<script>alert('NO Permission3');window.close();window.opener.document.location.href='user.php'; </script>";
        //         echo "<script>alert('請先登入帳號 Please sign in');location.href='user.php?sub_page/true'; </script>";
        //         exit;				
        //     }
            
        // }
      
        // 每個功能前置
        switch ($action_switch) {
            case 'text':
            $this->text();
                break;    
                  
            case 'select_resources':
            $this->select_resources();
                break;      
                
            case 'register':
            $this->register();
                break; 
                
            case 'register_choose':
            $this->register_choose();
                break;  
                 
                
            case 'register_update':
                $this->register_update();
                    break; 
                    
            case 'register_tealit_update':
                $this->register_tealit_update();
                    break;                               
                       
           case 'login':
            $this->login();            
                break;   

           case 'tealit_login':
            $this->tealit_login();            
                break;   
                
           case 'tealit_login_update':
            $this->tealit_login_update();            
                break;                 
                
           case 'goto_ident':
            $this->goto_ident();            
                break;     
                    
           case 'logout':
            $this->logout();
                break;                               
                  
            case 'register_teacher':
            $this->register_teacher();
                break;                    
                
            case 'register_teacher_update':
            $this->register_teacher_update();
                break;                                  
                
            case 'forget':
            $this->forget();
                break;   
                
            case 'forget_update':
            $this->forget_update();
                break;   
                
            case 'student_edit':            
            $this->student_edit();
                break;  
                
            case 'teacher_dayoff':            
            $this->teacher_dayoff();
                break;    	
                            
            case 'teacher_list':            
            $this->teacher_list();
                break;    
     
            case 'buy_product_record':            
            $this->buy_product_record();
                break; 
                
            case 'apt_record':            
            $this->apt_record();
                break; 
                
            case 'teacher_apt_record':            
            $this->teacher_apt_record();
                break; 
                 
            case 'buy_product':            
            $this->buy_product();
                break;     
                
            case 'teacher_edit':
            $this->teacher_edit();
                break;   
                
            case 'teacher_first_edit':
            $this->teacher_first_edit();
                break;   
                
            case 'teacher_first_edit_update':
            $this->teacher_first_edit_update();
                break;   
                

            case 'pay_result':
            $this->pay_result();
                break;   
                
            case 'pay_not_credit_result':
            $this->pay_result();
                break;                    
             
            case 'student_booking_choose':
            $this->student_booking_choose();
                break;       
            case 'student_booking':
            $this->student_booking();
                break;     
                
            case 'buy_order_update':
            $this->buy_order_update();
                break;                  
                
            case 'student_point_record':
            $this->student_point_record();
                break;                      

            case 'create_room_url':
            $this->create_room_url();
                break;                      

            case 'student_lesson_cancel':
            $this->student_lesson_cancel();
                break; 
                
            case 'teacher_lesson_cancel':
            $this->teacher_lesson_cancel();
                break; 
                
            case 'teacher_booking_record':
            $this->teacher_booking_record();
                break;   
                
            case 'teacher_password_edit':
            $this->teacher_password_edit();
                break; 
                
            case 'student_password_edit':
            $this->student_password_edit();
                break;                 
                
            case 'edit_update':
            $this->edit_update();
                break;   
                
            case 'article_update':
            $this->article_update();
                break;   
                
            case 'student_rate':
            $this->student_rate();
                break;   
                
            case 'student_rate_update':
            $this->student_rate_update();
                break;   
                
            case 'can_tutor_time_update':
            $this->can_tutor_time_update();
                break;  
                           
            case 'edit_pw_update':
            $this->edit_pw_update();
                break;    
                
            case 'edit_email_pw_update':
            $this->edit_email_pw_update();
                break;                           
           
            case 'can_tutor_time':
            $this->can_tutor_time();
                break;  
                
            case 'booking_record':
            $this->booking_record();
                break;  
                
            case 'wakeup_account':
            $this->wakeup_account();
                break; 
                      
            case 'reset_password':
            $this->reset_password();
                break; 
                
            case 'open_window_word':
            $this->open_window_word();
                break;    
                
            case 'open_window_article_link':
            $this->open_window_article_link();
                break;    
                
            case 'teacher_confirm_lesson':
            $this->teacher_confirm_lesson();
                break;  
                
            case 'teacher_confirm_lesson_update':
            $this->teacher_confirm_lesson_update();
                break;    
                
            case 'check_account':
            $this->check_account();
                break;  
                       
            case 'twitter_login':
            $this->twitter_login();
                break;  
                     
            case 'twitter_check_account':
            $this->twitter_check_account();
                break;  
                
            case 'test_room_booking':
            $this->test_room_booking();
                break;
                
            case 'teacher_training':
            $this->teacher_training();
                break;
                    
            case 'open_lesson_room':
            $this->open_lesson_room();
                break;
                
            case 'teacher_open_lesson_room':
            $this->teacher_open_lesson_room();
                break;
                
            case 'teacher_open_lesson_room_substitute':
            $this->teacher_open_lesson_room_substitute();
                break;
                
            case 'take_out_all_9stalk':
            $this->take_out_all_9stalk();
                break; 


            case 'teacher_request_help':
            $this->teacher_request_help();
                break;       
                
            case 'teacher_request_help_sendmail':
            $this->teacher_request_help_sendmail();
                break;  
                
                
            case 'request_help':
            $this->request_help();
                break;          
                
            case 'request_help_sendmail':
            $this->request_help_sendmail();
                break;  
                   
            case 'lesson_word':
            $this->lesson_word();
                break;            
                
            case 'test_list': //open_test room
            $this->test_list();
                break; 
                
            case 'agree_update':
            $this->agree_update();
                break;    
                
            case 'agree':
            $this->agree();
                break;       
                
            case 'faq':
            $this->faq();
                break;  
                         
            case 'tandsinterface':
            $this->tandsinterface();
                break;  
                
            case 'teach_in_room':
            $this->teach_in_room();
                break;               

            default:                       
            $this->index();
                break;
        }   
        // end每個功能前置 
    }   

}

