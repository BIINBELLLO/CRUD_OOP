<?php

	session_start();
	include('db_connection.php');
	include('property_class.php');

	if (isset($_POST['yesDelete'])) {
		# code...
	$ID = $_POST['id'];

	$property = new Property;
	$result = $property->deleteProperty($_SESSION['user'], $ID);

	if ($result == true) {
		# code...
		$_SESSION['Success'] = "Property Deleted Successfully";
		header("Location: ../viewfull_property.php");
	}else{
		$_SESSION['Error'] = "Property Not Deleted";
		header("Location: ../viewfull_property.php");
	}
	}

?>