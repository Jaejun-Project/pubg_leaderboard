<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD Form | DVD Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">

	<style>
	.form-check-label {
		padding-top: calc(.5rem - 1px * 2);
		padding-bottom: calc(.5rem - 1px * 2);
		margin-bottom: 0;
	}
</style>
</head>
<body>
	<?php include 'nav.php'; ?>	
		<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4 mb-4">Register</h1>
		</div> <!-- .row -->
	   </div> <!-- .container -->
		

        <div class= "container">
		<form action="registerValidate.php" method="POST">	
			<div class="row mb-3">
				<div id="form-error" class="col-sm-9 ml-sm-auto font-italic text-danger">
				</div>
			</div> <!-- .row -->
			<div class="form-group row">
				<label for="release-date-id" class="col-sm-3 col-form-label text-sm-right"></label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="release-date-id" class="col-sm-3 col-form-label text-sm-right"></label>
				<div class="col-sm-9">
					<input type="password" class="form-control" id="password1" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*()-+=_]).{5,}" placeholder="Password" title="Must contain at least one number and one special character and lowercase letter, and at least 5 or more characters" required>
				</div>
			</div>

			<div class="form-group row">
				<label for="release-date-id" class="col-sm-3 col-form-label text-sm-right"></label>
				<div class="col-sm-9">
					<input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" required>
				</div>
			</div>

			<div class="form-group row">
				<label for="release-date-id" class="col-sm-3 col-form-label text-sm-right"></label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="email-id" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
				</div>
			</div> <!-- .form-group -->		
			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-light">Reset</button>
				</div>
			</div>	
		</form>
	</div> <!-- .container -->

<script type="text/javascript">
	

	var password = document.getElementById("password1")
	var confirm_password = document.getElementById("password2");

	function passValidate(){
	  if(password.value != confirm_password.value) {
	    confirm_password.setCustomValidity("Passwords Don't Match");
	  } else {
	    confirm_password.setCustomValidity('');
	  }
	}
	password.onchange = passValidate;
	confirm_password.onkeyup = passValidate;


	document.querySelector('form').onsubmit = function(){

			if ( document.querySelector('#email-id').value.trim().length == 0
				|| document.querySelector('#username').value.trim().length == 0
				|| document.querySelector('#password').value.trim().length == 0 ) {

				document.querySelector('#form-error').innerHTML = 'Please fill out all required fields.';

				return false;
				
			}
		}
</script>
</body>
</html>