<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Services</title>

    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/services.css">
    <link rel="stylesheet" href="./css/all.min.css">
</head>

<body>
        <header>

        <div style="display:flex; flex-direction:row;"><img style="width: 40px; height: auto;;" src="./Foto/logoS.png">
        <h1 class="HospitalName">Peja</h1> <h1 class="HospitalName" style="color:#24c1d6;">Hospital</h1></div>

        <nav>
            <ul class="Nav">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="contactUs.html">Contact</a></li>
                <li><a href="Appointment.html">Appointment</a></li>
             </ul>
         
        </nav>
        <a href="Login.html" class="SignInNav"> <input type="button" style="background:none; border:none;">Sign In</input> </a>
        <a href="Login.html" class="SignOutNav" onclick="SigningOut()"> <input type="button" style="background:none; border:none;">Sign Out</input> </a>
        
        </header> 
        

        <section> 
            <div class="departments-section">
              <h1>Our Services</h1>
              <span class="Departments-border"></span>
              <div class="picture-section">
                    <div> <a href="#Department1"><img src="./Foto/cardiology.jpg" alt=""></a> <h3>Cardiology</h3> </div>
                    <div> <a href="#Department2"><img src="./Foto/orl.jpg" alt=""></a> <h3>ORL</h3> </div>
                    <div> <a href="#Department3"><img src="./Foto/dentistry.jpg" alt=""></a> <h3>Dentistry</h3> </div>
                    <div> <a href="#Department4"><img src="./Foto/surgery.jpg" alt=""></a> <h3>Surgery</h3> </div>
               </div>

               <div class="DepartmentSection" id="Department1">
                    <span class="DepartmentName">Cardiology</span>       
                    <span class="Departmentborder"></span>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pellentesque tristique egestas. Etiam euismod est vel mattis aliquet. 
                        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras placerat placerat porttitor. 
                        Nunc lorem nunc, varius non laoreet in, efficitur sed urna. Phasellus lacinia leo ac ligula tincidunt posuere. 
                        Maecenas non ornare mauris, eget sollicitudin ante. Phasellus leo turpis, sagittis eget purus ac, volutpat dictum est.
                    </p>        
               </div>

               <div class="DepartmentSection" id="Department2">
                    <span class="DepartmentName">ORL</span>       
                    <span class="Departmentborder"></span>
                    <p>
                        Turpis egestas integer eget aliquet nibh praesent tristique. Vestibulum lorem sed risus ultricies tristique nulla aliquet. 
                        Iaculis at erat pellentesque adipiscing commodo elit at imperdiet dui. Luctus venenatis lectus magna fringilla urna porttitor 
                        rhoncus dolor purus. Sit amet luctus venenatis lectus magna fringilla.
                    </p>        
               </div>

               <div class="DepartmentSection" id="Department3">
                    <span class="DepartmentName">Dentistry</span>       
                    <span class="Departmentborder"></span>
                    <p>
                        Quam viverra orci sagittis eu volutpat odio facilisis mauris sit. Pharetra pharetra massa massa ultricies. 
                        Eget aliquet nibh praesent tristique magna sit. Fermentum odio eu feugiat pretium nibh ipsum consequat. 
                        Pellentesque nec nam aliquam sem et tortor consequat id.
                    </p>        
               </div>

               <div class="DepartmentSection" id="Department4">
                    <span class="DepartmentName">Surgery</span>       
                    <span class="Departmentborder"></span>
                    <p>
                        Mauris a diam maecenas sed enim ut. Augue lacus viverra vitae congue. 
                        Commodo odio aenean sed adipiscing. 
                        Faucibus et molestie ac feugiat sed lectus vestibulum mattis ullamcorper.
                    </p>        
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
                <li><a href="#">Home</a></li><br />
                <li><a href="services.html">Services</a></li><br />
                <li><a href="contactUs.html">Contact</a></li><br />
                <li><a href="Appointment.html">Appointment</a></li>
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

