<?php
include_once '../Models/DbConn.php' ;
class DepartmentController{

private $connection;

public function __construct(){
    $obj = new DBConnection();
    $this->connection= $obj->getConnection();
}

public function InsertDepartment($Name, $Nr, $Admin,$Image){
     //$sql = "INSERT INTO Reparti (Emri,NrDhoma,Stafi) VALUES (".$Name.", ".$Nr.", ".$Admin.")";
    $sql = "INSERT INTO Reparti (Emri,NrDhoma,Stafi,image) VALUES (:Emri,:Nr,:Stafi,:Image)";
    $statement = $this->connection->prepare($sql);
    $statement->bindParam(":Emri", $Name);
    $statement->bindParam(":Nr", $Nr);
    $statement->bindParam(":Stafi", $Admin);
    $statement->bindParam(":Image", $Image);
    $statement->execute();
}


// function LoadTable(){
// if(isset($_POST['SearchSubmit']) ){
//     $SearchInput = $_POST['SearchInput'];
//     $query = "select * from Reparti where Id like '%".$SearchInput."%' OR Emri like '%".$SearchInput."%' OR NrDhoma like '%".$SearchInput."%' OR Stafi like '%".$SearchInput."%'"; 
//     $search_result = $this->filterTable($query);
// }
// else{
//     $query="Select * FROM Reparti";
//     $search_result = $this->filterTable($query);
// }
// return $search_result;
// }


function LoadTable(){
    if(isset($_POST['SearchSubmit']) ){
        $SearchInput = $_POST['SearchInput'];
        $query = "select * from Reparti where Id like '%".$SearchInput."%' OR Emri like '%".$SearchInput."%' OR NrDhoma like '%".$SearchInput."%' OR Stafi like '%".$SearchInput."%' order by Id desc"; 
        $search_result = $this->filterTable($query);
    }
    else{
        $query="Select * FROM Reparti order by Id desc";
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

public function isInteger($input){
    return(ctype_digit(strval($input)));
}

public function executeQuery($sql){
    $obj = new DBConnection();
    $connection= $obj->getConnection();
    $getresults = $connection->prepare($sql);
    $getresults->execute();
}


}
?>