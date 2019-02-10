<?php
	session_start();
	include('db_connection.php');
	include('property_class.php');

	$Name = $_POST['name'];
	$Color = $_POST['color'];
	$Price = $_POST['price'];
	$ID = $_POST['id'];

	// $Name = "Bags";
	// $Color = "Red";
	// $Price = "45000";
	// $ID = 1;

	// $Data = $_POST['serialize'];
	// $Name = $Data['name'];
	// $Color = $Data['color'];
	// $Price = $Data['price'];
	// $ID = $Data['id'];

	$edited_Property = new Property;

	$result = $edited_Property->updateProduct($_SESSION['user'], $ID, $Name, $Color, $Price);
	if ($result == true) {
		# code...
		echo "Property Updated!!";
		// $_SESSION['success'] = "Property ".$Name." Updated!!";
		// header("Location: ../viewfull_property.php");
	}else{
		echo "Property Update Failed!!";
		// $_SESSION['Error'] = "Property ".$Name." Update Failed!!";
		// header("Location: ../viewfull_property.php");
	}
?>