<?php 
	session_start();
if (isset($_SESSION['user_id'])) {
	echo '<script>
	window.location.href = "index.php";
	</script>';
}
	
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script >
	$(document).ready(function(){
		$("#submit").click( function(){
			verifyUser("dologin.php",$("#username").val(), $("#password").val());
		});
		});
	function verifyUser(siteurl,username, pass){
		$.ajax({
			url: siteurl,
			type: "GET",
			data:  { n : username, p : pass }, 
			success : function(result){
					console.log(result);
					if(result == "yes"){
						window.location.href = "index.php";
					}
					else{
						alert("get auda here");
					//	$("#succ").show("slow").delay(5000).hide("slow");
					//	}
					//else if(result == "no"){
					//	$("#error").show("slow").delay(5000).hide("slow");
					//	}
					
					}
				}
			});

	}
	<?php 
		// header("Location : index.php");
	?>

</script>
</head>
<body>
	<form action="" method="GET" onsubmit="return false;">
		<input type="text" id="username" placeholder="Enter your username" required="true">
		<input type="password" id="password" placeholder="Enter tour password" required="true">
		<button id="submit"   >Submit</button>
	</form>

</body>
</html>