<?php
    include_once '../Controller/DepartmentController.php';
    include_once '../Controller/ManageController.php';
    @session_start();
    if(isset($_POST['DeleteSubmit'])){
        $IdD = $_POST['IdD'];
        $Controller = new DepartmentController();
        if($Controller->isInteger($IdD)){
            $sql = "Select * from Reparti where id ='".$IdD."'";
            $result = $Controller->filterTable($sql);
            if(count($result) < 1){
                $IdD_Error="Id does not exist";
            }
            else{
                $sql="Delete from Reparti where Id = ".$IdD;
                $Controller->executeQuery($sql);
                $DeleteResult = "Department deleted succesfully";
                echo '<script> alert("Department deleted succesfully !") </script>';
            }
        }else{
            $IdD_Error = "Type id as integer";
        }
        include '../WebPages/ManageDepartments.php'; 
        echo '<script> DeleteClick(); </script>';        
    }else if(!isset($_SESSION['Username'])){
        header("Location: ../WebPages/Login.php"); 
    }
?>
