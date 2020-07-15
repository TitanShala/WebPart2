<?php
include_once  '../Models/DbConn.php' ;
include_once '../Controller/ManageController.php';

session_start();
if(isset($_POST['RegisterBtn'])){
    $Username = $_POST['UsernameR'];
    $Email = $_POST['EmailR'];
    $Password = $_POST['PasswordR'];
    $ConfirmPassword = $_POST['ConfirmPasswordR'];
    $Name = $_POST['NameReg'];
    $Surname = $_POST['SurnameReg'];
    $count = 0;
    
    $Controller = new ManageController(); //Krijimi i kontrollerit, per tja perdorur metoden filterTable()
    $GetUsernamequery = "select * from Account where  Username = '".$Username."'"; //Query per te kontrolluar nese ekziston nje Username i tille
    $Usernameresults = $Controller->filterTable($GetUsernamequery); //Marrja e rezultateve

    $GetEmailquery = "select * from Account where role = 1 and Username = '".$Email."'"; //Query per te kontrolluar nese ekziston nje email i njejte ne databaze per accounten User
    $Emailresults = $Controller->filterTable($GetEmailquery); //Marrja e rezultateve
    if(strlen($Name) < 3){
        $NameR_Error="Name should not be shorter than 3";
        $count++;
    }

    if(strlen($Surname) < 3){
        $SurnameR_Error="Surname should not be shorter than 3";
        $count++;
    }

    if(strlen($Username) > 6){
        if(count($Usernameresults) > 0){
            $UsernameR_Error="Username is taken, choose another one";
            $count++;
        }
    }else{
        $UsernameR_Error = "Username error";
        $count++;
    }
    if(count($Emailresults)> 0 ){
        $EmailR_Error="Email adress already is related with another account";
        $count++;
    }
    if(strlen($Password)<7){
        $PasswordR_Error="Password should be longer than 6";
        $count++;
    }
    if(!$Password == $ConfirmPassword){
        $ConfirmPasswordR_Error="The confirm password is not the same";
        $count++;
    }

    if($count==0){
        $obj = new DBConnection();
        $connection= $obj->getConnection();
        $sql = "Insert into Account values ('".$Username."', '".$Password."', '".$Email."', 0, '".$Name."', '".$Surname."')";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $RegisterResult = "You are succesfully registred";
        echo "<script> 
                alert('You are succesfully registred!');
            </script>";

    }
    include '../WebPages/Login.php';
}

?>
<script>
        var login = document.querySelector('.login-box');
        var register = document.querySelector('.Register-box');
     
        
        login.style.display='none'; 
        register.style.display = 'block';
</script>