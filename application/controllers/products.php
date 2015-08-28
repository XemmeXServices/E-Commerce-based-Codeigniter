<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Total Shop UK eCommerce Open Source
*
* The Products controller to be used with Total Shop UK eCommerce Open Source
*
* @package		Total Shop UK eCommerce Open Source
* @author		Jason Davey
* @copyright	Copyright (C) 2015 Frozen Tiger Ltd.
* @license		http://www.totalshopuk.com/license
* @version		Version 3.0.0
*/

class Products extends MY_Controller {
    
    protected $data = array();
    
    public function __construct () {
        
        parent::__construct("Products");
        
        return TRUE;
        
    }
    
    public function index() {
            //header('Location: '.url());
    }

    public function c()
    {
            $name = $this->uri->segment(4);
            $query = $this->db->select('category_title, category_parentkey')->from('categories')->where('category_key', $name)->get();
            if ($query->num_rows()>0){
                    foreach ($query->result() as $key => $row){
                            $this->data['category']['cat_title'] = $row->category_title;
                            if ($row->category_parentkey!='_top'){
                                    $parent_key = $row->category_parentkey;
                                    $query2 = $this->db->select('category_title')->from('categories')->where('category_key', $parent_key)->get();
                                    if ($query2->num_rows()>0){
                                            foreach ($query2->result() as $key2 => $row2){
                                                    $this->data['category']['parent_title'] = $row2->category_title;
                                            }
                                    }
                            }else{
                                    $this->data['category']['parent_title']='_top';
                            }
                    }
            }
            $query = $this->db->from('products')->where('product_catkey', $name)->get();
            $total_rows=$query->num_rows();
            if (!is_num($this->uri->segment(5, 0)) || $this->uri->segment(5, 0)>10000){
                    header('Location: '.url());
            }else{
                    $offset = $this->uri->segment(5, 0);
                    if ($this->session->userdata('per_page')!=''){
                            $this->data['per_page'] = $this->session->userdata('per_page');
                    }else{
                            $this->data['per_page'] = 4;
                    }
                    if ($this->session->userdata('sort_view')==''){
                            $this->session->set_userdata('sort_view','default');
                    }
                    $this->db->from('products')->where('product_catkey', $name);
                    if ($this->session->userdata('sort_view')=='price_asc'){
                            $this->db->order_by('product_price ASC, product_order ASC, product_title ASC');
                    }elseif ($this->session->userdata('sort_view')=='price_desc'){
                            $this->db->order_by('product_price DESC, product_order ASC, product_title ASC');
                    }elseif ($this->session->userdata('sort_view')=='item_az'){
                            $this->db->order_by('product_title ASC, product_order ASC');
                    }elseif ($this->session->userdata('sort_view')=='item_za'){
                            $this->db->order_by('product_title DESC, product_order ASC');
                    }else{
                            $this->db->order_by('product_order ASC, product_title ASC');
                    }
                    $this->db->limit($this->data['per_page'], $offset);
                    $query = $this->db->get();
                    if ($query->num_rows()>0){
                            foreach ($query->result() as $key => $row){
                                    $this->data['products'][$row->product_key]['key'] 		= $row->product_key;
                                    $this->data['products'][$row->product_key]['title'] 		= $row->product_title;
                                    $this->data['products'][$row->product_key]['description'] = truncate($row->product_description,100);
                                    $this->data['products'][$row->product_key]['price']		= $row->product_price;
                                    $this->data['products'][$row->product_key]['buy']			= $row->product_buy;
                                    $this->data['products'][$row->product_key]['image'] 		= $row->product_image;
                            }
                            $this->load->library('pagination');
                            $config['uri_segment'] 		= 5;
                            $config['num_links'] 		= 10;
                            $config['base_url'] 		= url().'products/c/'.$name;
                            $config['total_rows'] 		= $total_rows;
                            $config['per_page'] 		= $this->data['per_page'];
                            $this->pagination->initialize($config);
                            $this->data['num_pages'] = ceil($config['total_rows']/$config['per_page']);
                            $this->data['per_page_array'] = array(5,10,20,50);
                            $this->data['sort_view'] = $this->session->userdata('sort_view');
                            $this->layout->view('pages/categories',$this->data);
                    }else{
                            $this->data['content']['body'] = '<table class="normal" align="center" width="400px">';
                            $this->data['content']['body'].= '<tr><td align="center"><br>Sorry there are no products in this category!</td></tr>';
                            $this->data['content']['body'].= '<tr><td align="center"><br><input type="button" class="buttonstyle" value="Continue Shopping" onclick="javascript:parent.location=\''.url().'\';"></td></tr>';
                            $this->data['content']['body'].= '</table>';
                            $this->layout->view('home',$this->data);
                    }
            }
    }

    public function p()
    {
            $name = $this->uri->segment(4, 'Home');
            $query = $this->db->from('products')->where('product_key', $name)->get();
            if ($query->num_rows()>0){
                    foreach ($query->result() as $key => $row){
                            $cat_key = $row->product_catkey;
                            $query2 = $this->db->select('category_title, category_parentkey')->from('categories')->where('category_key', $cat_key)->get();
                            if ($query2->num_rows()>0){
                                    foreach ($query2->result() as $key2 => $row2){
                                            $cat_title = $row2->category_title;
                                            if ($row2->category_parentkey!='_top'){
                                                    $parent_key = $row2->category_parentkey;
                                                    $query3 = $this->db->select('category_title')->from('categories')->where('category_key', $parent_key)->get();
                                                    if ($query3->num_rows()>0){
                                                            foreach ($query3->result() as $key3 => $row3){
                                                                    $parent_title = $row3->category_title;
                                                            }
                                                    }
                                            }else{
                                                    $parent_title='_top';
                                            }
                                    }
                            }
                            $this->data['products']['key'] 			= $row->product_key;
                            $this->data['products']['catkey'] 		= $row->product_catkey;
                            $this->data['products']['cat_title'] 		= $cat_title;
                            $this->data['products']['parent_title'] 	= $parent_title;
                            $this->data['products']['title'] 			= $row->product_title;
                            $this->data['products']['description'] 	= auto_link($row->product_description);
                            $this->data['products']['price'] 			= $row->product_price;
                            $this->data['products']['buy'] 			= $row->product_buy;
                            $this->data['products']['image'] 			= $row->product_image;
                    }
                    $query2 = $this->db
                    ->select('product_key, product_title, product_price, product_image')
                    ->from('products')
                    ->where('product_catkey', $row->product_catkey)
                    ->where('product_key !=', $row->product_key)
                    ->order_by('RAND()')
                    ->limit(3)
                    ->get();
                    if ($query2->num_rows()>0){
                            $i=0;
                            foreach ($query2->result() as $key2 => $row2){
                                    $this->data['products']['related'][$i]['key'] 	= $row2->product_key;
                                    $this->data['products']['related'][$i]['title'] 	= $row2->product_title;
                                    $this->data['products']['related'][$i]['price'] 	= $row2->product_price;
                                    $this->data['products']['related'][$i]['image'] 	= $row2->product_image;
                                    $i++;

                            }
                    }
                    $this->layout->view('pages/products', $this->data);
            }else{
                    $this->data['content']['body'] = '<table class="normal" align="center" width="400px">';
                    $this->data['content']['body'].= '<tr><td align="center"><br>Sorry product not available!</td></tr>';
                    $this->data['content']['body'].= '<tr><td align="center"><br><input type="button" class="buttonstyle" value="Continue Shopping" onclick="javascript:parent.location=\''.url().'\';"></td></tr>';
                    $this->data['content']['body'].= '</table>';
                    $this->load->view('home',$this->data);
            }
    }

}

/* End of file products.php */
/* Location: ./application/controllers/products.php */