<?php 
	include('api.php');

	$user_id = $_GET['id'];
	echo $user_id;
//	update_user($user_id);
	
	$user = get_user($user_id);
	
//	var_dump($user);
	if (isset($_POST['update']))
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

		update_user($firstname, $middlename, $lastname, $gender, $birthdate, $created_date, $modified_date, $created_ip, $modified_ip, $user_id);
		echo "<script>alert('Successfully updated!'); location.href='user_list.php';</script>";
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

	<?php foreach($user as $u){ ?>
	<div class="container">
		<form method= "POST">
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<h3>Update user information</h3>						
				</div>
			</div>
			<div class="form-group">
			 	<div class="col-md-6">
			  		<input id="fn" name="firstname" type="text" class="form-control input-md" value="<?php echo $u['firstname'] ?>" required="">
			 	</div>
			</div>
			 <br>
			 <div class="form-group">
			 	<div class="col-md-6">
			  		<input id="fn" name="middlename" type="text" class="form-control input-md" value="<?php echo $u['middlename'] ?>" required="">
			 	</div>	
			 </div>
			 <br>
			 <div class="form-group">
			  	<div class="col-md-6">
			  		<input id="fn" name="lastname" type="text" class="form-control input-md" value="<?php echo $u['lastname'] ?>" required="">
			 	</div>
			 </div>	
			 <br>

	 		 <div class="form-group">
			 	<div class="col-md-2">
			 	  <select value="<?php $u['gender'] ?>" class="form-control" id="sel1" name="gender" required="">
			 	  	<option selected disabled>Gender</option>
			        <option>Male</option>
			        <option>Female</option>
			        <option>Others</option>
			      </select>
			 	</div>
			 </div>
			 <br>
			 <div class="form-group">
			  	<div class="col-md-3">
			  		<input id="fn" name="birthdate" type="date" class="form-control input-md" value="<?php echo $u['birthdate'] ?>" required="">
			 	</div>	
			 </div>
			 <br>
			 <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <input name="update" type="submit" class="btn btn-info btn-lg" value="Update">
			      <a href="user_list.php" >&lt;&lt;&nbsp;Registered users&nbsp;&gt;&gt;</a>
			    </div>
			 </div>
		</form>
		<?php } ?>
	</div>
</body>
</html>
