<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_filter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_filter_model');
	}
	
	function index()
	{
		$data['category_data'] = $this->product_filter_model->fetch_filter_type('category');
		$data['size_data'] = $this->product_filter_model->fetch_filter_type('size');
		$this->load->view('product_filter', $data);
	}

	function fetch_data()
	{
		sleep(2);
		$minimum_price = $this->input->post('minimum_price');
		$maximum_price = $this->input->post('maximum_price');
		$category = $this->input->post('category');
		$size = $this->input->post('size');
		$this->load->library("pagination");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->product_filter_model->count_all($minimum_price, $maximum_price, $category, $size);
		$config["per_page"] = 8;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li>';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li>';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li>';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><a href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 3;
		$this->pagination->initialize($config);
		$page = $this->uri->segment('3');
		$start = ($page - 1) * $config["per_page"];
		
		$output = array(
			'pagination_link'		=>	$this->pagination->create_links(),
			'product_list'			=>	$this->product_filter_model->fetch_data($config["per_page"], $start, $minimum_price, $maximum_price, $category, $size)
		);
		echo json_encode($output);
	}
	
}

?>