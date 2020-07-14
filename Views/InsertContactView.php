<?php
include_once  '../Controller/ContactController.php' ;
session_start();
if(isset($_POST['Submit'])){
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Message = $_POST['message'];
    $count = 0 ;

    if(strlen($Name) < 7){
        $Name_Error='Your name should be shorter than 6';
        $count++;
    }
    else if(strlen($Name) > 41){
        $Name_Error = 'Your name should not be longer than 40 characters';
        $count++;
    }
    if(strlen($Email) < 10){
        $Email_Error = 'Email should be longer than 10 characters' ;
        $count++;
    }

    if(strlen($Message) <= 10){
        $Email_Error = 'Message should be shorter than 10 characters' ;
        $count++;
    }
    else if(strlen($Message) > 500){
        $Message_Error = 'Message should not be longer than 500 characters' ;
        $count++;
    }
    if($count == 0){
        $Contact = new ContactController();
        $dt = new DateTime();
        $date = $dt->format('Y-m-d H:i:s');
        $Contact->InsertContact($date,$Name,$Email,$Message);
        $Result = 'Your message succesfully submited';
        echo '<script> alert("Your message has been sent!") </script>';
    }
    include '../WebPages/contactUs.php';
}else if(!isset($_SESSION['Username'])){
    header("Location: ../WebPages/Login.php"); 
}

?>