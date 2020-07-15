<?php
include_once '../Models/DbConn.php' ;
class AppointmentController{

private $connection;

public function __construct(){
    $obj = new DBConnection();
    $this->connection= $obj->getConnection();
}

public function InsertAppointment($Name, $Username, $Department, $Data, $Hour){
   $sql = "INSERT INTO Appointment (Name,Username,Department,Data,Hour) VALUES (:Name,:Username,:Department,:Data,:Hour)";
   $statement = $this->connection->prepare($sql);
   $statement->bindParam(":Name", $Name);
   $statement->bindParam(":Username", $Username);
   $statement->bindParam(":Department", $Department);
   $statement->bindParam(":Data", $Data);
   $statement->bindParam(":Hour", $Hour);
   $statement->execute();
}

function LoadTable(){
   if(isset($_POST['SearchSubmit']) ){
       $SearchInput = $_POST['SearchInput'];
       $query = "select * from Appointment where Id like '%".$SearchInput."%' OR Username like '%".$SearchInput."%' OR Name like '%".$SearchInput."%' 
       OR Department like '%".$SearchInput."%' OR Data like '%".$SearchInput."%' OR Hour like '%".$SearchInput."%'"; 
       $search_result = $this->filterTable($query);
   }
   else{
      $query="Select * FROM Appointment order by Data";
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

}
?>