<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ajax extends CI_Controller {
    
    public function __construct() {
                
        parent::__construct();
        
        return TRUE;
        
    }
    
    public function Login() {
        
        if ($_POST['email']!='' && $_POST['password']!=''){
            $email = $_POST['email'];
            $pass = $_POST['password'];
            
            $query = $this->db->select('user_id, user_level')
                    ->from('users')
                    ->where('user_email', $email)
                    ->where('user_password', $pass)
                    ->where('user_active', 1)
                    ->get();
            
            if ($query->num_rows()>0){
                foreach ($query->result() as $key => $row){
                    $id 	= $row->user_id;
                    $level	= $row->user_level;
                }
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('user_id', $id);
                $this->session->set_userdata('user_level', $level);
                echo 1;
            }
            else {
                echo 0;
            }
            
        }
        else {
            echo 0;
        }
        
    }
    
}