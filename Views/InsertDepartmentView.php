<?php
    include_once '../Controller/DepartmentController.php';
    include_once '../Controller/ManageController.php';
    if(isset($_POST['SubmitReg'])){
        session_start();
        $Admin = $_SESSION['Username'];
        $Name = $_POST['Emri'] ;
        $Nr = $_POST['NrRooms'];
        $Manage = new ManageController();
        $Controller = new DepartmentController();
        $count= 0;
        $sql = "select * from Reparti where Emri='".$Name."'";
        $result = $Manage->filterTable($sql);
        
        
        if(strlen($Name) < 3){
            $Name_Error='Name should not be shorter than 3';
            $count++;
        }
        else{
            
            if(count($result) > 0){
                $Name_Error="Department with this name already exists";
                $count++;
            }
        }
        if($Manage->isInteger($Nr)){
            if($Nr == 0){
                $NrRooms_Error = 'Number of rooms should be larger than 0';
                $count++;
            }
        }else{
            $NrRooms_Error = 'Number of rooms should be integer';
            $count++;
        }
        if($count==0){
            $Controller->InsertDepartment($Name,$Nr,$Admin);
            $InsertResult='Department Registred Succesfully';
            
            $result = $Controller->filterTable($sql);
            $id = $result[0][0];
            $dt = new DateTime();
            $date = $dt->format('Y-m-d H:i:s');
            $Manage->InsertDepartmentManage($Admin,$id,'Inserted',$date); 
                      
            $Name = '' ;
            $Nr = '' ;

        }
        
    }
    include '../WebPages/ManageDepartments.php';
?>