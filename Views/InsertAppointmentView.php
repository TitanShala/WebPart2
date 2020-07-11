<?php
include_once '../Controller/AppointmentController.php';
if(isset($_POST['submit'])){
    session_start();
    $Username = $_SESSION['Username'];	
    $Name = $_POST['name'] ;
    $Department = $_POST['dept'] ;
    $Day = $_POST['Day'] ;
    $Month = $_POST['Month'] ;
    $Year = $_POST['Year'] ;
    $Hour = $_POST['hour'] ;
    $count = 0 ;

    if(strlen($Name) <= 6 || strlen($Name) >= 20){
        $Name_Error = "Full Name must be longer than 6 and shorter than 20 characters";
        $count++;

    }
    if(strlen($Department)< 1){
        $Department_Error= "Please choose a department";
        $count++;
    }
    if(strlen($Day) < 1 || $Day>31 ){
        $Day_Error = "Choose Day between 1 and 31";
        $count++;
    }
    if(strlen($Month)< 1 || $Month>12){
        $Month_Error = "Please choose month between 1 and 12";
        $count++;
    }
    $thisYear = date('Y');
    if(strlen($Year) < 4 || $Year < $thisYear || $Year > $thisYear+1){
        $Year_Error = "Please choose a correct year";
        $count++;
    }
    if(strlen($Hour) < 1 || $Hour < 8 || $Hour>16){
        $Hour_Error = "Please choose hour between 8:00 to 16:00";
        $count++;
    }
    if($count==0){
    $Controller = new AppointmentController();
    $getDepID="Select * from Reparti where Emri = '".$Department."'";
    $DepartmentId = $Controller->filterTable($getDepID)[0][0];
    $Date = $Year."-".$Month."-".$Day ;
    $Controller->InsertAppointment($Name,$Username,$DepartmentId,$Date,$Hour);
    include '../WebPages/Appointment.php';
    echo "<script> 
        alert('We are gonna make an appointment for you, approximately with your choosen date and time. We will sent your appointment in your email adress thankyou!');
    </script>";

    }
    else{
        include '../WebPages/Appointment.php';
    }
    
}

?>

