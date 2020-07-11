<?php
include_once  '../Models/DbConn.php' ;


class RegisterView{
function getResults ($query){
    $obj = new DBConnection();
    $connection= $obj->getConnection();
    $results = $connection->prepare($query);
    $results->execute();
    $GetResults = $results->fetchAll(PDO::FETCH_BOTH);
    return $GetResults ;
}
}

if(isset($_POST['RegisterBtn'])){
    $Username = $_POST['UsernameR'];
    $Email = $_POST['EmailR'];
    $Password = $_POST['PasswordR'];
    $ConfirmPassword = $_POST['ConfirmPasswordR'];
    $Name = $_POST['NameReg'];
    $Surname = $_POST['SurnameReg'];
    $count = 0;
    $RegisterView = new RegisterView();
    $obj = new DBConnection();
    $connection= $obj->getConnection();
    $GetUsernamequery = "select * from Account where  Username = '".$Username."'";
    $Usernameresults = $RegisterView->getResults($GetUsernamequery);
    // $getUsernameresults = $connection->prepare($GetUsernamequery);
    // $getUsernameresults->execute();
    // $Usernameresults = $getUsernameresults->fetchAll(PDO::FETCH_BOTH);

    $GetEmailquery = "select * from Account where role = 0 and Username = '".$Email."'";
    $Emailresults = $RegisterView->getResults($GetEmailquery);
    echo '$Name';
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
        $sql = "Insert into Account values ('".$Username."', '".$Password."', '".$Email."', 0, '".$Name."', '".$Surname."')";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $RegisterResult = "You are succesfully registred";

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