<?php 

	require_once('db.php');
	session_start();
	if (!isset($_SESSION['user_id'])) {
	echo '<script>
	window.location.href = "login.php";
	</script>';
}
	//$sql = 'insert into users(name,password) values('.$userName.','.$password.')';
	//$sql ="delete from coldBeverages where id = 1";
	//$sql = 'SELECT '
	$sql ="SELECT * from blogposts WHERE isVerified = 1 and authorID=".$_SESSION['user_id'];
	$result = mysqli_query($conn,$sql);
	echo '<a href="logout.php"><h1>Logout</h1></a>';
	if(mysqli_num_rows($result)==0)
		echo "No Blog Post";
	else{
		
		while($row =  mysqli_fetch_assoc($result)){
			//echo '<a href="blogpost.php?id='.$row['id'].'"><h2>'.$row['headline'].'</h2></a>';
		?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

			<a href="blogpost.php?id=<?=$row['id']?>"><h2><?=$row['headline']?></h2></a>
			<h4><?=$row['description']?></h4><br>
			
			<a href="editpost.php?id=<?=$row['id']?>"><br><h4>Edit</h4></a>
</body>
</html>
		<?php
			//echo '<h4>'.$row['description'].'</h4><br>';
		}
		
		
		/*$fetch = mysqli_fetch_array($result);
		foreach ($fetch as $row) {
			

		}*/
		

	}


?>

