<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel = "stylesheet" href = "assets/bootstrap-3.4.1-dist/css/bootstrap.min.css">-->
  <link rel ="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel = "stylesheet" href = "assets/custom/index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="/assets/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container my-5" style="width:750px">
  <div class="card bg-light text-dark custom">
  <img class="card-img-top" src="assets/images/ecom.jpg" alt="Card image">
  <h4 class="card-title font-italic" style="padding-left: 50px !important;">Login</h4>
    <div class="card-body">
	<p class =" card-text text-info"><?php echo $this->session->flashdata('password_success'); ?></p>
     <form class="form-horizontal" style="padding-left: 70px !important;" method = "post">
    <div class="form-group">
      <label class="control-label col-sm-4" for="email">Email <span>*</span>:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="focusedInput" placeholder="Enter Email" name="email" required>
		<span class="text-danger"><?php echo form_error('email'); ?></span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="pass">Password  <span>*</span>:</label>
	  <div class="col-sm-10">
       <input type="password" class="form-control" id="focusedInput" placeholder="Enter Password" name="pass" required>
	   <span class="text-danger"><?php echo form_error('pass'); ?></span>
       </div>
	</div>
	 <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="custom-control custom-checkbox">
          <label class="control-label" for ="remember"><input type="checkbox" id="focusedInput" name="remember"> Remember me:</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </div>  
    </div>
	<div align ="left" class="form-group">        
      <div class="col-sm-offset-2 col-sm-5">
        <a href="<?=base_url('forgot_password');?>" class ="btn-link text-primary"> Forgot Password?</a>
      </div>
	  <p class ="text-danger"><?php echo $this->session->flashdata('login_error'); ?></p>
  </form>
  <br/>
   <div class ="div-custom" align ="right" style="padding: 20px !important;">
      <label class="control-label col-sm-13" for="signup">Don't have an account?</label>
         <a href="<?= base_url('signup'); ?>"><span class="glyphicon glyphicon-log-in"></span> Register</a><br/>
	</div>
    </div>
  </div>
</div>
</body>
</html>