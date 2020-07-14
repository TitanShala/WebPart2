<?php
include_once '../Models/DbConn.php';
include_once '../Controller/ManageController.php';

session_start();

if(isset($_POST['LoginBtn'])){

    $UsernameL = $_POST['LoginUsername'];
    $PasswordL = $_POST['LoginPassword'];   
    @$Account = $_POST['account'];
    $Role ;
    $count = 0 ;

    if(strlen($UsernameL) < 7 ){
        $UsernameLError = "Username must be longer than 6";
        $count++;
    }
    if(strlen($PasswordL) < 7){
        $PasswordLError = "Password must be longer than 6";
        $count++;
    }
    if($Account == 'Admin'){
        $Role = 1;
    }
    else if($Account == 'User'){
        $Role=0;
    }
    else{       
        $LoginError="Please choose an account type";
        $count++;
        $Role=3;
    }
    
        $query = "select * from Account where Username = '".$UsernameL."' and Password = '".$PasswordL."' and role =".$Role;
        // $obj = new DBConnection();
        // $connection= $obj->getConnection();
        // $getresults = $connection->prepare($query);
        // $getresults->execute();
        $Controller = new ManageController();
        $results = $Controller->filterTable($query);
        // $results = $getresults->fetchAll(PDO::FETCH_BOTH); 
          
    if(count($results) == 0){
        $LoginError = "Login incorrect";
        include '../WebPages/Login.php' ;
        
    }
    else{
        $succes = 'Login Succesfull';
        @session_start();
        $_SESSION['Username'] = $UsernameL ;
        $_SESSION['Password'] = $PasswordL ;
        $_SESSION['Account']  =  $Account ;
        echo "<script> 
                alert('You are succesfully Loged in!');
            </script>";

            header("Location: ../WebPages/index.php"); 
        // include '../WebPages/index.php' ;
        // echo '<link rel="stylesheet" href="../css/LoginToIndex.css">' ;  
    }
}

?>