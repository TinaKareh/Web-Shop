<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {

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
     session_start();

if(isset($_POST["action"]))
{
 if($_POST["action"] == "add")
 {
  $item_id = $_POST["item_id"];
  $item_name = $_POST["item_name"];
  $price = $_POST["price"];
  for($count = 0; $count < count($item_id); $count++)
  {
   $cart_product_id = array_keys($_SESSION["shopping_cart"]);
   if(in_array($item_id[$count], $cart_product_id))
   {
    $_SESSION["shopping_cart"][$item_id[$count]]['product_quantity']++;
   }
   else
   {
    $item_array = array(
     'item_id'               =>     $item_id[$count],  
     'item_name'             =>     $item_name[$count],
     'price'            =>     $price[$count],
    );

    $_SESSION["shopping_cart"][$item_id[$count]] = $item_array;

   }
  }
 }

 if($_POST["action"] == 'remove')
 {
  foreach($_SESSION["shopping_cart"] as $keys => $values)
  {
   if($values["item_id"] == $_POST["item_id"])
   {
    unset($_SESSION["shopping_cart"][$keys]);
   }
  }
 }
 if($_POST["action"] == 'empty')
 {
  unset($_SESSION["shopping_cart"]);
 }
}
    }
}
