<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Auth extends MY_Controller {
    
    protected $data = array();
    
    public function __construct () {
        
        parent::__construct("Auth");
        
        return TRUE;
        
    }
    
    public function index () {
        
        redirect ('Home');
        
    }
    
    public function Login () {
        
        if ($this->session->userdata('user_id')==''){
            $this->layout->view('pages/login',$this->data);
        }
        else {
            redirect('Home');
        }
        
    }
    
    public function Logout () {
        
        if ($this->session->userdata('user_id')!=''){
            $data = array();
            $this->session->sess_destroy();
            redirect ('Home');
        }else{
            redirect ('Auth/Login');
        }
        
    }
    
    public function Register () {
        
        
        
    }
    
}