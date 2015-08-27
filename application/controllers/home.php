<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Total Shop UK eCommerce Open Source
 *
 * The Home controller to be used with Total Shop UK eCommerce Open Source
 *
 * @package		Total Shop UK eCommerce Open Source
 * @author		Jason Davey
 * @copyright	Copyright (C) 2015 Frozen Tiger Ltd.
 * @license		http://www.totalshopuk.com/license
 * @version		Version 3.0.0
 */

class Home extends MY_Controller {
    
    protected $data = array();
    
    public function __construct () {
        
        parent::__construct("Accueil");
        
        return TRUE;
        
    }

    public function index() {
        
        $this->data['content'] = 'CONTENT VAR';
        
        return $this->layout->view('pages/Home',$this->data);
        
    }
    
    public function about () {
        
        $this->data['content'] = 'CONTENT VAR';
        
        return $this->layout->view('pages/About',$this->data);
        
    }
    
    public function FAQ () {
        
        $this->data['content'] = 'CONTENT VAR';
        
        return $this->layout->view('pages/FAQ',$this->data);
        
    }
    
    public function Contact () {
        
        $this->data['content'] = 'CONTENT VAR';
        
        return $this->layout->view('pages/Contact',$this->data);
        
    }
    
    public function Terms () {
        
        $this->data['content'] = 'CONTENT VAR';
        
        return $this->layout->view('pages/Terms',$this->data);
        
    }
    
    public function Privacy () {
        
        $this->data['content'] = 'CONTENT VAR';
        
        return $this->layout->view('pages/Privacy',$this->data);
        
    }
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */