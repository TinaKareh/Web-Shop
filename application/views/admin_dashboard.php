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
  <script src="assets/custom/index.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    include 'admin_header.php';
    ?>
<main class="content-wrapper">
  <div class="container-fluid">
    <div>
    <h3><mark> Welcome to the Vendor Dashboard</mark></h3>
    </div>
  <div class="card-columns div-custom">
    <div class="card bg-light">
      <div class="card-body text-center">
        <h3 class="card-text font-italic">Total Inventory:</h3>
        <h4 class ="text-success"><?=$total;?></h4>
      </div>
    </div>
    <div class="card bg-light">
      <div class="card-body text-center">
        <h3 class="card-text font-italic">Total Orders:</h3>
        <h4 class ="text-success">0</h4>
      </div>
    </div>
    <div class="card bg-light">
      <div class="card-body text-center">
        <h3 class="card-text font-italic">Total Categories:</h3>
        <h4 class ="text-success"><?=$category;?></h4>
      </div>
    </div>
</div>
</br>
<h5 class ="font-italic">Recently Added:</h5>
<div class="table-responsive" id = my-table>          
  <table class="table table-bordered table-striped">
    <thead>
      <tr class ="table-success">
        <th>#</th>
        <th>Item Number</th>
        <th>Item Name</th>
        <th>Category</th>
        <th>Item Size</th>
        <th>Item Price</th>
      </tr>
    </thead>
    <tbody>
	<?php foreach ($current as $current): ?>
      <tr>
        <td><?=$current['item_id'];?></td>
        <td><?=$current['item_number'];?></td>
        <td><?=$current['item_name'];?></td>
        <td><?=$current['category'];?></td>
        <td><?=$current['size'];?></td>
        <td><?=$current['price'];?>Kshs</td>
      </tr>
	  <?php endforeach; ?>
    </tbody>
  </table>
  </div>
  </div>
</main>
</body>
</html>

