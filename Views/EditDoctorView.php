<?php
include_once '../Models/DbConn.php';
include_once '../Views/InsertDoctorView.php';

	

	if(isset($_POST['SubmitInputt'])){
		
		$DocID = filter_input(INPUT_POST,'Id');
		$DocName =filter_input(INPUT_POST,'Emri');
		$DocSurname =filter_input(INPUT_POST,'SurnameInput');
		$DocSpecialization =filter_input(INPUT_POST,'SpecializationInput');
		$DocExperience =filter_input(INPUT_POST,'ExperienceInput');
		$count = 0 ;
		$View = new InsertView();
		
		if(strlen($DocID)<1 || !$View->isInteger($DocID)){			
			
			$IdError = "Type ID as an integer" ;
			$count++;		
		}
		
		$query = "Select * from Doktori where id =".$DocID;
		
		$obj = new DBConnection();
        $connection= $obj->getConnection();
		
		
		


		if(!strlen($DocName)==0 && strlen($DocName)<3){
			$DocName_Error = "New Name should not be shorter than 3";
			$count++;
		}

		if(!strlen($DocSurname)==0 && strlen($DocSurname)<3){
			$DocSurname_Error = "New Surname should not be shorter than 3";
			$count++;
		}

		if(!strlen($DocSpecialization)==0 && strlen($DocSpecialization)<3){
			$DocSpecialization_Error = "New Specialization should not be shorter than 3";
			$count++;
		}

		if(!strlen($DocExperience) ==0){
			if(!$View->isInteger($DocExperience)){
				$DocExperience_Error = "Experience should be Integer";
				$count++;		
			}
		}
		$queries =array();
		if($count == 0){
			if(!strlen($DocName)==0){
				$query="Update Doktori set Emri = '".$DocName."' where id=".$DocID;
				array_push($queries,$query);
				//$getresults = $connection->prepare($query);
				//$getresults->execute();
				
			}

			if(!strlen($DocSurname) == 0){
				$query1="Update Doktori set Mbiemri ='".$DocSurname."' where id=".$DocID  ;
				array_push($queries,$query1);
			}

			if(!strlen($DocSpecialization) == 0){
				$query2="Update Doktori set Specializimi ='".$DocSpecialization."' where id=".$DocID  ;
				array_push($queries,$query2);
			}

			if(!strlen($DocExperience) == 0){
				$query3="Update Doktori set Pervoja ='".$DocExperience."' where id=".$DocID  ;
				array_push($queries,$query3);
			}

			foreach($queries as $q){
						$getresults = $connection->prepare($q);
						$getresults->execute();
						
			}
			$Result="Doctor edited succesfully!";
			$DocID = '';
			$DocName = '' ;
			$DocSurname = '' ;
			$DocSpecialization = '' ;
			$DocExperience = '' ;
		}



	}
	include '../WebPages/RegisterDoctor.php';

?>

	<script>        
	var DeleteForm = document.querySelector('.DeleteForm');
        var RegisterForm = document.querySelector('.RegisterForm');
        var EditForm = document.querySelector('.EditForm');

        RegisterForm.style.display = 'none';
        DeleteForm.style.display='none'; 
        EditForm.style.display='flex';
		</script>