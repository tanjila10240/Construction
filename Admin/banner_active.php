<?php

	require_once('functions/function.php');

	$inactive_query = "UPDATE banners SET status = 'inactive'";

	mysqli_query($con, $inactive_query);


	$id=$_GET['id'];

	$active_query = "UPDATE banners SET status = 'active' WHERE ban_id = '$id'";

	if (mysqli_query($con, $active_query)) {
		header('location: all-banner.php');
	}else{
		echo "something id wrong";
	}

?>