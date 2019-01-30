<?php 
session_start();
	echo $_SESSION["user_id"];
if(isset($_GET['id'])){

	require_once('db.php');
	$bid = $_GET['id'];
	$sql ='SELECT headline,context,id from blogposts WHERE id='.$bid;
	$result = mysqli_query($conn,$sql);
	$value = '';
	if(mysqli_num_rows($result)==0)
		echo $value;
	else{
		$value = mysqli_fetch_assoc($result);
		//echo $value['context'];
	}

}
else{
	echo 'no';
}
?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	<script> 
		$(document).ready(function(){
			$("#succ").hide();
			$("#error").hide();
			
    		$("#submit").click(function(){
    			ajaxSorguFonksiyonu("doedit.php", $("#textarea").val(), $("#bid").val());
	  
			});
    	});

    	function ajaxSorguFonksiyonu(siteurl, text, bid){
			$.ajax({
				url: siteurl,
				type: "GET",
				data:  { t : text, id : bid }, 
				success : function(result){
					console.log(result);
					if(result == "yes"){
						$("#succ").show("slow").delay(5000).hide("slow");
					}
					else if(result == "no"){
						$("#error").show("slow").delay(5000).hide("slow");
					}
				}
			});
    	}
			

	</script>
	<style >
        
	</style>
</head>
<body>
	<div class="alert alert-success" id="succ">
	  <strong>Success!</strong> Indicates a successful or positive action.
	</div>
	<div id="error" >Save Error</div>
	<div class="container">

		<form action="doedit.php" method="get" onsubmit="return false;">
				
		  	<textarea type='textarea' id="textarea" class="input-element" ><?=$value['context']?></textarea>
		  	
		  	<input type="hidden" id="bid" value="<?=$value['id']?>" >
			
			<button name="button" id="submit" value="Submit">Submit</button>
		</form>
		
	</div>

	




</body>
</html>