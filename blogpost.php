<?php 

if(isset($_GET['id'])){

	require_once('db.php');

	$bid = $_GET['id'];
	$sql ='SELECT headline,context from blogposts WHERE id='.$bid;
	$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==0)
			echo "No Blog Post";
		else{
			$value = mysqli_fetch_assoc($result);
			echo $value['context'];
		}


}
else{
	echo 'no';
}


?>