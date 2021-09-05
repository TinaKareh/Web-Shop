<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('cart');
        $this->load->helper('date');
        $this->load->model('Product_model');
        $this->load->model('Product_filter_model');
	}
	
	function index()
	{

    $total_price = 0;
    $total_item = 0;

  $output = '
<div class="table-responsive" id="order_table">
 <table class="table table-bordered table-striped">
  <tr>  
            <th width="40%">Product Name</th>  
            <th width="20%">Price</th>  
            <th width="15%">Total</th>  
            <th width="5%">Action</th>  
        </tr>
';
if(!empty($_SESSION["shopping_cart"]))
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
  $output .= '
  <tr>
   <td>'.$values["item_name"].'</td>
   <td align="right"> '.$values["price"].' Kshs</td>
   <td align="right"> '.number_format($values["price"], 2).' Kshs</td>
   <td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["item_id"].'">Remove</button></td>
  </tr>
  ';
  $total_price = $total_price + ($values["price"]);
  //$total_item = $total_item + 1;
 }
 $output .= '
 <tr>  
        <td colspan="3" align="right">Total</td>  
        <td align="right">'.number_format($total_price, 2).' Kshs</td>  
        <td></td>  
    </tr>
 ';
}
else
{
 $output .= '
    <tr>
     <td colspan="5" align="center">
      Your Cart is Empty!
     </td>
    </tr>
    ';
}
$output .= '</table></div>';

echo $output;
//echo '<pre>';
//print_r($_SESSION["shopping_cart"]);
//echo '</pre>';
    }
}