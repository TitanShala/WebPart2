<?php

class Doctor{
	private $DoctorName;
	private $DoctorSurname;
	private $DoctorSpecialization;
	private $DoctorExperience;

	public function __construct($DoctorName, $DoctorSurname,$DoctorSpecialization, $DoctorExperience){
		
		$this->DoctorName = $DoctorName;
		$this->DoctorSurname = $DoctorSurname;
		$this->DoctorSpecialization = $DoctorSpecialization;
		$this->DoctorExperience = $DoctorExperience;
	
	}

	public function getDoctorName(){
		return $this->DoctorName ;
	}

	public function getDoctorSurname(){
		return $this->DoctorSurname ;
	}

	public function getDoctorSpecialization(){
		return $this->DoctorSpecialization ;
	}

	public function getDoctorExperience(){
		return $this->DoctorExperience ;
	}

	public function setDoctorName($DoctorName){
		$this->DoctorName = $DoctorName;
	}

	public function setDoctorSurname($DoctorSurname){
		$this->DoctorSurname = $DoctorSurname;
	}

	public function setDoctorSpecialization($DoctorSpecialization){
		$this->DoctorSpecialization = $DoctorSpecialization;
	}

	public function setDoctorExperience($DoctorExperience){
		$this->DoctorExperience = $DoctorExperience;
	}
}

