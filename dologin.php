<?php 
session_start();
if(isset($_GET['n']) && isset($_GET['p'])){
	require_once('db.php');
	$stmt="SELECT * From authors Where username ='".$_GET['n']."'";
	$r = mysqli_query($conn,$stmt);
	
    $user = mysqli_fetch_assoc($r);
    if ( strcmp( (string) $_GET['p'],(string) $user['password'] )== 0){
    		$_SESSION['user_id'] = $user['id'];
    		
    		echo "yes";
	}
	else
		echo "no";
}
?>