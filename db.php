<?php
class database{
	private $servername="sql203.epizy.com";
	private $username="epiz_33062307";
	private $pass="RiNc8E5YY9kC";
	private $dbname="epiz_33062307_shopping";
	private $mysqli = "";

	public function __construct()
	{
		$this->mysqli = new mysqli($this->servername,$this->username,$this->pass,$this->dbname);
	}
	public function insertdata($insert_query)
	{
		if($this->mysqli->query($insert_query) === true){
			return true;
		}
		else
		{
			return false;
		}
	}
	public function fetchdata($fetch_query){
		return $this->mysqli->query($fetch_query);

	}
	public function updatedata($up_query){
		return $this->mysqli->query($up_query);

	}
}








?>