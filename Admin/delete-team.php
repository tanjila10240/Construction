<?php 

require_once('functions/function.php');
needLogged();
$id=$_GET['do'];
$del="DELETE FROM our_team WHERE our_id='$id'";

if(mysqli_query($con,$del)){
	header('location: all-team.php');
}else{
	echo "Opps! Failed your operation.";
}

 ?>