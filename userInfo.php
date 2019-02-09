<?php
 		include_once('db.php');
 
		$name = $_POST['name'];
		$age = $_POST['age'];
 
		if(mysqli_query($conn, "INSERT INTO user VALUES('$name', '$age')"))
		  echo "Successfully Inserted";
		else
		  echo "Insertion Failed";
?>