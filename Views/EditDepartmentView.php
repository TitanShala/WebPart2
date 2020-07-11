<?php
include_once '../Controller/DepartmentController.php' ;
include_once '../Controller/ManageController.php'; 
session_start();
$Admin = $_SESSION['Username'];

if(isset($_POST['SubmitInputt'])){
    $IdE = filter_input(INPUT_POST,'Id');
    $NameE =filter_input(INPUT_POST,'Name');
    $NrE =filter_input(INPUT_POST,'Nr');
   
    $Manage = new ManageController();
    $Controller = new DepartmentController();
    $sql = "select * from Reparti where Emri='".$NameE."'";
    $result = $Manage->filterTable($sql);
    $count = 0 ;
    $Controller = new DepartmentController();

    if($Controller->isInteger($IdE)){
        $sql = "Select * from Reparti where id ='".$IdE."'";
        $Result = $Controller->filterTable($sql);
        if(count($Result)<1){
            $IdE_Error = 'Id does not exist';
            $count++;
        }
    }else{
        $IdE_Error = 'Type Id as integer' ;
        $count++;
    }

    if(strlen($NameE) > 1 && strlen($NameE) < 3){
        $NameE_Error = 'New name should be longer than 3' ;
        $count++;
    }
    else{
        if(!strlen($NameE)==0 ){
            if(count($result) > 0){
                $NameE_Error="Department with this name already exists";
                $count++;
            }
        }
    }

    if(strlen($NrE) > 0){
        if(!$Controller->isInteger($NrE)){
            $NrE_Error = 'Type number of rooms as integer' ;
            $count++;
        }
    }
    if($count == 0){
        $queries =array();
        if(strlen($NameE) > 0){
            $query = "Update Reparti set Emri ='".$NameE."' where id=".$IdE  ;
            array_push($queries, $query);
        }
        if(strlen($NrE) > 0){
            $query2 = "Update Reparti set NrDhoma ='".$NrE."' where id=".$IdE  ;
            array_push($queries, $query2);
        }
        if(count($queries) > 0){
            $query3 = "Update Reparti set Stafi='".$Admin."' where id=".$IdE ;
            array_push($queries,$query3);
            $obj = new DBConnection();
            $connection= $obj->getConnection();
            foreach($queries as $query){
                $getresults = $connection->prepare($query);
                $getresults->execute();
            }

            $Manage->InsertDepartmentManage($Admin,$IdE,'Edited'); 

            $IdE = '';
            $NameE = '';
            $NrE = '';
            $ResultEdit='Department edited successfully';
        }else {
            $NullError = 'Fill one of the fields';
        }
    }
} include '../WebPages/ManageDepartments.php';
?>

<script>        
	var DeleteForm = document.querySelector('.DeleteForm');
        var RegisterForm = document.querySelector('.RegisterForm');
        var EditForm = document.querySelector('.EditForm');

        RegisterForm.style.display = 'none';
        DeleteForm.style.display='none'; 
        EditForm.style.display='flex';
		</script>