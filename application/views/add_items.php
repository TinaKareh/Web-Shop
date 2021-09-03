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
<div class="card bg-light text-dark custom">
<div class="card-body">
<form class="form-horizontal" method ="post">
<div class="form-group">
<label class="control-label col-sm-4" for="itemName">Item Name <span>*</span>:</label>  
<input type="text" class="form-control" id="focusedInput" name="itemName" required> 
</div>
<div class="form-group">
<label class="control-label col-sm-4" for="itemNumber">Item Number <span>*</span>:</label>  
<input type="text" class="form-control" id="focusedInput" name="itemNumber" required> 
</div>
<div class="form-group">
      <label class="control-label col-sm-4" for="category">Category <span>*</span>:</label>
      <select class="form-control" id="focusedInput" name="category" required>
      <?php foreach ($categories as $categories): ?>
        <option><?=$categories->category?></option>
        <?php endforeach; ?>
      </select>
</div>
<div class="form-group">
<label class="control-label col-sm-4" for="size">Item Size <span>*</span>:</label>  
<input type="text" class="form-control" id="focusedInput" name="size"> 
</div>
<div class="form-group">
<label class="control-label col-sm-4" for="price">Item Price <span>*</span>:</label>  
<input type="text" class="form-control" id="focusedInput" name="price" required> 
</div>
<div class="form-group" >
 <label class="control-label col-sm-2" for="img">Select image:</label>
  <input type="file" id="img" name="img" accept="image/*">
</div>
<div class="form-group">
<label class="control-label col-sm-4" for="description">Item Description <span>*</span>:</label>  
<textarea class="form-control" rows="5" id="focusedInput" name ='description'></textarea>
</div>
</br>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-8">
        <button type="submit" class="btn btn-success btn-block">Submit</button>
      </div>  
    </div>
</form>
</div>
</div>
</div>
</main>
</body>
</html>