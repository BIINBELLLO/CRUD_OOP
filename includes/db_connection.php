<?php
	class DB_Connect {
		private $servername;
		private $username;
		private $password;
		private $dbname;

		protected function connect_db() {
			$this->servername = "localhost";
			$this->username = "root";
			$this->password = "";
			$this->dbname = "crud_oop";

			$connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

			return $connection;
		}
	}
?>