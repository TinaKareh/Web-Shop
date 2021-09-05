<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product Filters in Codeigniter using Ajax</title>

    <!-- Bootstrap Core CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<!--<link rel = "stylesheet" href = "assets/css/bootstrap.min.css">-->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 	<link href = "<?php echo base_url(); ?>assets/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/style.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Furistic Shop</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?=$this->session->userdata('first_name');?> <?=$this->session->userdata('last_name');?></a></li>
      <li><a href="<?= base_url('user-logout'); ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
				<br />
				<div class="list-group">
					<h3>Price</h3>
					<input type="hidden" id="hidden_minimum_price" value="0" />
					<input type="hidden" id="hidden_maximum_price" value="10000" />
					<p id="price_show">100 - 10000</p>
	                <div id="price_range"></div>
                </div>				
                <div class="list-group">
					<h3>Category</h3>
					<?php
					foreach($category_data->result_array() as $row)
					{
					 
					?>
	                    <div class="list-group-item checkbox"> 
							<label><input type="checkbox" class="common_selector category" value="<?php echo $row['category']; ?>"  > <?php echo $row['category']; ?></label>
						</div>
					<?php 
					} 
					?>
                </div>

				<div class="list-group">
					<h3>Size</h3>
					<?php
					foreach($size_data->result_array() as $row)
					{				 
					?>
	                    <div class="list-group-item checkbox">
							<label><input type="checkbox" class="common_selector size" value="<?php echo $row['size']; ?>" > <?php echo $row['size']; ?></label>
						</div>
					<?php 
					} 
					?>	
                </div>
				<div class="list-group">
				<div class="panel panel-default">
                      <div class="panel-heading">
                                  <div class="row">
                           <div class="col-md-6">Cart Details</div>
						   <div class="col-md-6" align="right">
        <button type="button" name="clear_cart" id="clear_cart" class="btn btn-warning btn-xs">Clear</button>
      </div>
     </div>
    </div>
    <div class="panel-body" id="shopping_cart">

	</div>
   </div>
    </div>
            </div>
            <div class="col-md-9">
				<br />
				<div align="center" id="pagination_link">
				</div>
				<br />
				<br />
				<br />
				<div class="panel panel-default">
				<div class="panel-heading">
				<div class="row">
				<div class="col-md-6">Product List</div>
				<div class="col-md-6" align="right">
       <button type="button" name="add_to_cart" id="add_to_cart" class="btn btn-success btn-xs">Add to Cart</button>
				</div>
				</div>
				</div>
                <div class=" panel-body row filter_data">
            </div>
				</div>
            </div>
        </div>

    </div>
<style>
#loading
{
	text-align:center; 
	background: url('<?php echo base_url(); ?>assets/animation.gif') no-repeat center; 
	height: 150px;
}
</style>

<script>
$(document).ready(function(){

	filter_data(1);

	load_cart_data();
	
	function filter_data(page)
	{
		$('.filter_data').html('<div id="loading" style="" ></div>');
		var action = 'fetch_data';
		//var page = 1;
		var minimum_price = $('#hidden_minimum_price').val();
		var maximum_price = $('#hidden_maximum_price').val();
		var category = get_filter('category');
		var size = get_filter('size');
		$.ajax({
			url:"<?php echo base_url(); ?>product_filter/fetch_data/"+page,
			method:"POST",
			dataType:"JSON",
			data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, category:category, size:size},
			success:function(data)
			{
				$('.filter_data').html(data.product_list);
				$('#pagination_link').html(data.pagination_link);
			}
		})
	}

	$('#price_range').slider({
		range:true,
		min:100,
		max:10000,
		values:[100, 10000],
		step: 50,
		stop:function(event, ui){
			//$('#price_show').show();
			$('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
			$('#hidden_minimum_price').val(ui.values[0]);
			$('#hidden_maximum_price').val(ui.values[1]);
			filter_data(1);
		}
	});

	function get_filter(class_name)
	{
		var filter = [];
		$('.'+class_name+':checked').each(function(){
			filter.push($(this).val());
		});
		return filter;
	}

	$(document).on("click", ".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data("ci-pagination-page");
		filter_data(page);
	});

	$('.common_selector').click(function(){
        filter_data(1);
    });

	function load_cart_data()
   {
      $.ajax({
      url:"<?php echo base_url(); ?>product_cart",
      method:"POST",
      success:function(data)
     {
       $('#shopping_cart').html(data);
     }
  });
 }

 $(document).on('click', '.select_product', function(){
  var item_id = $(this).data('product_id');
  if($(this).prop('checked') == true)
  {
   $('#item'+item_id).css('background-color', '#f1f1f1');
   $('#item'+item_id).css('border-color', '#333');
  }
  else
  {
   $('#item'+item_id).css('background-color', 'transparent');
   $('#item'+item_id).css('border-color', '#ccc');
  }
 });

 $('#add_to_cart').click(function(){
  var item_id = [];
  var item_name = [];
  var price = [];
  var action = "add";
  $('.select_product').each(function(){
   if($(this).prop('checked') == true)
   {
    item_id.push($(this).data('product_id'));
    item_name.push($(this).data('product_name'));
    price.push($(this).data('product_price'));
   }
  });

  if(item_id.length > 0)
  {
   $.ajax({
    url:"<?php echo base_url();?>action",
    method:"POST",
    data:{item_id:item_id, item_name:item_name, price:price, action:action},
    success:function(data)
    {
     $('.select_product').each(function(){
      if($(this).prop('checked') == true)
      {
       $(this).attr('checked', false);
       var temp_item_id = $(this).data('product_id');
       $('#item'+temp_item_id).css('background-color', 'transparent');
       $('#item'+temp_item_id).css('border-color', '#ccc');
      }
     });

     load_cart_data();
     alert("Item has been Added into Cart");
    }
   });
  }
  else
  {
   alert('Select atleast one item');
  }

 });

 $(document).on('click', '.delete', function(){
  var item_id = $(this).attr("id");
  var action = 'remove';
  if(confirm("Are you sure you want to remove this product?"))
  {
   $.ajax({
    url:"<?php echo base_url();?>action",
    method:"POST",
    data:{item_id:item_id, action:action},
    success:function()
    {
     load_cart_data();
     alert("Item has been removed from Cart");
    }
   })
  }
  else
  {
   return false;
  }
 });

 $(document).on('click', '#clear_cart', function(){
  var action = 'empty';
  $.ajax({
   url:"<?php echo base_url();?>action",
   method:"POST",
   data:{action:action},
   success:function()
   {
    load_cart_data();
    alert("Your Cart has been clear");
   }
  });
 });
});
</script>

</body>

</html>