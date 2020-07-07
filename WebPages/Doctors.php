<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Doctors</title>
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/Doctors.css">
    <link rel="stylesheet" href="./css/all.min.css">
    
</head>        

<body>
        <header>
        
            
           <div style="display:flex; flex-direction:row;"><img style="width: 40px; height: auto;;" src="./Foto/logoS.png">
           <h1 class="HospitalName">Peja</h1> <h1 class="HospitalName" style="color:#24c1d6;">Hospital</h1></div>
        <nav>
            <ul class="Nav">
                <li><a href="index.html">Home</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contactUs.html">Contact</a></li>
                <li><a href="Appointment.html">Appointment</a></li>
             </ul>
         
        </nav>
        <a href="Login.html" class="SignInNav"> <input type="button" style="background:none; border:none;">Sign In</input> </a>
        <a href="Login.html" class="SignOutNav" onclick="SigningOut()"> <input type="button" style="background:none; border:none;">Sign Out</input> </a>

            
        
        </header>

<section>
    <div class="team-section">
        <h1>Our Doctors</h1>
    <span class="Doctorborder"></span>
    <div class="picture-section">
        <a href="#Doctor1"><img src="./Foto/DoctorProfile1.jpg" alt=""></a>
        <a href="#Doctor2"><img src="./Foto/DoctorProfile2.jpg" alt=""></a>
        <a href="#Doctor3"><img src="./Foto/DoctorProfile3.png" alt=""></a>
        <a href="#Doctor4"><img src="./Foto/DoctorProfile4.jpg" alt=""></a>
    </div>

    <div class="DoctorsSection" id="Doctor1">
        <span class="DoctorName">Harris Valdez</span>       
        <span class="Doctorborder"></span>
        <p>Harris Valdez eshte nje specialist i kirurgjis. Harris punon tek ne per me shum
        se 5 vite dhe eshte nje nga kirurget tone te pare.</p>
        
    </div>

    <div class="DoctorsSection" id="Doctor2">
        <span class="DoctorName">Sylvie Barnard</span>
        <span class="Doctorborder"></span>
        <p>Sylvie Barnard eshte specialiste e ortopedise. Sulvie Barnard punon ne spitalin tone
        per 2 vite me rradhe dhe ka numrin me te madhe te operacioneve ne vend.</p>
    </div>

    <div class="DoctorsSection" id="Doctor3">
        <span class="DoctorName">Lilliana Heath</span>
        <span class="Doctorborder"></span>
        <p>Lilliana Heath eshte specialiste interniste. Ajo punon tek ne pothuajse per 6 vite
        dhe suksesi i saj ka bere qe pacientet te kan nje feedback shum te mire per doktoreshen ne fjale.</p>
    </div>

    <div class="DoctorsSection" id="Doctor4">
        <span class="DoctorName">Glen Stout</span>
        <span class="Doctorborder"></span>
        <p>Glen Stout eshte specialist i kardiokirurgjis. Glen punon tek ne vetem me raste speciale
        dhe suksesi i tij ka bere qe ai te punoj ne spitalet me te medha ne rajon.</p>
    </div>
    </div>

    </section>

   <footer>
        

    <div class="footer">
        <div class="inner_footer">
            <div class="logo_container">
                <div style="display:flex; flex-direction:row;"><h1 class="HospitalName">Peja</h1> <h1 style="color:#24c1d6;">Hospital</h1></div><br />
                <img src="./Foto/logoS.png" >
            </div>

            

            <div class="footer_third">
                <h1 style="color:#24c1d6;">Links</h1>
                <li><a href="index.html">Home</a></li><br />
                <li><a href="services.html">Services</a></li><br />
                <li><a href="contactUs.html">Contact</a></li><br />
                <li><a href="Appointment.html">Appointment</a></li>
            </div>

            <div class="footer_third">
                <h1 style="color:#24c1d6;">Social</h1>
                <li><a href="https://www.facebook.com/" target="blank"><i class="fab fa-facebook-square"></i></a></li>
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
            <a class="gotopbtn" href="#"> <i class="fas fa-arrow-up"></i> </a>
        </div>
    </div>

</footer>


</body>
</html>

