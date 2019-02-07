<?php
	class User extends DB_Connect{
		public $full_name;
		public $occupation;
		public $email;
		public $password;
		public $date;

		// public function __construct($full_name, $occupation, $email, $password, $date){
		// 	$this->full_name = $full_name;
		// 	$this->occupation = $occupation;
		// 	$this->email = $email;
		// 	$this->password = $password;
		// 	$this->date = $date;
		// }

		public function getUserDetails($full_name, $occupation, $email, $password, $date) {
			$this->full_name = $full_name;
			$this->occupation = $occupation;
			$this->email = $email;
			$this->password = $password;
			$this->date = $date;

			$Data = array($this->full_name, $this->occupation, $this->email, $this->password, $this->date);

			return $Data;
		}

		public function saveUserDetails( array $Data) {
			$sql = "INSERT INTO user_details (`Full_Name`, `Occupation`, `Email`, `Password`, `created_at`)
			VALUES ('".$Data[0]."','".$Data[1]."','".$Data[2]."','".$Data[3]."','".$Data[4]."')";
			$result = $this->connect_db()->query($sql);
			if ($result) {
				return true;
			}else{
				return false;
			}
		}

		public function loginUser($email, $password) {
			$sql = "SELECT * FROM user_details WHERE Email = '".$email."' AND Password = '".$password."'";
			$result = $this->connect_db()->query($sql);
			$numRows = $result->num_rows;
			if ($numRows == 1) {
				$Data[] = $result->fetch_assoc();
				return $Data;
			}else{
				return false;
			}
		}

		public function fetchUserDetails($Email) {
			$sql = "SELECT * FROM user_details WHERE Email = '".$Email."'";
			$result = $this->connect_db()->query($sql);
			$numRows = $result->num_rows;
			if ($numRows == 1) {
				$Data = $result->fetch_assoc();
				return $Data;
			}else{
				return false;
			}
		}





	}
?>