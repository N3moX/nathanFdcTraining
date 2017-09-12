<?php 
	include('api.php');
	if(isset($_POST['register']))
	{
		$firstname = trim($_POST['firstname']);
		$middlename = trim($_POST['middlename']);
		$lastname = trim($_POST['lastname']);
		$gender = trim($_POST['gender']);
		$birthdate = trim($_POST['birthdate']);
		$created_date = date('Y-m-d h:i:s');
		$modified_date = date('Y-m-d h:i:s');
        $created_ip = $_SERVER['REMOTE_ADDR'];
        $modified_ip = $_SERVER['REMOTE_ADDR'];		

		add_user($firstname, $middlename, $lastname, $gender, $birthdate, $created_date, $modified_date, $created_ip, $modified_ip);
		echo "<script>alert('Successfully added!'); location.href='index.php';</script>";
		echo"<br><br>";
	}	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Simple registration</title>
    <script src="../nathan/jquery/jquery.min.js"></script>
    <script src="../nathan/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../nathan/css/bootstrap.min.css">
</head>
<body>
	<br><br>
	<div class="container" style="al">
		<form method= "POST">
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<h3>User registration form</h3>						
				</div>

			</div>
			<div class="form-group">
				<div class="col-md-6">
					<input id="fn" name="firstname" type="text" placeholder="firstname" class="form-control input-md" required="">
				</div>
			</div>
			<br>
			<div class="form-group">
				<div class="col-md-6">
					<input id="fn" name="middlename" type="text" placeholder="middlename" class="form-control input-md" required="">
				</div>
			</div>
		 	<br>
		 	<div class="form-group">
		  		<div class="col-md-6">
		  			<input id="fn" name="lastname" type="text" placeholder="lastname" class="form-control input-md" required="">
		  		</div>
		 	</div>	
		 	<br>

	 		<div class="form-group">
				 <div class="col-md-2">
					<select class="form-control" id="sel1" name="gender" required="">
						<option value="" selected disabled>Gender</option>
						<option>Male</option>
						<option>Female</option>
						<option>Others</option>
					</select>
				</div>
			</div>
		 	<br>
			<div class="form-group">
				<div class="col-md-3">
					<input id="fn" name="birthdate" type="date" placeholder="birthdate" class="form-control input-md" required="">
			  </div>
			</div>	
			<br>
		  	<div class="form-group"> 
		    	<div class="col-sm-offset-2 col-sm-10">
		    		<input name="register" type="submit" class="btn btn-info btn-lg" value="Register">
		      		<a href="user_list.php" >&lt;&lt;&nbsp;Registered users&nbsp;&gt;&gt;</a>
		    	</div>
		  	</div>
		</form>
	</div>
</body>
</html>

