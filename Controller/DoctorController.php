<?php
include_once '../Models/doctorMapper.php';
include_once '../Models/DoctorModel.php';
class DoctorController{

	public function InsertDoctor($Name,$Surname,$Specialization,$Experience){
		$Doctor = new Doctor($Name,$Surname,$Specialization,$Experience);
		$DoctorMapper = new doctorMapper($Doctor);
		$DoctorMapper->Insert($Name,$Surname,$Specialization,$Experience);
		return true;
	}

}

	