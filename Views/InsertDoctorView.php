<?php
include_once '../Controller/DoctorController.php';
include_once '../Controller/ManageController.php';

session_start();

	if(isset($_POST['SubmitInput'])){
		session_start();
		$Admin = $_SESSION['Username'];			
		
		
		$target = "../UploadedImages/".basename($_FILES['IMAGE']['name']);
		$image1 = $_FILES['IMAGE']['name'];
		move_uploaded_file($_FILES['IMAGE']['tmp_name'],$target);     

		$count = 0;
		$Name =filter_input(INPUT_POST,'Emri');
		$Manage = new ManageController();


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

		if(strlen($experience)<1 || strlen($experience)>2){
			$Experience_Error = "Experience should not be null or not contain more than 2 numbers";
			$count++;
		}

		else if(!$view->isInteger($experience)){
			$Experience_Error = "Experience should be integer";
			$count++;
		}
		if($count == 0){
		//Insertimi  i doktori nese nuk ka error
		$view->InsertDoctor($Name, $surname, $specialization, $experience, $Admin,$image1);
		
		
		//Gjetja e dates se sotit per insertimin ne tabele, Aktiviteti i adminit te doktoret
		
		$dt = new DateTime();
		$date = $dt->format('Y-m-d H:i:s');

		//Gjetja e id se Doktorit te saposhtuar
		$sql = "select Id from Doktori order by Id desc";
		$result = $Manage->filterTable($sql);
		$DoctorId = $result[0][0];

		//Insertimi i aktivitetit te adminit
		$Manage->insertDoctorManage($Admin,$DoctorId,'Inserted',$date);
		$Name ="";
		$surname ="";
		$specialization="";
		$experience="";
		echo '<script> alert("Doctor inserted succesfully !") </script>';
			}	
			include 'C:/xampp/htdocs/GitProject/WebPages/RegisterDoctor.php';

	}else if(!isset($_SESSION['Username'])){
		header("Location: ../WebPages/Login.php"); 
	}

class InsertView{
	
	public function InsertDoctor($name, $surname, $specialization, $experience ,$Admin,$image){
		$controller = new DoctorController();
		$response = $controller->InsertDoctor($name, $surname, $specialization, $experience, $Admin,$image);

	}

	
	public function isInteger($input){
		return(ctype_digit(strval($input)));
}



}
