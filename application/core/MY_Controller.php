<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MY_Controller extends CI_Controller {
    
    private $ci;
    
    public function __construct($Page = "Home") {
        
        parent::__construct();
        
        /** 
        * Globals variables
        */
        $this->ci                       = &get_instance();
        $this->version                  = $this->VersionSetting();
        $this->title_for_layout         = $this->TitleSetting($Page);
        $this->data['categorie']        = $this->GetCategory();
        $this->data['basket_qty'] 	= $this->master->update_basket_qty();
	$this->data['basket_total'] 	= $this->master->update_basket_total();
        
        /**
         * Fonction a dÃ©clarer autmatique a chaque page
         */
        
        $this->IncludeCss();
        $this->IncludeJs();
        
        /**
         *  Fonction si l'utilisateur est connectÃ©
         */
        if ($this->ci->session->userdata('logged_in') == TRUE) {
            $this->UpdateLastVisite($this->ci->session->userdata('account_id'));
            $this->VerifIP($this->ci->session->userdata('account_id'));
            if ($this->ci->session->userdata('user_level') >= 1) {
                $this->data['level'] = 2;
            }
            else {
                $this->data['level'] = 1;
            }
        }
        else {
            $this->data['level'] = 0;
        }
        
        return TRUE;
        
    }
    
    protected function IncludeCss () {
        
        $this->layout->add_includes('css', 'assets/css/lightbox.css');
        $this->layout->add_includes('css', 'assets/css/style.css');
        $this->layout->add_includes('css', 'assets/css/font-awesome.css');
        $this->layout->add_includes('css', 'assets/css/bootstrap.css');
        
    }
    
    protected function IncludeJS () {
        
        $this->layout->add_includes('js', 'assets/js/jquery.js');
        $this->layout->add_includes('js', 'assets/js/ajax.js');
        
    }
    
    protected function TitleSetting ($Page = "Home") {
        
        return ('E-Commerce | ' . $Page);
        
    }
    
    protected function VersionSetting () {
        
        return $this->General_model->get_config_data(1);
        
    }
    
    protected function get_ip() {

        if($_SERVER) {
            if($_SERVER['HTTP_X_FORWARDED_FOR'])
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            elseif($_SERVER['HTTP_CLIENT_IP'])
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            else
                $ip = $_SERVER['REMOTE_ADDR'];
        }
        else {
            if(getenv('HTTP_X_FORWARDED_FOR'))
                $ip = getenv('HTTP_X_FORWARDED_FOR');
            elseif(getenv('HTTP_CLIENT_IP'))
                $ip = getenv('HTTP_CLIENT_IP');
            else
                $ip = getenv('REMOTE_ADDR');
        }

        return $ip;
        
    }
    
    protected function VerifProxy () {
        
        $scan_headers = array(
            'HTTP_VIA',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_FORWARDED',
            'HTTP_CLIENT_IP',
            'HTTP_FORWARDED_FOR_IP',
            'VIA',
            'X_FORWARDED_FOR',
            'FORWARDED_FOR',
            'X_FORWARDED',
            'FORWARDED',
            'CLIENT_IP',
            'FORWARDED_FOR_IP',
            'HTTP_PROXY_CONNECTION'
        );

        $flagProxy = false;
        $libProxy = 0;

        foreach($scan_headers as $i) {
            if(empty($_SERVER[$i])) {
                $flagProxy = true;
            }
        }
        if (in_array($_SERVER['REMOTE_PORT'], array(8080,80,6588,8000,3128,553,554)) || @fsockopen($_SERVER['REMOTE_ADDR'], 80, $errno, $errstr, 30)) {
            $flagProxy = true;
        }
        
        if ($flagProxy == true && isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR'])) {

            if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] == $this->get_ip()) {
                  $libProxy = 1;
            }
            else if ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] == $_SERVER['REMOTE_ADDR']) {
                $libProxy = 1;
            }
            else if ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != $_SERVER['REMOTE_ADDR']) {
                $libProxy = 1;
            }
            else if ( $_SERVER['HTTP_X_FORWARDED_FOR'] == '' && $_SERVER['HTTP_CLIENT_IP'] == '' && !empty($_SERVER['HTTP_VIA']) ) {
                $libProxy = 1;   
            }
            else {
                $libProxy = 1;
            }
        }

        if ($libProxy == 1) {
            redirect('Errors/Proxy');
        }
        else {
            return FALSE;
        }
        
    }
    
    protected function UpdateLastVisite($id) {
        
    }
    
    protected function VerifIP ($id) {
        
    }
    
    protected function GetCategory () {
        
        return $this->db->select('category_key, category_parentkey, category_title')->from('categories')->order_by('category_order ASC, category_title ASC')->get()->result();
        
    }
    
}