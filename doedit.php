<?php 

if(isset($_GET['id']) && isset($_GET['t'])){

	require_once('db.php');
	$bid = intval($_GET['id']);
	$text = $_GET['t'];
	
	$sql =" UPDATE blogposts SET context= '$text' WHERE id='$bid'";
	//$result = mysqli_query($conn,$sql);
	
	if(mysqli_query($conn,$sql))
		echo "yes";
	else{
		echo "no";
	}

}
else{
	echo 'noparameter';
}
?>