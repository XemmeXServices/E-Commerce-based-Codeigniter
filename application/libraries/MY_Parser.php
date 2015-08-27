<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Academic Free License version 3.0
 *
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2013, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

defined('BASEPATH') OR exit('No direct script access allowed');

//Condition d'utilisation :
//Aficher une variable "{lavariable}
//Afficher une langue "{lang:laphrase}"
//Afficher une condition :
//"{if test == ""}
//condition oui
//{else}
//condition non
//{endif}
//Fonction base_url()
//{function:base_url}
//La suite : http://ellislab.com/codeigniter%20/user-guide/libraries/parser.html

class MY_Parser extends CI_Parser {
    
    private $ci;
    
    protected $delim_in = '{';
    protected $delim_end = '}';
    
    protected $lang_replace_regexp = '!\{lang:\s*(?<key>[^\}]+)\}!';
    
    protected $template;
    
    protected $data;


    public function __construct() {
        
        parent::__construct();
        
        $this->ci = &get_instance();
        
    }

    public function parse($template, $data, $return = FALSE) {
        
        $template = $this->ci->load->view($template, $data, TRUE);
        $template = $this->get_parse($template);

        return $this->_parse($template, $data, $return);
        
    }
    
    protected function get_parse($template) {
        
        //Parse function
        $template = str_replace($this->delim_in . 'function:base_url' . $this->delim_end, base_url() . $this->ci->uri->segment(1) . "/", $template);
        $template = str_replace($this->delim_in . 'function:current_url' . $this->delim_end, base_url() . $this->ci->uri->segment(1) . "/" . $this->ci->uri->segment(2), $template);
        $template = str_replace($this->delim_in . 'function:current_lang' . $this->delim_end, $this->ci->uri->segment(1), $template);
        $template = str_replace($this->delim_in . 'function:current_controller' . $this->delim_end, $this->ci->uri->segment(2), $template);
        $template = str_replace($this->delim_in . 'function:current_action' . $this->delim_end, $this->ci->uri->segment(3), $template);
        $template = str_replace($this->delim_in . 'function:title_for_layout' . $this->delim_end, $this->ci->title_for_layout, $template);
        $template = str_replace($this->delim_in . 'function:version' . $this->delim_end, $this->ci->version, $template);
        $template = str_replace($this->delim_in . 'function:assets_images' . $this->delim_end, "http".((empty($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off')?'':'s') ."://" . $_SERVER['HTTP_HOST'] . "/assets/images/", $template);
        $template = str_replace($this->delim_in . 'function:uploads' . $this->delim_end, "http".((empty($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off')?'':'s') ."://" . $_SERVER['HTTP_HOST'] . "/upload/", $template);
        
        //Parse session
        $template = str_replace($this->delim_in . 'session:login_in' . $this->delim_end, $this->ci->session->userdata('logged_in'), $template);
        $template = str_replace($this->delim_in . 'session:id' . $this->delim_end, $this->ci->session->userdata('account_id'), $template);
        $template = str_replace($this->delim_in . 'session:pseudo' . $this->delim_end, $this->ci->session->userdata('account_name'), $template);
        $template = str_replace($this->delim_in . 'session:ip' . $this->delim_end, $this->ci->session->userdata('account_ip'), $template);
        $template = str_replace($this->delim_in . 'session:rang' . $this->delim_end, $this->ci->session->userdata('account_rang'), $template);
        
        //Parse Lang
        $template = preg_replace_callback($this->lang_replace_regexp, array($this, 'replace_lang_key'), $template);
        
        //Parse Account Info
        
        
        return $template;
        
    }
    
    protected function replace_lang_key($key) {
        
        return $this->ci->lang->line($key[1]);
        
    }
    
}