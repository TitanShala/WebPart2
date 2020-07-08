<?php
include_once '..//Models/DbConn.php';
	
	if(isset($_POST['DeleteSubmit'])){
		
		//$DoctorId = $_POST['DeleteInput'];
		$DoctorId = filter_input(INPUT_POST,'DeleteInput');
		$count = 0 ;

		$DeleteDoctor = new DeleteDoctor();
		
		if(strlen($DoctorId)<1 || !$DeleteDoctor->isInteger($DoctorId)){			
			
			$error = "Type ID as an integer" ;
			$count++;
			
		}

		else{
		$obj = new DBConnection();
        $connection = $obj->getConnection();
		//$DoctorId = filter_input(INPUT_POST,'DeleteInput');
		$sql = "Delete from Doktori where Id = ".$DoctorId;		
		try{
		$statement = $connection->prepare($sql);		
		$statement->execute();
		}catch(Exception $e){
			$Error="Id doesn't exist";
		} 
		}
		include '../WebPages/RegisterDoctor.php';
	}

	class DeleteDoctor {
	
	public function isInteger($input){
		return(ctype_digit(strval($input)));
		}
	}
?>