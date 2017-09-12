<?php 
	include('api.php');

	$word = null;
	if(isset($_GET['search'])){
		$word = $_GET['search'];

	}
	echo $word;
	$users = search($word);

 ?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="../nathan/jquery/jquery.min.js"></script>
	    <script src="../nathan/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="../nathan/css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>

<br><br>
 		<div class="container">	
  		  	<a href="index.php">Registration form</a>	|
  		  	<a href="user_list.php">Users List table</a>		
 		  	<h2>Search Users</h2>
		  <div class="row">
		  		<div class="col">
			    	<form >
			    		<input type="text" name="search" placeholder="Search">
			    		<button class="btn btn-info"><i class="glyphicon glyphicon-search"></i></button>
			    	</form>
			    </div>
		  </div>

			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>Id</th>
						<th >Firstname</th>
						<th >Middlename</th>
						<th >Lastname</th>
						<th >Gender</th>
						<th style="min-width:100px; text-align: center">Birthdate</th>
						<th style="min-width:150px; text-align: center">Created date</th>
						<th style="min-width:150px; text-align: center">Modified date</th>
						<th style="min-width:150px; text-align: center">Created IP</th>
						<th style="min-width:150px; text-align: center">Modified IP</th>
						<th colspan="2" style="text-align: center">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$count = 1;
					foreach ($users as $u) { ?>
					<tr>
						<td><?php echo $count++ ?></td>
						<td style="text-align: center"><?php echo $u['firstname'] ?></td>
						<td style="text-align: center"><?php echo $u['middlename'] ?></td>
						<td style="text-align: center"><?php echo $u['lastname'] ?></td>
						<td style="text-align: center"><?php echo $u['gender'] ?></td>
						<td style="text-align: center"><?php echo $u['birthdate'] ?></td>
						<td style="text-align: center"><?php echo $u['created_date'] ?></td>
						<td style="text-align: center"><?php echo $u['modified_date'] ?></td>
						<td style="text-align: center"><?php echo $u['created_ip'] ?></td>
						<td style="text-align: center"><?php echo $u['modified_ip'] ?></td>
						<td>
							<a class="btn btn-info" href="update_user.php?id=<?php echo $u['user_id']?>">
					          <span class="glyphicon glyphicon-pencil"></span> Update
					        </a>
						</td>
						<td>
							<a class="btn btn-danger" href="delete.php?id=<?php echo $u['user_id']?>" onclick="confirm('Are you sure?'); ">
							<span class="glyphicon glyphicon-trash"></span> Delete
							</a>
						</td>

					</tr>
				<?php } ?>
				</tbody>
			</table> 
		</div>
	</body>
</html>
