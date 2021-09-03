<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel = "stylesheet" href = "assets/bootstrap-3.4.1-dist/css/bootstrap.min.css">-->
  <link rel = "stylesheet" href = "assets/css/bootstrap.min.css">
   <link rel = "stylesheet" href = "assets/custom/index.css">
   <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="assets/custom/index.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#" style='font-size:25px'>Furistic Shop</a>
  <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarCollapse"
    aria-controls="navbarCollapse"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse sideDiv" id="navbarCollapse">
    <form class="form-inline ml-auto mt-2 mt-md-0">
        <h5 class ="text-success font-italic mr-sm-4"><?=$this->session->userdata('first_name');?> <?=$this->session->userdata('last_name');?></h5>
      <a href ="<?= base_url('user-logout'); ?>" class="btn btn-outline-success my-2 my-sm-0">Logout <span class='fas fa-sign-out-alt' style='font-size:20px'></span></a>
    </form>
  </div>
</nav>
<div class="container-fluid">
  <div class ="row">
    <div class ="col-md-3">
    </br>
    </br>
<div class ="list-group">
  <h3>Price</h3>
  <input type = "hidden" id="hidden_minimum_price" value ="0"/>
  <input type = "hidden" id ="hidden_maximum_price" value ="10000"/>
  <p id ="price-show">100 - 10000</p>
  <div id="price_range"></div>
</div>
<div class = "list-group">
  <h3>Category</h3>
  <?php
  foreach($category_data->result_array() as $row)
  {
  ?>
  <div class="list-group-item checkbox">
<label><input type="checkbox" class="common selector category" value="<?php echo $row['category'];?>"/>&nbsp&nbsp<?php echo $row['category'];?></label>
  </div>
  <?php
  }
  ?>
</div>
<div class ="list-group">
  <h3>Size</h3>
  <?php
  foreach($size_data->result_array() as $row)
  {
  ?>
  <div class="list-group-item checkbox">
<label><input type="checkbox" class="common selector size" value="<?php echo $row['size'];?>"/>&nbsp&nbsp<?php echo $row['size'];?></label>
  </div>
  <?php
  }
  ?>
</div>
    </div>
  </div>
  <div class ="col-md-9">
    <br>
    <div align="center" id="pagination_link"></div>
    <br>
    <br>
    <div class="row filter_data"></div>
  </div>
</br>
<!--<div class="card-columns">
<?php foreach ($items as $items): ?>
  <div class="card bg-light filterDiv <?=$items->category;?>">
  <img class="card-img-top" src="assets/images/ecom.jpg" alt="Card image">
    <div class="card-body text-center">
    <ul class="list-group list-group-flush">
  <li class="list-group-item"><span class="font-weight-bold">Item:</span>&nbsp&nbsp&nbsp&nbsp <?=$items->item_name;?></li>
  <li class="list-group-item"><span class="font-weight-bold">Category:</span>&nbsp&nbsp&nbsp&nbsp <?=$items->category;?></li>
  <li class="list-group-item"><span class="font-weight-bold">Size:</span>&nbsp&nbsp&nbsp&nbsp  <?=$items->size;?></li>
  <li class="list-group-item"><span class="font-weight-bold">Price (KES):</span>&nbsp&nbsp&nbsp&nbsp  <?=$items->price;?></li>
  <li class="list-group-item"><?=$items->description;?></li>
</ul>
    </div>
    <div class="card-footer" align ="right" style="padding: 20px !important;">
    <button type="button" class="btn btn-success">Add-to-Cart</button>
    </div>
  </div>
  <?php endforeach; ?>
</div>
</div>-->
</body>
</html>