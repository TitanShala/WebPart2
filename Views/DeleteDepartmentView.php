<?php
include_once '../Controller/DepartmentController.php';
include_once '../Controller/ManageController.php';
session_start();
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
                //$Manage = new ManageController();
                //$Manage->InsertDepartmentManage($Admin,$IdD,'Deleted'); 
                $DeleteResult = "Department deleted succesfully";
                echo '<script> alert("Department deleted succesfully !") </script>';
                }
            }else{
                $IdD_Error = "Type id as integer";
            }
            include '../WebPages/ManageDepartments.php';         
        }else if(!isset($_SESSION['Username'])){
            header("Location: ../WebPages/Login.php"); 
        }
?>
        

<script>        
		var DeleteForm = document.querySelector('.formD');
        var RegisterForm = document.querySelector('.formR');
        var EditForm = document.querySelector('.formE');

        RegisterForm.style.display = 'none';
        DeleteForm.style.display='flex'; 
        EditForm.style.display='none';
		</script>