<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8" />
    <title>Web Project</title>

        <link rel="stylesheet" href="../css/default.css">
       <link rel="stylesheet" href="../css/all.css">
       <link rel="stylesheet" href="../css/Doctors.css">
       <link rel="stylesheet" href="../css/all.min.css">

        
       

       



</head>

<body>


        <header>
        
            
      

        <div style="display:flex; flex-direction:row;"><img style="width: 40px; height: auto;;" src="../Foto/logoS.png">
        <h1 class="HospitalName">Peja</h1> <h1 style="color:#24c1d6;">Hospital</h1></div>

        <nav>
            <ul class="Nav">
                <li><a href="#">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contactUs.php">Contact</a></li>
                <li><a href="Appointment.php">Appointment</a></li>
             </ul>
         
        </nav>
        <a href="Login.php" class="SignInNav"> <input type="button" style="background:none; border:none;">Sign In</input> </a>
        <a href="Login.php" class="SignOutNav" onclick="SigningOut()"> <input type="button" style="background:none; border:none;">Sign Out</input> </a>
        
        </header>
  
   <section>
     <div class="home">
     
        <div class="bodyh1">
            <h1 style="display:inline;font-size: 7vh; color:white;">WE CARE ABOUT</br>YOUR </h1><h1 style="color:#24c1d6; font-size:7vh;display:inline;">HEALTH</h1>
        </div>
  
     </div>
     
     <div style="width:100%; background-color:#24252A">
     <div class="MainContact">
        <div class="AppointmentBox">
            <div style="padding-top:5%;">
                <h1>Welcome to Our Hospital</h1>
                <p>Need to make an appointment?</p>
               <a href="Appointment.php"> <input type="button" value="Make an Appointment"></a>
            </div>
        </div>
        <div class="schedule">
            <div>
                <h4>Monday-Friday</h4>
                <h4>8:00-16:00</h4>
            </div>
            <div>
                <h4>Saturday</h4>
                <h4>9:00-12:00</h4>
            </div>                
            <div>
                <h4>Sunday</h4>
                <h4>Closed</h4>
            </div>
            <div>
                <h4>Break</h4>
                <h4>10:00-11:00</h4>
            </div>
        </div>
        <div class="ContactInfo">
            <div style="border-bottom:2px solid #edf0f1;">        
                <img src="../Foto/phone.jpg" alt="" style="height:80%; width:25%;">
                <div>
                    <h4>Emergency Number</h4>
                    <h4>555-555-555</h4>         
                </div>    
            </div>               
            <div>
                <img src="../Foto/Email.png" alt="" style="height:80%; width:25%;">
                <div>
                    <h4>Email Adress</h4>
                    <h4>Spitali @ gmail.com</h4>         
                </div> 
            </div>
        </div>



    </div>
    </div>
 

    <div class="team-section">
        <h1>Our Doctors</h1>
    <span class="border"></span>
    <div class="picture-section">
        <a href="Doctors.html#Doctor1"><img src="../Foto/DoctorProfile1.jpg" alt=""></a>
        <a href="Doctors.html#Doctor2"><img src="../Foto/DoctorProfile2.jpg" alt=""></a>
        <a href="Doctors.html#Doctor3"><img src="../Foto/DoctorProfile3.png" alt=""></a>
        <a href="Doctors.html#Doctor4"><img src="../Foto/DoctorProfile4.jpg" alt=""></a>
    </div>
    <a href="Doctors.php">Read About Our Doctors</a>
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
                <div style="display:flex; flex-direction:row;"><h1 class="HospitalName">Peja</h1> <h1 style="color:#24c1d6;">Hospital</h1></div><br />
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
                        PejaHospital <br />
                        Kosove & Peje <br />
                        Bill Clinton, 231 <br />
                    </span>
                </address>
            </div>

            <div class="footer_third">
                <h1 style="color:#24c1d6;">Contact Us</h1>
                    <li>Email: Spitali@gmail.com</li>
                    <li>Phone: +383 123456</li>
            </div>
            <a class="gotopbtn" href="#"> <i class="fas fa-arrow-up"></i></a>
        </div>
    </div>

</footer>

  

</body>
</html>



