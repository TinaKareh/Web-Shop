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
<main class ="content-wrapper">
<div class ="container-fluid">
<div class="col-sm-4">
<input class="form-control" id="my-input" type="text" placeholder="Search..">
</div>
</br>
<div class="table-responsive" id = my-table>          
  <table class="table table-bordered table-striped">
    <thead>
      <tr class ="table-success">
        <th>#</th>
        <th>Image</th>
        <th>Item Number</th>
        <th>Item Name</th>
        <th>Category</th>
        <th>Item Size</th>
        <th>Item Price</th>
        <th>Item Description</th>
        <th>Date Added</th>
      </tr>
    </thead>
    <tbody>
	<?php foreach ($items as $items): ?>
      <tr>
        <td><?=$items->item_id;?></td>
        <td><img src="<?=base_url().'images/'. $items->image?>" width="100" height="100"></td>
        <td><?=$items->item_number?></td>
        <td><?=$items->item_name?></td>
        <td><?=$items->category?></td>
        <td><?=$items->size?></td>
        <td><?=$items->price?>Kshs</td>
		<td><?=$items->description?></td>
		<td><?=$items->date_added?></td>
      </tr>
	  <?php endforeach; ?>
    </tbody>
  </table>
  </div>
</div>
</main>
</body>
</html>