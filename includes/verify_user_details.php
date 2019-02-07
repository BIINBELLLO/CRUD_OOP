<?php
	session_start();
	include('db_connection.php');
	include('user_class.php');
	if (isset($_POST['login'])) {
		$Email = $_POST['email'];
		$Password = $_POST['pswd'];

		$logged_in_user = new User;
		$User_Data = $logged_in_user->loginUser($Email, $Password);

		// $Array = array();
		// $Array = $User_Data;

		if ($User_Data == false) {
			$_SESSION['Error'] = "Wrong Credentials, Access Denied!";
			header("Location: ../login.php");
		}else{
			// $_SESSION['user'] = $User_Data['Email'];
			// header("Location: ../dashboard.php");
			foreach ($User_Data as $data) {
				$_SESSION['user'] = $data['Email'];
				header("Location: ../dashboard.php");
			}
		}

	}
?>