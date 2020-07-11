<?php
include_once '..//Models/DbConn.php';
include_once '../Controller/DoctorController.php';
	
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
		}
		
	}

	include '../WebPages/RegisterDoctor.php';
?>

<script>        
		var DeleteForm = document.querySelector('.DeleteForm');
        var RegisterForm = document.querySelector('.RegisterForm');
        var EditForm = document.querySelector('.EditForm');

        RegisterForm.style.display = 'none';
        DeleteForm.style.display='flex'; 
        EditForm.style.display='none';
		</script>