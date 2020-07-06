<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./css/default.css">
    <title></title>
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
                <li><a href="#">About</a></li>
             </ul>
         
        </nav>
        
        
        <a href="Login.html" class="SignInNav"> <input type="button" style="background:none; border:none;">Sign In</input> </a>
        <a href="#" class="SignOutNav"> <input type="button" style="background:none; border:none;">Sign Out</input> </a>
       
      
</header>

<section >
    <div style="height:70vh ; width:100%; border:solid red 2px">
        <form action="Views/InsertDoctorView.php" method="post">
           <div style="margin-top: 100px;">
                Emri: <Input type="text" placeholder="Emri" name="Emri">
                Surname: <input type="text" placeholder="Surname" name="SurnameInput">
                Specialization: <input type="text" placeholder="Specialization" name="SpecializationInput">
                Experience: <input type="text" placeholder="Experience in years" name="ExperienceInput">
                <input type="submit" value="Submit" name="SubmitInput">
            </div>
        </form>
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
                <li><a href="#">About</a></li>
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
            <a class="gotopbtn" href="#"> <i class="fas fa-arrow-up"></i> </a>
        </div>
    </div>

</footer>



</body>
</html>