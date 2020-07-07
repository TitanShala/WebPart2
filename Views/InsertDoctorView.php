<?php
include_once '../Controller/DoctorController.php';
	if(isset($_POST['SubmitInput'])){
		

		$count = 0;
		$Name = $_POST['Emri'];

		if($Name == "" || strlen($Name)<3){
			$Name_Error = "Name should not be null or shorter than 3";
			$count++;
		}
		$surname = $_POST['SurnameInput'];
		if($surname == "" || strlen($surname)<3){
			$Surname_Error = "Surname should not be null or shorter than 3";
			$count++;
		}
		$specialization = $_POST['SpecializationInput'];
		if($specialization == "" || strlen($specialization)<3){
			$Specialization_Error = "Specialization should not be null or shorter than 3";
			$count++;
		}
		$experience = $_POST['ExperienceInput'];
		if($experience == "" || strlen($experience)<1){
			$Experience_Error = "Experience should not be null or shorter than 1";
			$count++;
		}
		if($count == 0){
		$view = new InsertView();
		$view->InsertDoctor($Name, $surname, $specialization, $experience);
		$Result = 'Doctor Inserted succesfully';	
			}	
			include 'C:/xampp/htdocs/Project/WebPages/RegisterDoctor.php';
	}

class InsertView{
	
	public function InsertDoctor($name, $surname, $specialization, $experience){
		$controller = new DoctorController();
		$response = $controller->InsertDoctor($name, $surname, $specialization, $experience);
			
		
	
	}

}
