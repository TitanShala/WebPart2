<?php
include_once '../Controller/DepartmentController.php';
include_once '../Controller/ManageController.php';
session_start();
$Admin = $_SESSION['Username'];
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
                }
            }else{
                $IdD_Error = "Type id as integer";
            }
        }

        include '../WebPages/ManageDepartments.php'
?>

<script>        
		var DeleteForm = document.querySelector('.DeleteForm');
        var RegisterForm = document.querySelector('.RegisterForm');
        var EditForm = document.querySelector('.EditForm');

        RegisterForm.style.display = 'none';
        DeleteForm.style.display='flex'; 
        EditForm.style.display='none';
		</script>