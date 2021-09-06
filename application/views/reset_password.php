<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel = "stylesheet" href = "assets/bootstrap-3.4.1-dist/css/bootstrap.min.css">-->
  <link rel ="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel = "stylesheet" href = "assets/custom/index.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="/assets/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
</head>
<body>
<br/>
<div class="container my-2" style="width:750px">
  <div class="card bg-light text-dark custom">
  <div class="card-header bg-success font-italic text-dark">Reset Password</div>
  <!--<img class="card-img-top" src="assets/images/ecom.jpg" alt="Card image">-->
    <div class="card-body">
     <form class="form-horizontal" method = "post">
	 <div class="form-group">
      <label class="control-label col-sm-4" for="email">Email <span>*</span>:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="focusedInput" placeholder="Enter email" name="email" required>
		<span class="text-danger"><?php echo form_error('email'); ?></span>
      </div>
	  </div>
        <div class="form-group">
      <label class="control-label col-sm-4" for="pass">Password  <span>*</span>:</label>
	  <div class="col-sm-10">
       <input type="password" class="form-control" id="focusedInput" placeholder="Enter password" name="pass" required>
	   <span class="text-danger"><?php echo form_error('pass'); ?></span>
       </div>
	</div>
	<div class="form-group">
      <label class="control-label col-sm-4" for="password">Confirm Password  <span>*</span>:</label>
	  <div class="col-sm-10">
       <input type="password" class="form-control" id="focusedInput" placeholder="Enter password" name="password" required>
	   <span class="text-danger"><?php echo form_error('password'); ?></span>
       </div>
	</div>
	<p class ="text-danger"><?php echo $this->session->flashdata('password_error'); ?><?php echo $this->session->flashdata('email_error')?></p>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success btn-block">Submit</button>
      </div>  
    </div>
  </form>
    </div>
  </div>
</div>

</body>
</html>