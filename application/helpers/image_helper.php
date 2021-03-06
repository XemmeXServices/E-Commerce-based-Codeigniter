<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Total Shop UK eCommerce Open Source
 *
 * The Image helper to be used with Total Shop UK eCommerce Open Source
 *
 * @package		Total Shop UK eCommerce Open Source
 * @author		Jason Davey
 * @copyright	Copyright (C) 2015 Frozen Tiger Ltd.
 * @license		http://www.totalshopuk.com/license
 * @version		Version 3.0.0
 */

function image_thumb($image_path, $height, $width)
{
	$CI =& get_instance();
	$ext = strrchr(basename($image_path), '.');
	$image_thumb = dirname($image_path).'/_thumbs/'.basename($image_path,$ext).'_'.$height.'x'.$width.$ext;
	if (!file_exists($image_thumb)){
		$CI->load->library('image_lib');
		$config['image_library']	= 'gd2';
		$config['source_image']		= $image_path;
		$config['new_image']		= $image_thumb;
		$config['maintain_ratio']	= TRUE;
		$config['height']			= $height;
		$config['width']			= $width;
		$CI->image_lib->initialize($config);
		$CI->image_lib->resize();
		$CI->image_lib->clear();
	}
	return '<img src="'.base_url().$image_thumb.'" alt="'.basename($image_path,$ext).'">';
}

/* End of file image_helper.php */
/* Location: ./application/helpers/image_helper.php */