<?php
    session_start();
    if(isset($_SESSION['Account'])){
        $Account = $_SESSION['Account'];
        }
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    
     <link rel="stylesheet" href="../css/Appointment.css">
     <link rel="stylesheet" href="../css/Default.css">
     <link rel="stylesheet" href="../css/all.min.css">

     <?php
            if(isset($Account) ){
                echo '<link rel="stylesheet" href="../css/SignedIn.css">';
                
            }
       ?>
    <title></title>

    <script>
       function gettheYear(){
       var year = Date().getFullYear();
       console.log('method u realizua');
       return year;
       }
                                 
    </script>
</head>
<body>

        <header>
            <div class="NavContainer">
                <div style="display:flex; flex-direction:row;">
                    <img style="width: 40px; height:auto;" src="../Foto/logoS.png">
                    <h1 class="HospitalName">Peja</h1> <h1 style="color:#24c1d6;">Hospital</h1>
                </div>

                <nav>
                    <ul class="Nav">
                        <li><a href="../WebPages/index.php">Home</a></li>
                        <li><a href="../WebPages/services.php">Services</a></li>
                        <li><a href="../WebPages/contactUs.php">Contact</a></li>
                        <li><a href="#" class="AppointmentAnch">Appointment</a></li>
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
                                <li><a>ManageDoctors</a></li>
                                <li><a>ManageUsers</a></li>
                                <li><a>Departments</a></li>
                            </ul>   
                        </li>
                    </ul>
                </div>
            </div>   
        </header>


    <section>

        <div class="DivForm">
            
            <h1>Make an appointment</h1>
            <p id="error" style="color:red;"></p>
            <form id="form" class="form" action="index.html">
                

                <div class="box">
                    <img class="img" src="../Foto/person.png"> </img>
                    <input class="input" id="name" type="text" placeholder="Full name" >
                </div>

                <div class="box" style="">
                    <img class="img" src="../Foto/department.png"> </img>
                    <!--<input class="input id="Department" type="text" placeholder="Department" required>
                    -->
                    <div class="radio-input">
                        Cardiology: <input type="radio" id="Cardiology" name="dept" value="Cardiology">
                        Surgery: <input type="radio" id="Surgery" name="dept" value="Surgery">
                        ORL: <input type="radio" id="Orl" name="dept" value="ORL">
                        Dentistry: <input type="radio" id="Dentistry" name="dept" value="Dentistry">
                    </div>
                </div>

                <div class="box">
                    <img class="img" src="../Foto/date.png"> </img>
                    <div class="date" style="display:flex; flex-direction:row; justify-content:center;">
                        <input class="dateinput" id="day" type="number" placeholder="Day" min="1" max="31">
                        <input class="dateinput" id="month" type="number" placeholder="Month" min="1" max="12" >
                        <input class="dateinput" id="year" type="number" placeholder="Year" min="1" >
                    </div>

                    <!--<input class="input" id="date" type="Date" placeholder="Date" >-->
                </div>

                <div class="box">
                    <img class="img" src="../Foto/clock.png"> </img>
                    
                        <input class="input" id="hour" type="number" placeholder="Hour" min="8" max="16">
                        
                    
                </div>

                <input type="submit" class="submit" value="Submit">

            </form>

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
                <li><a href="index.php">Home</a></li><br />
                <li><a href="services.php">Services</a></li><br />
                <li><a href="contactUs.php">Contact</a></li><br />
                <li><a href="#">Appointment</a></li>
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


 <script src="../js/AppointmentValidation.js"></script>
</body>
</html>
