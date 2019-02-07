<?php
	session_start();
	include('db_connection.php');
	include('user_class.php');
	if (isset($_POST['register'])) {
		$Full_Name = $_POST['fullname'];
		$Occupation = $_POST['occup'];
		$Email = $_POST['email'];
		$Pwd = $_POST['pswd'];
		$C_Pwd = $_POST['pswd_2'];
		$date = date('Y-m-d');

		if ($Pwd != $C_Pwd) {
			$_SESSION['Error'] = "Password Mismatch";
			header("Location: ../reg.php");
		}

		$new_user = new User;

		$Data = $new_user->getUserDetails($Full_Name, $Occupation, $Email, $Pwd, $date);

		$Result = $new_user->saveUserDetails($Data);

		if ($Result==true) {
			$_SESSION['Success'] = "User Registered Successfully";
			header("Location: ../index.php");
		}else{
			$_SESSION['Error'] = "User Not Registered";
			header("Location: ../reg.php");
		}


	}

?>