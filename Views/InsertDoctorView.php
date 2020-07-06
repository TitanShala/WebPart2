<?php
include_once '../Controller/DoctorController.php';
	if(isset($_POST['SubmitInput'])){
		
		$Name = $_POST['Emri'];
		$surname = $_POST['SurnameInput'];
		$specialization = $_POST['SpecializationInput'];
		$experience = $_POST['ExperienceInput'];
		$view = new InsertView();
		$view->InsertDoctor($Name, $surname, $specialization, $experience);
	}

class InsertView{
	
	public function InsertDoctor($name, $surname, $specialization, $experience){
		$controller = new DoctorController();
		$response = $controller->InsertDoctor($name, $surname, $specialization, $experience);

		
	}

}
