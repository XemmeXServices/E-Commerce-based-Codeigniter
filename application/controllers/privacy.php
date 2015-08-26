<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Total Shop UK eCommerce Open Source
 *
 * The Privacy controller to be used with Total Shop UK eCommerce Open Source
 *
 * @package		Total Shop UK eCommerce Open Source
 * @author		Jason Davey
 * @copyright	Copyright (C) 2015 Frozen Tiger Ltd.
 * @license		http://www.totalshopuk.com/license
 * @version		Version 3.0.0
 */

class Privacy extends MX_Controller
{

	function index()
	{
		$data = array();
		$this->load->view('home',$data);
	}
	
}

/* End of file privacy.php */
/* Location: ./application/controllers/privacy.php */