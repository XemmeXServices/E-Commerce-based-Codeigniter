<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Total Shop UK eCommerce Open Source
 *
 * The Admin controller to be used with Total Shop UK eCommerce Open Source
 *
 * @package		Total Shop UK eCommerce Open Source
 * @author		Jason Davey
 * @copyright	Copyright (C) 2015 Frozen Tiger Ltd.
 * @license		http://www.totalshopuk.com/license
 * @version		Version 3.0.0
 */

class Admin extends MY_Controller
{
	
	function index()
	{
		header('Location: '.url());
		$this->load->view('_ajax/_blank');
	}
	
	function shipping()
	{
		if ($this->session->userdata('user_level') == 0){
			header('Location: '.url());
		}else{
			$country_codes = array();
			$query = $this->db->select('country_code, country_title')->from('countries')->order_by('country_title','ASC')->get();
			if ($query->num_rows()>0){
				foreach ($query->result() as $key => $row){	
					$country_codes[$row->country_code] = $row->country_title;
				}
			}
			$query = $this->db->from('shipping')->order_by('shipping_title','ASC')->get();
			if ($query->num_rows()>0){
				foreach ($query->result() as $key => $row){
					$this->data['shipping'][$row->shipping_id]['title'] 		= $row->shipping_title;
					$this->data['shipping'][$row->shipping_id]['price'] 		= $row->shipping_price;
					$shipping_country[$row->shipping_id] = explode(",", $row->shipping_countries);
					foreach ($country_codes as $country_code => $country_title){
						if (in_array($country_code,$shipping_country[$row->shipping_id])){
							$this->data['shipping'][$row->shipping_id]['countries_added'][$country_code] = $country_title;
						}else{
							$this->data['shipping'][$row->shipping_id]['countries_available'][$country_code] = $country_title;
						}
					}
					$this->data['shipping'][$row->shipping_id]['default'] 	= $row->shipping_default;
					$this->data['shipping'][$row->shipping_id]['active'] 		= $row->shipping_active;
				}
			}
			$this->layout->view('pages/admin/shipping',$this->data);
		}
	}
	
	function categories()
	{
		if ($this->session->userdata('user_level') == 0){
			header('Location: '.url());
		}else{
			if ($this->uri->segment(4)!=''){
				$parent_key = $this->uri->segment(4);
				
				$query = $this->db
				->select('category_key, category_parentkey, category_title')
				->from('categories')
				->where('category_parentkey', $parent_key)
				->order_by('category_order ASC, category_title ASC')
				->get();
				if ($query->num_rows()>0){
					$this->data['cats']=1;
					foreach ($query->result() as $key => $row){
					    $this->data['category'][$row->category_key]['key']		= $row->category_key;
					 	$this->data['category'][$row->category_key]['parentkey']	= $row->category_parentkey;
					 	$this->data['category'][$row->category_key]['title']		= $row->category_title;
					}
				}else{
					$this->data['cats']=0;
				}
				$query = $this->db->select('category_title')->from('categories')->where('category_key', $parent_key)->get();
				if ($query->num_rows()>0){
					foreach ($query->result() as $key => $row){
					 	$this->data['category_title'] = $row->category_title;
					}
				}
				$this->data['parent_key']=$parent_key;
				$this->layout->view('pages/admin/sub_categories',$this->data);
			}else{
				$parent_key = '_top';
				$query = $this->db
				->select('category_key, category_parentkey, category_title')
				->from('categories')
				->where('category_parentkey', '_top')
				->order_by('category_order ASC, category_title ASC')
				->get();
				if ($query->num_rows()>0){
					$this->data['cats']=1;
					foreach ($query->result() as $key => $row){
					    $this->data['category'][$row->category_key]['key']		= $row->category_key;
					 	$this->data['category'][$row->category_key]['parentkey']	= $row->category_parentkey;
					 	$this->data['category'][$row->category_key]['title']		= $row->category_title;
					}
				}else{
					$this->data['cats']=0;
				}
				$this->data['parent_key']=$parent_key;
				$this->layout->view('pages/admin/categories',$this->data);
			}
		}
	}
	
	function products()
	{
		if ($this->session->userdata('user_level') == 0){
			header('Location: '.url());
		}else{
			
			$catkey = '';
			$i=0;
			$query = $this->db
			->select('category_key, category_title')
			->from('categories')
			->where('category_parentkey', '_top')
			->order_by('category_order ASC, category_title ASC')
			->get();
			if ($query->num_rows()>0){
				foreach ($query->result() as $key => $row){	
					$this->data['categories'][$row->category_key] = '---'.$row->category_title.'---';
					$query = $this->db
					->select('category_key, category_title')
					->from('categories')
					->where('category_parentkey', $row->category_key)
					->order_by('category_order ASC, category_title ASC')
					->get();
					if ($query->num_rows()>0){
						foreach ($query->result() as $key => $row){	
							if ($i==0){
								$catkey = $this->uri->segment(3,$row->category_key);
								$i++;
							}
							$this->data['categories'][$row->category_key] = $row->category_title;
						}
					}
				}
			}
			$this->data['current'] = $catkey;
			$query = $this->db
			->select('product_key, product_catkey, product_title, product_description, product_price, product_buy, product_image, product_shipping')
			->from('products')
			->where('product_catkey', $catkey)
			->order_by('product_order ASC, product_title ASC')
			->get();
			if ($query->num_rows()>0){
				$this->data['prods']=1;
				foreach ($query->result() as $key => $row){
				    $this->data['product'][$row->product_key]['key']				= $row->product_key;
				 	$this->data['product'][$row->product_key]['catkey']			= $row->product_catkey;
				 	$this->data['product'][$row->product_key]['title']			= $row->product_title;
					$this->data['product'][$row->product_key]['description']		= $row->product_description;
					$this->data['product'][$row->product_key]['price']			= $row->product_price;
					$this->data['product'][$row->product_key]['buy']				= $row->product_buy;
					$this->data['product'][$row->product_key]['product_image']	= $row->product_image;
					$shipping[$row->product_key] = explode(",", $row->product_shipping);
					$query2 = $this->db->select('shipping_id, shipping_title')->from('shipping')->order_by('shipping_title','ASC')->get();
					if ($query2->num_rows()>0){
						foreach ($query2->result() as $key2 => $row2){
							foreach ($shipping as $shipping_key => $shipping_value){
								if (in_array($row2->shipping_id,$shipping_value)){
									$this->data['shipping'][$shipping_key]['added'][$row2->shipping_id] = $row2->shipping_title;
								}else{
									$this->data['shipping'][$shipping_key]['avail'][$row2->shipping_id] = $row2->shipping_title;
								}
							}
						}
					}
				}
			}else{
				$this->data['prods']=0;
			}
			if ($this->session->flashdata('expand_this')!=''){
				$this->data['expand_this'] = $this->session->flashdata('expand_this');
			}else{
				$this->data['expand_this'] = '';
			}
			$this->layout->view('pages/admin/products',$this->data);
		}
	}
	
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */