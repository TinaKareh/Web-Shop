<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Product extends CI_Controller {  
    public function __construct()
	{
	parent::__construct();	
  
  $this->load->helper('url');
  $this->load->helper('form');
  $this->load->library('form_validation');
  $this->load->library('session');
  $this->load->helper('date');
  $this->load->model('Product_model');
  $this->load->model('Product_filter_model');


  
  
	}  
    public function index()  
    {  
        $data['category_data'] = $this->Product_filter_model->fetch_filter_type('category');
        $data['size_data'] = $this->Product_filter_model->fetch_filter_type('size');
        $this->load->view('product_page', $data);  
    } 
    
    public function fetch_data(){
        $minimum_price = $this->input->post('minimum_price');
        $maximum_price =$this->input->post('maximum_price');
        $category = $this->input->post('category');
        $size =$this->input->post('size');
        //$data['items'] = $this->Product_model->getAll(); 
        $this->load->library('pagination');
        $config = array();
        $config['base_url']= 'view-products';
        $config['total_rows']= $this->Product_filter_model->count_all($minimum_price,$maximum_price,$category,$size);
        $config['per_page'] = 8;
        $config['uri_segment']= 3;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class = "pagination"'>;
        //$this->load->view('product_page', $data);
    }

    public function dashboard(){
    date_default_timezone_set('Africa/Nairobi'); # add your city to set local time zone
    $dateFormat ="%Y-%m-%d";
    $timeFormat = "%h:%i %s";
    $entry_date = '2021-09-01';
    $entry_time = mdate($timeFormat);

        $data['total'] = $this->Product_model->getTotal();
        $data['category'] = $this->db->count_all('category');
        $data['current'] = $this->db->select('item_id','item_number','item_name','category','size'.'price')->from('items')->where(array('date_added'=>$entry_date))->get()->result();        
        $this->load->view('admin_dashboard', $data);
    }

    public function addItems(){

 $this->form_validation->set_rules('itemName', 'Item Name', 'required');
 $this->form_validation->set_rules('itemNumber', 'Item Number', 'required|min_length[3]');
 $this->form_validation->set_rules('category', 'Category', 'required');
 $this->form_validation->set_rules('size', 'Item Size', 'required');
 $this->form_validation->set_rules('price', 'Item Price', 'required');
 
 if ($this->form_validation->run() == FALSE) {
    $data['categories'] = $this->Product_model->get_all();  
        $this->load->view('add_items', $data);
 }else{
    date_default_timezone_set('Africa/Nairobi'); # add your city to set local time zone
    $dateFormat ="%Y-%m-%d";
    $timeFormat = "%h:%i %s";
    $entry_date = mdate($dateFormat);
    $entry_time = mdate($timeFormat);  
    //insert the signup form data into database
$data = array(
  'item_number' => $this->input->post('itemNumber'),
  'item_name' => $this->input->post('itemName'),
  'category' => $this->input->post('category'),
  'image' => $this->input->post('img'),
  'size' => $this->input->post('size'),
  'price' => $this->input->post('price'),
  'description' => $this->input->post('description'),
  'date_added' =>$entry_date,
);

$this->Product_model->insert($data);

redirect(base_url('add-items'));
 }
    }

public function viewItems(){
        $data['items'] = $this->Product_model->getAll();  
        $this->load->view('view_items', $data);
    }
}  
?>