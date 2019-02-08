<?php
	/**
	* 
	*/
	class Property extends DB_Connect
	{
		public $name;
		public $color;
		public $price;
		public $date;
		public $owner;
		public function __construct()
		{
			# code...
		}

		public function fetchProducts($Owner)
		{
			$sql = "SELECT * FROM properties WHERE Owner = '".$Owner."'";
			$result = $this->connect_db()->query($sql);
			$NumRows = $result->num_rows;
			if ($NumRows == 0) 
			{
				return false;
			}
			else 
			{
				while ($row = $result->fetch_assoc()) {
					# code...
					$Data[] = $row;
				}
				return $Data;
			}
		}

		public function updateProduct($Owner, $id , $Name, $Color, $Price)
		{
			$sql = "UPDATE properties SET Name = '".$Name."', Color = '".$Color."', Price = '".$Price."' 
			WHERE Owner = '".$Owner."' AND id = '".$id."'";
			$result = $this->connect_db()->query($sql);
			if ($result) {
				return true;
			}else{
				return false;
			}
		}

	}
?>