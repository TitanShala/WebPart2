<?php
include_once 'DbConn.php';
include_once 'DoctorModel.php';
class DoctorMapper{

	private $Doctor;
	private $connection;
	
	public function __construct($Doctor){
		$obj = new DBConnection();
		$this->connection= $obj->getConnection();
		$this->Doctor=$Doctor;
	}

	

	public function Insert($Name, $Surname, $Specialization, $Experience, $Admin){
		$sql = "INSERT INTO Doktori (Emri,Mbiemri,Specializimi,Pervoja,Stafi) VALUES (:Name, :Surname, :Specialization, :Experience, :Admin)";
		$statement = $this->connection->prepare($sql);
		$statement->bindParam(":Name", $Name);
		$statement->bindParam(":Surname", $Surname);
		$statement->bindParam(":Specialization", $Specialization);
		$statement->bindParam(":Experience", $Experience);
		$statement->bindParam(":Admin", $Admin);
		$statement->execute();

	}

}

?>