<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Total Shop UK eCommerce Open Source
 *
 * The Login controller to be used with Total Shop UK eCommerce Open Source
 *
 * @package		Total Shop UK eCommerce Open Source
 * @author		Jason Davey
 * @copyright	Copyright (C) 2015 Frozen Tiger Ltd.
 * @license		http://www.totalshopuk.com/license
 * @version		Version 3.0.0
 */

class Login extends MY_Controller
{

	function index()
	{
		if ($this->session->userdata('user_id')!=''){
			header('Location: '.url());
		}else{
			$data=array();
			$this->load->view('login',$data);
		}
	}
	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */