<?php

	function db()
	{
		return new PDO("mysql:host=localhost;dbname=my_db","root","admin123");
	}

    try {
        $dbh = db();
        echo('connected successfully!');
    } catch (PDOException $e) {
       echo $e->getMessage(); 
    }

//     try {
//  $dbh = db();
// } catch(PDOException e){
//  echo $e->getMessage();
// }

	function insert($firstname)
	{
       // $created_ip = $_SERVER['REMOTE_ADDR'];
        // $modified_ip = $_SERVER['REMOTE_ADDR'];
        $db = db();

        if($db){
            echo "true";
        }
        else{
            echo "false";
        }
		$sql = "INSERT INTO users(firstname) VALUES ('SAD')";
        $st = $db->prepare($sql);
        //var_dump($st);
		$st->execute(array($firstname));
        $db = null;
	}


  //   $con = new PDO($pdoString, $username, $password);

  // // prepare insert
  // $query = $con->prepare('INSERT INTO `teacher_monitor_images`(`teacher_id`, `teacher_status`, `image_data_uri`, `created`, `modified`, `created_ip`, `modified_ip`) 
  //    VALUES (:teacher_id, :teacher_status, :image_data_uri, :created, :modified, :created_ip, :modified_ip)');

  // $dateTime = date('Y-m-d H:i:s');

  // $clientIpAddress = !empty($ipAddress) ? $ipAddress : $_SERVER['REMOTE_ADDR'];

  // // bind values
  // $query->bindParam(':teacher_id', $teacherId);
  // $query->bindParam(':teacher_status', $teacherStatus);
  // $query->bindParam(':image_data_uri', $dataURI);
  // $query->bindParam(':created', $dateTime);
  // $query->bindParam(':modified', $dateTime);
  // $query->bindParam(':created_ip', $clientIpAddress);
  // $query->bindParam(':modified_ip', $clientIpAddress);

?>