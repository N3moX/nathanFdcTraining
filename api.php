<?php 
	function db()
	{
		try {
			$db = new PDO("mysql:host=localhost;dbname=my_db","root","admin123");
			return $db;
		} catch (PDOException $e) {
			echo 'Connection failed'.$e->getMessage();
		}
	}

	function add_user($firstname, $middlename, $lastname, $gender, $birthdate, $created_date, $modified_date, $created_ip, $modified_ip)
	{
		$db = db();
		$sql = "INSERT INTO users(firstname, middlename, lastname, gender, birthdate, created_date, modified_date, created_ip, modified_ip) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$st = $db->prepare($sql);
		$st->execute(array($firstname, $middlename, $lastname, $gender, $birthdate, $created_date, $modified_date, $created_ip, $modified_ip));
		$db = null;
	}

	function count_users()
	{
		$db = db();
		$sql = "SELECT COUNT(user_id) FROM users";		
		$st = $db->prepare($sql);
		$st->execute(array());
		$result = $st->fetchColumn();
		$db = null;
		return $result;
	}

/*	<-------- Get Data functions -------->  */

	// function get_users()
	// {
	// 	$db = db();
	// 	$sql = "SELECT * FROM users";
	// 	$st = $db->prepare($sql);
	// 	$st->execute(array());
	// 	$users = $st->fetchAll();
	// 	$db = null;
	// 	return $users;
	// }

	function get_user($user_id)
	{
		$db = db();
		$sql = "SELECT * FROM users WHERE user_id=?";
		$st = $db->prepare($sql);
		$st->execute(array($user_id));
		$user = $st->fetchAll();
		$db = null;	
		return $user;	
	}

	function get_users($limit, $offset)
	{	
		$db = db();
		$sql = "SELECT * FROM users LIMIT $offset, $limit";
		$st = $db->prepare($sql);
		$st->execute();
		$users = $st->fetchAll();
		$db = null;
		return $users;
	}

/*	<-------- Delete and Update functions -------->  */

	function delete_user($user_id)
	{
		$db = db();
		$sql = "DELETE FROM users WHERE user_id =?";
		$st = $db->prepare($sql);
		$st->execute(array($user_id));
		$db = null;
	}

	function update_user($firstname, $middlename, $lastname, $gender, $bithdate, $created_date, $modified_date, $created_ip, $modified_ip, $user_id)
	{
		$db = db();
		$sql = "UPDATE users SET firstname=?, middlename=?, lastname=?, gender=?, birthdate=?, created_date=?, modified_date=?, created_ip=?, modified_ip=? WHERE user_id=?";
		$st = $db->prepare($sql);
		$st->execute(array($firstname, $middlename, $lastname, $gender, $bithdate, $created_date, $modified_date, $created_ip, $modified_ip, $user_id, ));
		$db = null;		
	}

	






	// function createacc($hobno, $fname, $lname, $email, $pass){
	// $db = dbcon();
	// $sql = "insert into hobbyist(hobdatereg, hobno, hobstatus, hobfname, hoblname, hobemail, hobpass, hobcontno, hobaddress, hobdob) 
 //         values ('".date("Y-m-d")."', ? ,'ACTIVE', ? , ? , ? , ? , 0, 'NA', '0000-00-00')";
 //    $var = $db->prepare($sql);
 //    $var->execute(array($hobno, $fname, $lname, $email, $pass));
 //    $db = null;
// }
 ?>