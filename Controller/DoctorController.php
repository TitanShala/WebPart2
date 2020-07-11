<?php
include_once '../Models/DbConn.php';
include_once '../Models/DoctorModel.php';
include_once '../Models/doctorMapper.php';
//include_once '../WebPages/RegisterDoctor.php';

class DoctorController{

	public function InsertDoctor($Name,$Surname,$Specialization,$Experience,$Admin){
		$Doctor = new Doctor($Name,$Surname,$Specialization,$Experience,$Admin);
		$DoctorMapper = new doctorMapper($Doctor);
		$DoctorMapper->Insert($Name,$Surname,$Specialization,$Experience,$Admin);
		return true;
	}


	function LoadTable(){
    if(isset($_POST['SearchSubmit']) ){
        $SearchInput = $_POST['SearchInput'];
        $query = "select * from Doktori where Id like '%".$SearchInput."%' OR Emri like '%".$SearchInput."%' OR Mbiemri like '%".$SearchInput."%' OR Specializimi like '%".$SearchInput."%' or Pervoja like '%".$SearchInput."%' or Stafi like'%".$SearchInput."%' ";
        $search_result = $this->filterTable($query);
    }
    else{
        $query="Select * FROM Doktori";
        $search_result = $this->filterTable($query);
    }
	return $search_result;
	}
	


    function filterTable($query){
        $obj = new DBConnection();
        $connection= $obj->getConnection();
		$getresults = $connection->prepare($query);
		$getresults->execute();
		$results = $getresults->fetchAll(PDO::FETCH_BOTH);
		return $results ;        
    } 
    
    function topDoctors(){
        $query = "select TOP 4 *  from Doktori order by Pervoja DESC";
        return $this->filterTable($query);
    }

    public function isInteger($input){
		return(ctype_digit(strval($input)));
		}

	}

	?>

