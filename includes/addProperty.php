<?php

	session_start();
	include('db_connection.php');
	include('property_class.php');

	if (isset($_POST['addNew'])) {
		# code...
	$Name = $_POST['name'];
	$Color = $_POST['color'];
	$Price = $_POST['price'];
	$Date = $_POST['date'];

	$property = new Property;
	$result = $property->addNewProperty($_SESSION['user'], $Name, $Color, $Price, $Date);

	if ($result == true) {
		# code...
		$_SESSION['Success'] = "New Property Saved Successfully";
		header("Location: ../dashboard.php");
	}else{
		$_SESSION['Error'] = "New Property Not Added";
		header("Location: ../dashboard.php");
	}
	}

?>