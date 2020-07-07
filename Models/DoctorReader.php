<?php
include 'DbConn.php';
class DoctorReader{

	
	private $connection;
	
	public function __construct(){
		$obj = new DBConnection();
		$this->connection= $obj->getConnection();
		
	}

		public function GetDoctors(){
		$sql = "Select * FROM Doktori";
		$getresults = $this->connection->prepare($sql);
		$getresults->execute();
		$results = $getresults->fetchAll(PDO::FETCH_BOTH);
		return $results ;
	}

}
?>