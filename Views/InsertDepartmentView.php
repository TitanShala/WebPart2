<?php
    include_once '../Controller/DepartmentController.php';
    include_once '../Controller/ManageController.php';
    @session_start();

    if(isset($_POST['SubmitReg'])){
        $Admin = $_SESSION['Username'];
        $Name = $_POST['Emri'] ;
        $Nr = $_POST['NrRooms'];
        $Manage = new ManageController();
        $Controller = new DepartmentController();
        $count= 0;

        $sql = "select * from Reparti where Emri='".$Name."'";
        $result = $Manage->filterTable($sql);
        
		$target = "../UploadedImages/".basename($_FILES['IMAGE']['name']);
		$image1 = $_FILES['IMAGE']['name'];
		move_uploaded_file($_FILES['IMAGE']['tmp_name'],$target);      		
  
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
            $Controller->InsertDepartment($Name,$Nr,$Admin,$image1);
            $InsertResult='Department Registred Succesfully';
            $sql = "select Id from Reparti order by Id desc";
            $result = $Manage->filterTable($sql);
            $id = $result[0][0];
            $dt = new DateTime();
            $date = $dt->format('Y-m-d H:i:s');
            $Manage->InsertDepartmentManage($Admin,$id,'Inserted',$date); 
            echo '<script> alert("Department inserted successfully !") </script>';
                      
            $Name = '' ;
            $Nr = '' ;

        }
        include '../WebPages/ManageDepartments.php';
    }else if(!isset($_SESSION['Username'])){
        header("Location: ../WebPages/Login.php"); 
    }
    
?>