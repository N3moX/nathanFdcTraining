<?php 

if (isset($_POST['register'])) {

	insert($_POST);
}


function insert($data = array()) {


	$firstname = $data['firstname'];
	$middlename = $data['middlename'];
	$lastname = $data['lastname'];
	$gender = $data['gender'];
	$birthdate = $data['birthdate'];

	// $created_ip = $_SERVER['A']
	$created_ip = '12312311';
	$modified_ip = $created_ip;

	$created_date = date('Y-m-d H:i:s');
	$modified_date = $created_date;

	$host = "localhost";
	$databse = "my_db";
	$username = "root";
	$password = "admin123";

	$pdoString = "";
	$pdoString .= "mysql:host=" . $host . ";";
	$pdoString .= "dbname=" . $databse;

	$con = new PDO($pdoString, $username, $password);

	// prepare insert
	$query = $con->prepare('INSERT INTO `users` (`firstname`, `middlename`, `lastname`, `gender`, `birthdate`, `created_date`, `modified_date`, `created_ip`, `modified_ip`) 
	VALUES (:firstname, :middlename, :lastname, :gender, :birthdate, :created_date, :modified_date, :created_ip, :modified_ip)');

	// bind values
	$query->bindParam(':firstname', $firstname);
	$query->bindParam(':middlename', $middlename);
	$query->bindParam(':lastname', $lastname);
	$query->bindParam(':gender', $gender);
	$query->bindParam(':birthdate', $birthdate);
	$query->bindParam(':created_date', $created_date);
	$query->bindParam(':modified_date', $modified_date);
	$query->bindParam(':created_ip', $created_ip);
	$query->bindParam(':modified_ip', $modified_ip);

	// execute insert
	if ($query->execute()) {
	$result['result'] = 'saved';
	} else {
	// $result['error'] = date('Y-m-d H:i:s') . ': ' . $query->errorInfo();
		$result['error'] = "error";
	}

	echo '<pre>';
	var_dump($result);
	exit;
	
}

?>


<form method="POST" action="api_mysample.php">
	<div class="form-group">
		<div class="col-md-3">
		<input id="fn" name="firstname" type="text" placeholder="firstname" class="form-control input-md" required="">
		</div>
		<br>
		<div class="form-group">
		<div class="col-md-3">
		<input id="fn" name="middlename" type="text" placeholder="middlename" class="form-control input-md" required="">
		</div>
		<br>
		<div class="form-group">
		<div class="col-md-3">
		<input id="fn" name="lastname" type="text" placeholder="lastname" class="form-control input-md" required="">
		</div>	
		<br>
		<div class="form-group">
		<div class="col-md-3">
		<input id="fn" name="gender" type="text" placeholder="gender" class="form-control input-md" required="">
		</div>	
		<br>
		<div class="form-group">
		<div class="col-md-3">
		<input id="fn" name="birthdate" type="date" placeholder="birthdate" class="form-control input-md" required="">
		</div>	
		<br>
		<!-- 	 <div class="form-group">
		<div class="col-md-3">
		<input id="fn" name="created_ip" type="text" placeholder="created_ip" class="form-control input-md" required="">
		</div>	
		<br>
		<div class="form-group">
		<div class="col-md-3">
		<input id="fn" name="modified_ip" type="text" placeholder="modified_ip" class="form-control input-md" required="">
		</div> -->	
		<br>
		<div class="form-group"> 
		<div class="col-sm-offset-2 col-sm-10">
		<input name="register" type="submit" class="btn btn-info" value="Register">
		</div>
	</div>
</form>