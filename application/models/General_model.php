<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class General_model extends CI_Model {
    
    protected $table_prefix = "v2_";
    
    protected $table_config = "config";
    
    public function __construct() {
        
        parent::__construct();
        
    }
    
    public function get_config_data ($id) {
        
        return $this->db->query('SELECT `data_config` FROM '.$this->table_prefix.$this->table_config.' WHERE id="'.$id.'"')->row()->data_config;
        
    }
    
}