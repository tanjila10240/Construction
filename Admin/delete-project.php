<?php 

require_once('functions/function.php');
needLogged();
$id=$_GET['dp'];
$del="DELETE FROM projects WHERE project_id='$id'";

if(mysqli_query($con,$del)){
	header('location: all-project.php');
}else{
	echo "Opps! Failed your operation.";
}

 ?>