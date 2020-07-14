<?php
include_once '../Controller/DoctorController.php';
@session_start();
$Controller = new DoctorController();
if(isset($_SESSION['Account'])){
    $Account = $_SESSION['Account'];
    $Username = $_SESSION['Username'];
    
    
    $query = "select * from Account where Username ='".$Username."'";
    
    //E marrim Userin per ta perdorur emrin dhe mbiemri e tij per 'WELCOME'
    $Result = $Controller->filterTable($query);
    }
$GetInfo = "Select * from HospitalInfo" ;
$info = $Controller->filterTable($GetInfo);    


?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8" />
    <title>Web Project</title>
    
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/Default.css">
        <link rel="stylesheet" href="../css/LoginToIndex.css">
       <link rel="stylesheet" href="../css/Index.css">
       <link rel="stylesheet" href="../css/Doctors.css">
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
                <div class="divv" style="display:flex; flex-direction:row;">
                    <img style="width: 40px; height:auto;" src="../Foto/logoS.png">
                    <h1 class="HospitalName"><?php echo $info[0][8] ?></h1> <h1 style="color:#24c1d6;">Hospital</h1>
                </div>

                <nav>
                    <ul class="Nav">
                        <li><a href="#">Home</a></li>
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
                        <li><div class="ImgAnchor"><img class="ManagePhoto" src="../Foto/Manage.png"><a class="ManageName">Manage</a></div>
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
  
   <section>
     <div class="home">
     
        <div class="bodyh1">
            <h1 style="color:white;">WE CARE ABOUT</br>YOUR </h1><h1 style="color:#24c1d6;">HEALTH</h1>
            <?php if(isset($Result)){echo '</br> </br> <h1 style="display:inline;font-size: 7vh; color:white;">Welcome</br></h1> <h1 style="color:#24c1d6; font-size:7vh;display:inline;">'.$Result[0][4].' '.$Result[0][5].'</h1>' ;} ?>
        </div>
  
     </div>
     
     <div style="width:100%; background-color:#24252A">
     <div class="MainContact">
        <div class="AppointmentBox">
            <div style="padding-top:5%;">
                <h1>Welcome to Our Hospital</h1>
                <p>Need to make an appointment?</p>
                <?php if(!isset($Account))
                    echo '<h4 style="color:rgba(0,136,169,1); margin-top:20px;">Please sign in to make an appointment</h4>';
                ?>
               <a class="AppointmentAnch" href="Appointment.php"> <input type="button" value="Make an Appointment"></a>
            </div>
        </div>
        <div class="schedule">
            <div>
                <h4>Monday-Friday</h4>
                <h4><?php echo $info[0][1] ?></h4>
            </div>
            <div>
                <h4>Saturday</h4>
                <h4><?php echo $info[0][2] ?></h4>
            </div>                
            <div>
                <h4>Sunday</h4>
                <h4><?php echo $info[0][3] ?></h4>
            </div>
            <div>
                <h4>Break</h4>
                <h4><?php echo $info[0][4] ?></h4>
            </div>
        </div>
        <div class="ContactInfo">
            <div style="border-bottom:2px solid #edf0f1;">        
                <img src="../Foto/phone.jpg" alt="" style="height:80%; width:25%;">
                <div>
                    <h4>Emergency Number</h4>
                    <h4><?php echo $info[0][5] ?></h4>         
                </div>    
            </div>               
            <div>
                <img src="../Foto/Email.png" alt="" style="height:80%; width:25%;">
                <div>
                    <h4>Email Adress</h4>
                    <h4><?php echo $info[0][7] ?></h4>         
                </div> 
            </div>
        </div>



    </div>
    </div>
 

    <div class="team-section" style="display:block">
        <h1>Our Doctors</h1>
        <span class="border"></span>
        <div class="picture-section">
            <a href="Doctors.php#Doctor1"><img src="../Foto/DoctorProfile1.jpg" alt=""></a>
            <a href="Doctors.php#Doctor2"><img src="../Foto/DoctorProfile2.jpg" alt=""></a>
            <a href="Doctors.php#Doctor3"><img src="../Foto/DoctorProfile3.png" alt=""></a>
            <a href="Doctors.php#Doctor4"><img src="../Foto/DoctorProfile4.jpg" alt=""></a>
        </div>
        <a style="color:blue;" href="Doctors.php">Read About Our Doctors</a>
    </div>


    <div class="slider">
        <h1>Gallery</h1>
        <div class="sliderDiv">
            
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

  

</body>
</html>



