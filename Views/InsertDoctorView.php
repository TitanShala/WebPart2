<?php
include_once '../Controller/DoctorController.php';
	if(isset($_POST['SubmitInput'])){
		

		$count = 0;
		//$Name = $_POST['Emri'];
		$Name =filter_input(INPUT_POST,'Emri');

		if(strlen($Name)<3){
			$Name_Error = "Name should not be null or shorter than 3";
			$count++;
		}
		//$surname =$_POST['SurnameInput'];
		$surname =filter_input(INPUT_POST,'SurnameInput');
		if(strlen($surname)<3){
			$Surname_Error = "Surname should not be null or shorter than 3";
			$count++;
		}
		//$specialization = $_POST['SpecializationInput'];
		$specialization =filter_input(INPUT_POST,'SpecializationInput');
		if(strlen($specialization)<3){
			$Specialization_Error = "Specialization should not be null or shorter than 3";
			$count++;
		}
		//$experience = $_POST['ExperienceInput'];
		$experience =filter_input(INPUT_POST,'ExperienceInput');

		$view = new InsertView();

		if(strlen($experience)<1){
			$Experience_Error = "Experience should not be null";
			$count++;
		}

		else if(!$view->isInteger($experience)){
			$Experience_Error = "Experience should be integer";
			$count++;
		}
		if($count == 0){
		$view->InsertDoctor($Name, $surname, $specialization, $experience);
		$Result = 'Doctor Inserted succesfully';
		$Name ="";
		$surname ="";
		$specialization="";
		$experience="";
		
			}	
			include 'C:/xampp/htdocs/GitProject/WebPages/RegisterDoctor.php';
	}

class InsertView{
	
	public function InsertDoctor($name, $surname, $specialization, $experience){
		$controller = new DoctorController();
		$response = $controller->InsertDoctor($name, $surname, $specialization, $experience);

	}

	
	public function isInteger($input){
		return(ctype_digit(strval($input)));
}



}
