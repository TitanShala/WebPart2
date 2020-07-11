<?php
include_once '../Models/DbConn.php' ;
class ContactController{

private $connection;

public function __construct(){
    $obj = new DBConnection();
    $this->connection= $obj->getConnection();
}

public function InsertContact($Date, $Name, $Email, $Message){
   $sql = "INSERT INTO Contacts (Data,Name,Email,Message) VALUES (:Date,:Name,:Email,:Message)";
   $statement = $this->connection->prepare($sql);
   $statement->bindParam(":Date", $Date);
   $statement->bindParam(":Name", $Name);
   $statement->bindParam(":Email", $Email);
   $statement->bindParam(":Message", $Message);
   $statement->execute();
}


   function LoadTable(){
      if(isset($_POST['SearchSubmit']) ){
          $SearchInput = $_POST['SearchInput'];
          $query = "select * from Contacts where Id like '%".$SearchInput."%' OR Data like '%".$SearchInput."%' OR Name like '%".$SearchInput."%' OR Email like '%".$SearchInput."%'"; 
          $search_result = $this->filterTable($query);
      }
      else{
   $query="Select * FROM Contacts order by Id desc";
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