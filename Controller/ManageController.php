<?php
include_once '../Models/DbConn.php' ;

class ManageController{

    private $connection;

public function __construct(){
    $obj = new DBConnection();
    $this->connection= $obj->getConnection();
}

function LoadTableDepartment(){
    if(isset($_POST['SearchSubmit']) ){
        $SearchInput = $_POST['SearchInput'];
        $query = "select * from DepartmentManage where Stafi like '%".$SearchInput."%' OR Reparti like '%".$SearchInput."%' OR Aktiviteti like '%".$SearchInput."%'"; 
        $search_result = $this->filterTable($query);
    }
    else{
        $query="Select * FROM DepartmentManage";
        $search_result = $this->filterTable($query);
    }
    return $search_result;
    }

    function LoadTableDoctor(){
        if(isset($_POST['SearchSubmit1']) ){
            $SearchInput = $_POST['SearchInput1'];
            $query = "select * from DoctorManage where Stafi like '%".$SearchInput."%' OR Doctor like '%".$SearchInput."%' OR Aktiviteti like '%".$SearchInput."%'"; 
            $search_result = $this->filterTable($query);
        }
        else{
            $query="Select * FROM DoctorManage";
            $search_result = $this->filterTable($query);
        }
        return $search_result;
        }

function filterTable($query){
    
    $getresults = $this->connection->prepare($query);
    $getresults->execute();
    $results = $getresults->fetchAll(PDO::FETCH_BOTH);
    return $results ;        
}

public function InsertDepartmentManage($Admin, $Department, $Activity){
   $sql = "INSERT INTO DepartmentManage (Stafi,Reparti,Aktiviteti) VALUES (:Admin,:Department,:Activity)";
   $statement = $this->connection->prepare($sql);
   $statement->bindParam(":Admin", $Admin);
   $statement->bindParam(":Department", $Department);
   $statement->bindParam(":Activity", $Activity);
   $statement->execute();
}

public function InsertDoctorManage($Admin, $Doctor, $Activity){
   $sql = "INSERT INTO DoctorManage (Stafi,Doctor,Aktiviteti) VALUES (:Admin,:Doctor,:Activity)";
   $statement = $this->connection->prepare($sql);
   $statement->bindParam(":Admin", $Admin);
   $statement->bindParam(":Doctor", $Doctor);
   $statement->bindParam(":Activity", $Activity);
   $statement->execute();
}
public function isInteger($input){
    return(ctype_digit(strval($input)));
}
}
?>