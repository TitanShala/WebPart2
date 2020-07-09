<?php
include_once '../Models/DbConn.php';

if(isset($_POST['LoginBtn'])){

    $Username = $_POST['LoginUsername'];
    $Password = $_POST['LoginPassword'];   
    $Account =$_POST['account'];
    $count = 0 ;

    if(strlen($Username) < 7 ){
        $UsernameError = "Username must be longer than 6";
        $count++;
    }
    if(strlen($Password) < 7){
        $PasswordError = "Password must be longer than 6";
        $count++;
    }
    if($Account == 'Admin'){
        
    }
    else if($Account == 'User'){
        

    }
    else{       
        $LoginError="Please choose an account type";
        $count++;
    }
    $query = "select * from Account where Username = '".$Username."' and Password = '".$Password."'";
    $obj = new DBConnection();
    $connection= $obj->getConnection();
    $getresults = $connection->prepare($query);
    $getresults->execute();
    $results = $getresults->fetchAll(PDO::FETCH_BOTH); 
    if(count($results) == 0){
        $LoginError = "Login or Password Incorrect";
        include '../WebPages/Login.php' ;
        
    }
    else{
        $succes = 'Login Succesfull';
        session_start();
        $_SESSION['Username'] = $Username ;
        $_SESSION['Password'] = $Password ;
        $_SESSION['Account']  =  $Account ;
        

        include '../WebPages/index.php' ;
        // echo '<link rel="stylesheet" href="../css/LoginToIndex.css">' ;  
    }
    

}
?>