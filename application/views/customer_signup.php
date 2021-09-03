<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel = "stylesheet" href = "assets/bootstrap-3.4.1-dist/css/bootstrap.min.css">-->
  <link rel ="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel = "stylesheet" href = "assets/index.css">
   <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="/assets/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container my-5">
  <div class="card bg-light text-dark custom">
  <div class="card-header bg-success font-italic text-dark">Register</div>
    <div class="card-body">
	<p class =" card-text text-info"><?php echo $this->session->flashdata('password_success'); ?></p>
     <form class="form-horizontal" style="padding-left: 20px !important;" method = "post">
     <div class="row">
    <div class="form-group col">
      <label class="control-label col-sm-3" for="userName">Username <span>*</span>:</label>
        <input type="text" class="form-control" id="focusedInput" placeholder="Enter Username" name="userName" required>
		<span class="text-danger"><?php echo form_error('userName'); ?></span>
    </div>
    <div class="form-group col">
      <label class="control-label col-sm-4" for="email">Email Address <span>*</span> :</label>
       <input type="email" class="form-control" id="focusedInput" placeholder="Enter Email" name="email" required>
	   <span class="text-danger"><?php echo form_error('email'); ?></span>
	</div>
 </div>
 <div class="row">
    <div class="form-group col">
      <label class="control-label col-sm-3" for="fname">First Name <span>*</span>:</label>
        <input type="text" class="form-control" id="focusedInput" placeholder="Enter FirstName" name="fname" required>
		<span class="text-danger"><?php echo form_error('fname'); ?></span>
    </div>
    <div class="form-group col">
      <label class="control-label col-sm-4" for="pass">Last Name  <span>*</span>:</label>
       <input type="text" class="form-control" id="focusedInput" placeholder="Enter Last Name" name="lname" required>
	   <span class="text-danger"><?php echo form_error('lname'); ?></span>
	</div>
 </div>
 <div class="row">
 <div class="form-group col">
      <label class="control-label col-sm-4" for="role">Role <span>*</span>:</label>
      <select class="form-control" id="focusedInput" name="role" required>
        <option>Customer</option>
        <option>Vendor</option>
      </select>
</div>
    <div class="form-group col">
      <label class="control-label col-sm-3" for="phone">Phone No. <span>*</span>:</label>
        <input type="tel" class="form-control" id="focusedInput" placeholder="Enter Phone Number" name="phone" required>
		<span class="text-danger"><?php echo form_error('phone'); ?></span>
    </div>
 </div>
 <div class="row">
 <div class="form-group col">
      <label class="control-label col-sm-4" for="pass">Password  <span>*</span>:</label>
       <input type="password" class="form-control" id="focusedInput" placeholder="Enter Password" name="pass" required>
	   <span class="text-danger"><?php echo form_error('pass'); ?></span>
	</div>
    <div class="form-group col">
      <label class="control-label col-sm-3" for="address">Address:</label>
        <input type="text" class="form-control" id="focusedInput" placeholder="Enter Address" name="address">
		<span class="text-danger"><?php echo form_error('address'); ?></span>
    </div>
</div>
 <div class="row">
 <div class="form-group col">
      <label class="control-label col-sm-4" for="zip">Zip Code:</label>
       <input type="text" class="form-control" id="focusedInput" placeholder="Enter Zip Code" name="zip">
	   <span class="text-danger"><?php echo form_error('zip'); ?></span>
	</div>
    <div class="form-group col">
      <label class="control-label col-sm-4" for="pass">Home Area:</label>
       <input type="text" class="form-control" id="focusedInput" placeholder="Enter Home Area" name="home" >
	   <span class="text-danger"><?php echo form_error('home'); ?></span>
	</div>
 </div>
 <div class ="row">
 <div class="form-group col">
      <label class="control-label col-sm-3" for="city">City:</label>
        <input type="text" class="form-control" id="focusedInput" placeholder="Enter City" name="city" >
		<span class="text-danger"><?php echo form_error('city'); ?></span>
    </div>
    <div class="form-group col col-sm-6">
      <label class="control-label col-sm-3" for="email">Country:</label>
        <input type="text" class="form-control" id="focusedInput" placeholder="Enter Country" name="country">
		<span class="text-danger"><?php echo form_error('country'); ?></span>
</div>
  </div>
</br>
    <div class="form-group" style="padding-left: 250px !important;">        
      <div class="col-sm-offset-3 col-sm-8">
        <button type="submit" class="btn btn-success btn-block">Register</button>
      </div>  
    </div>
	  <p class ="text-danger"><?php echo $this->session->flashdata('login_error'); ?></p>
  </form>
  <br/>
   <div class ="div-custom" align ="right" style="padding: 20px !important;">
      <label class="control-label col-sm-13" for="signup">Already have an account?</label>
         <a class="text-success" href="<?= base_url('sign-in'); ?>">Login<span class='fas fa-sign-in-alt' style='font-size:20px'></span> </a><br/>
	</div>
    </div>
  </div>
</div>
</body>
</html>