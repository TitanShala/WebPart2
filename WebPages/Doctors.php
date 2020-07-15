<?php
    include_once '../Controller/DoctorController.php';
    $Controller = new DoctorController();
    $TopDoctors = $Controller->topDoctors();
    $count = count($TopDoctors);
    $Search_Results = $Controller->LoadTable();

    session_start();
    if(isset($_SESSION['Account'])){
        $Account = $_SESSION['Account'];
    }     
    $GetInfo = "Select * from HospitalInfo" ;
    $info = $Controller->filterTable($GetInfo);       
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Doctors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/services.css">
    <link rel="stylesheet" href="../css/Default.css">   
    <link rel="stylesheet" href="../css/all.min.css">
    
    <?php
        if(isset($Account) ){
            echo '<link rel="stylesheet" href="../css/SignedIn.css">';
            if($Account == 'Admin'){
                echo '<link rel="stylesheet" href="../css/Admin.css">';  
            }   
        }
    ?> 
    
</head>        

<body>
        <header>
            <div class="NavContainer">
                <div style="display:flex; flex-direction:row;">
                    <img style="width: 40px; height:auto;" src="../Foto/logoS.png">
                    <h1 class="HospitalName"><?php echo $info[0][8] ?></h1> <h1 style="color:#24c1d6;">Hospital</h1>
                </div>

                <nav>
                    <ul class="Nav">
                        <li><a href="../WebPages/index.php">Home</a></li>
                        <li><a href="../WebPages/services.php">Services</a></li>
                        <li><a href="../WebPages/contactUs.php">Contact</a></li>
                        <li><a href="../WebPages/Appointment.php" class="AppointmentAnch">Appointment</a></li>
                    </ul>  
                </nav>
            </div>

            <div class="LogAndManage" >
                <a href="../WebPages/Login.php" class="SignInNav"> <input type="button" style="background:none; border:none;">Sign In</input> </a>
                <a href="../WebPages/Login.php" class="SignOutNav" onclick="SigningOut()"> <input type="button" style="background:none; border:none;">Sign Out</input> </a>            
                <div class="ManageDiv">
                    <!-- <img class="ManagePhoto" src="../Foto/Manage.png"> -->
                    <ul class="Manager">
                        <li><div class="ImgAnchor"><img class="ManagePhoto" src="../Foto/Manage.png"><a>Manage</a></div>
                            <ul>
                                <li><a href="../WebPages/RegisterDoctor.php">Doctors</a></li>
                                <li><a href="../WebPages/ManageDepartments.php">Departments</a></li>
                                <li><a href="../WebPages/AdminActivity.php">Admin Activities</a></li>
                                <li><a href="../WebPages/ClientContacts.php">Client Messages</a></li>
                                <li><a href="../WebPages/CheckAppointments.php">Client Appointments</a></li>
                                <li><a href="../WebPages/RegisterAdmin.php">New Admin</a></li>
                            </ul>   
                        </li>
                    </ul>
                </div>
            </div>   
        </header>


        <section style="background-image: url(../Foto/doctor.jpg);"> 
            <div class="departments-section" style="text-align:center;">
              <h1>Our Doctors</h1>
              <span class="Departments-border"></span>
              
                <div class="SearchFormInputContainer" style="margin-bottom:50px;">
                     <input type="text" placeholder="Search" name="SearchInput" class="SearchInput" >
                     <input type="submit" value="Search" name="SearchSubmit" class="SearchSubmit">
                </div>

                <div class="picture-section" >
                    <?php if(count($Search_Results) < 1){
                        echo '<h2>There are no Doctors registred</h2>';
                    }
                        foreach($Search_Results as $result){
                            $DepartmentId = "'#Department".$result['Id']."'";    
                            if($result['image'] == ""){
                                $image = 'src="../Foto/doctor.jpg"';
                            }
                            else{
                                $image = 'src="../UploadedImages/'.$result['image'].'"';                            
                            }
                            ?>
                        <div class="Doc"> <a href=<?php echo $DepartmentId?> ><img <?php echo $image ?> alt="No photo found"></a>
                            <h3 style="background-color:rgba(0,136,169,1);"><?php echo $result['Emri']." ".$result['Mbiemri']; 
                            echo" </br> Specialization: ".$result['Specializimi']."  Experience: ".$result['Pervoja'] ;?> </h3> </div>
                    
                    <?php }?>
                </div>    
            </div>
        </section>        

        <footer>
            <div class="footer">
                <div class="inner_footer">
                    <div class="logo_container">
                        <div style="display:flex; flex-direction:row;"><h1 class="HospitalName"><?php echo $info[0][8] ?></h1> <h1 style="color:#24c1d6;">Hospital</h1></div><br />
                        <img src="../Foto/logoS.png" >
                    </div>
        
                    
        
                    <div class="footer_third">
                        <h1 style="color:#24c1d6;">Links</h1>
                        <li><a href="#">Home</a></li><br />
                        <li><a href="services.php">Services</a></li><br />
                        <li><a href="contactUs.php">Contact</a></li><br />
                        <li><a href="Appointment.php">Appointment</a></li>
                    </div>
        
                    <div class="footer_third">
                        <h1 style="color:#24c1d6;">Social</h1>
                        <li><a href="https://www.facebook.com/" target="blank"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/" target="blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com/" target="blank"><i class="fab fa-instagram"></i></a></li>
        
                        <address>
                            <span>
                                <?php echo $info[0][8] ?> <br />
                                
                                <?php echo $info[0][9] ?>
                            </span>
                        </address>
                    </div>
        
                    <div class="footer_third">
                        <h1 style="color:#24c1d6;">Contact Us</h1>
                            <li>Email: <?php echo $info[0][7] ?></li>
                            <li>Phone: <?php echo $info[0][6] ?></li>
                    </div>
                    <a class="gotopbtn" href="#"> <i class="fas fa-arrow-up"></i></a>
                </div>
            </div>
        
        </footer>
        
 <script src="../js/Doctors.js"></script>
</body>
</html>

