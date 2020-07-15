<?php
include_once '../Controller/ManageController.php';
    @session_start();
    if(isset($_SESSION['Account'])){
        $Account = $_SESSION['Account'];
    }    
        
    $Controller = new ManageController();
    $GetInfo = "Select * from HospitalInfo" ;
    $info = $Controller->filterTable($GetInfo);     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT FORM</title>
    <link rel="stylesheet" href="../css/ContactUs.css">
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
    <!-- CONTACT US -->
    <header>
            <div class="NavContainer">
                <div class="HospitalNameDiv"style="display:flex; flex-direction:row;">
                    <img style="width: 40px; height:auto;" src="../Foto/logoS.png">
                    <h1 class="HospitalName"><?php echo $info[0][8] ?></h1> <h1 style="color:#24c1d6;">Hospital</h1>
                </div>

                <nav>
                    <ul class="Nav">
                        <li><a href="../WebPages/index.php">Home</a></li>
                        <li><a href="../WebPages/services.php">Services</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="../WebPages/Appointment.php" class="AppointmentAnch">Appointment</a></li>
                    </ul>  
                </nav>
            </div>

            <div class="LogAndManage" >
                <a href="../WebPages/Login.php" class="SignInNav"> <input type="button" style="background:none; border:none;">Sign In</input> </a>
                <a href="../WebPages/Login.php" class="SignOutNav" onclick="SigningOut()"> <input type="button" style="background:none; border:none;">Sign Out</input> </a>            
                <div class="ManageDiv">
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

    <section>
        <div class="ContactUsPage">
            <div class="ContactUstitle">
                <h1 style="margin-bottom:20px;">CONTACT US</h1>
                <h2>WE GONE ANSWER AS SOON AS POSSIBLE</h2>
            </div>

            <div class="ContactUsbox">
                <p id="error" class="error" style="color:red; margin-top:20px; background:#F0FFFF;"></p>
                <form id="form" class="ContactUsForm" action="../Views/InsertContactView.php" method="post">
                    <input id="name" type="text" name="name" class="form-controlContactUs" placeholder="Enter Your Name" required><br />
                    <?php if(isset($Name_Error)) { ?>
                                <p style="color:red;"><?php echo $Name_Error ?></p>
                                <?php } ?> 
                    <input id="email" type="email" name="email" class="form-controlContactUs" placeholder="Enter Your Email" required><br />
                    <?php if(isset($Email_Error)) { ?>
                                <p style="color:red;"><?php echo $Email_Error ?></p>
                                <?php } ?> 
                    <textarea id="text" name="message" class="form-controlContactUs" placeholder="Message" rows="4" required></textarea><br />
                    <?php if(isset($Message_Error)) { ?>
                                <p style="color:red;"><?php echo $Message_Error ?></p>
                                <?php } ?> 
                    <input type="submit" name="Submit" class="form-control-submit" value="SEND MESSAGE">
                    
                </form>
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
    
<script src="../js/contactUsValidation1.js"></script>
</body>
</html>
