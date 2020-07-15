<?php
include_once '..//Models/DbConn.php';
include_once '../Controller/DoctorController.php';
@session_start();
	if(isset($_POST['DeleteSubmit'])){
		$Controller = new DoctorController();
		$DoctorId = filter_input(INPUT_POST,'DeleteInput');
		$count = 0 ;
		if(!$Controller->isInteger($DoctorId)){					
			$error = "Type ID as an integer" ;
			$count++;		
		}else{
			$sql = "Select * from Doktori where id ='".$DoctorId."'";
			$result = $Controller->filterTable($sql);
			if(count($result) < 1){
				$error = "Id does not exist";
				$count++;
			}
		}

		if($count==0){
			$obj = new DBConnection();
			$connection = $obj->getConnection();
			//$DoctorId = filter_input(INPUT_POST,'DeleteInput');
			$sql = "Delete from Doktori where Id = ".$DoctorId;		
			$statement = $connection->prepare($sql);		
			$statement->execute();
			$DeleteResult = "Doctor Successfully deleted";
			$DoctorId = "" ;
			echo '<script> alert("Doctor deleted succesfully !") </script>';
		}
		include '../WebPages/RegisterDoctor.php';
		echo '<script> DeleteClick(); </script>';
		
		}       
	else if(!isset($_SESSION['Username'])){
		header("Location: ../WebPages/Login.php"); 
	}	
?>
