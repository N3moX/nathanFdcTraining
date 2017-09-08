<?php 
	 include('api.php');
	$user_id = $_GET['id'];
	delete_user($user_id);
	echo"<script>
			window.location.href='user_list.php'
		</script>";
 ?>