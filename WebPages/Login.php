<?php
    session_start();
    session_destroy();

    if(!isset($Name)){
        $Name='';
    }

    if(!isset($Surname)){
        $Surname='';
    }

    if(!isset($Password)){
        $Password='';
    }
    if(!isset($Email)){
        $Email='';
    }

    if(!isset($Username)){
        $Username='';
    }

    if(!isset($UsernameL)){
        $UsernameL='';
    }

    if(!isset($PasswordL)){
        $PasswordL='';
    }
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Login Page</title>

    <link rel="stylesheet" href="../css/Login1.css">
     <link rel="stylesheet" href="../css/Default.css">
     <link rel="stylesheet" href="../css/all.min.css">
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
                                <li><a>ManageDoctors</a></li>
                                <li><a>ManageUsers</a></li>
                                <li><a>Departments</a></li>
                            </ul>   
                        </li>
                    </ul>
                </div>
            </div>   
        </header>


<section class="home">
     
        <div class="bodyh1">
            <h1 style="display:inline;font-size: 7vh; color:white;">WE CARE ABOUT</br>YOUR </h1><h1 style="color:#24c1d6; font-size:7vh;display:inline;">HEALTH</h1>
        </div>

       <!-- <div style="display:flex; flex-direction="row"; height:800px; border:2px solid white;"> -->
         <div class="login-box">

         <p style="margin-top:60px;" id="error"></p>
          <form id="form" action="../Views/LoginView.php" method="post">
            <h1>Login</h1>
             <div class="textbox">
                <i class="fas fa-user"></i>
                <input id="name" type="text" placeholder="Username" name="LoginUsername" required value="<?php echo htmlspecialchars($UsernameL) ?>"> <br />
             </div>

             <div class="textbox">
                <i class="fas fa-lock"></i>
                <input id="password" type="password" placeholder="Password" name="LoginPassword" required value="<?php echo htmlspecialchars($PasswordL) ?>"> <br />
             </div>

             <div class="RadioInputs">
                        Admin: <input type="radio" id="Admin" name="account" value="Admin">
                        User: <input type="radio" id="User" name="account" value="User"> 
             </div>                     

             <?php
                if(isset($LoginError)){ ?>
                    <p style="color:red;"><?php echo $LoginError; ?></p>     
              <?php  } ?>

             <div class="LoginButtons">
                 <input  type="submit" class="btnLogin" value="Log in" name="LoginBtn">
                 <input  type="button" class="Cancelbtn" value="Cancel" onclick="cancelLogin();">
                 <input type="button" class="btnNotRegistered" value="Not Registered Yet?" onclick="NotRegistedYet();">
             </div>
           </form>
         </div>

        <!--</div> -->


      <div class="Register-box">
        <p id="errorR" style="margin-top:200px;"></p>
          <form id="formRegister" action="../Views/RegisterView1.php" method="post">
            <h1>Register</h1>
            <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input  name="NameReg" id="Regname" type="text" placeholder="Name" required value="<?php echo htmlspecialchars($Name) ?>"> <br />
            </div>
            <?php if(isset($NameR_Error)) { ?>
                            <p style="color:red;"><?php echo $NameR_Error ?></p>
                            <?php } ?> 

            <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input  name="SurnameReg" id="Regsurname" type="text" placeholder="Surname" required value="<?php echo htmlspecialchars($Surname) ?>"> <br />
            </div>
            <?php if(isset($SurnameR_Error)) { ?>
                            <p style="color:red;"><?php echo $SurnameR_Error ?></p>
                            <?php } ?> 

            <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input id="nameR" name="UsernameR" type="text" placeholder="Username" required value="<?php echo htmlspecialchars($Username) ?>"> <br />
            </div>
            <?php if(isset($UsernameR_Error)) { ?>
                            <p style="color:red;"><?php echo $UsernameR_Error ?></p>
                            <?php } ?> 

            <div class="textbox">
                    <i class="fas fa-at"></i>
                    <input id="emailR" name="EmailR" type="email" placeholder="Email Adress" required value="<?php echo htmlspecialchars($Email) ?>"> <br />
            </div>
            <?php if(isset($EmailR_Error)) { ?>
                            <p style="color:red;"><?php echo $EmailR_Error ?></p>
                            <?php } ?> 

             <div class="textbox">
                 <i class="fas fa-lock"></i>
                    <input id="passwordR" name="PasswordR" type="password" placeholder="Password" required value="<?php echo htmlspecialchars($Password) ?>"> <br />
             </div>
             <?php if(isset($PasswordR_Error)) { ?>
                            <p style="color:red;"><?php echo $PasswordR_Error ?></p>
                            <?php } ?> 

             <div class="textbox">
                 <i class="fas fa-lock"></i>
                    <input id="passwordconfirmR" name="ConfirmPasswordR" type="password" placeholder="Confirm Password" required>
            </div>
            <?php if(isset($ConfirmPasswordR_Error)) { ?>
                            <p style="color:red;"><?php echo $ConfirmPasswordR_Error ?></p>
                            <?php } ?> 

             <div class="LoginButtons">
                     <input  type="submit" class="btnLogin" value="Register" name="RegisterBtn">
                     <?php if(isset($RegisterResult)) { ?>
                            <p style="color:green;"><?php echo $RegisterResult ?></p>
                            <?php } ?> 
                     <input  type="button" class="Cancelbtn" value="Cancel" onclick="cancelLogin();">
                    <input type="button" class="btnNotRegistered" value="Already have an account?" onclick="HaveAnAccount();">                    
            </div>
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
                <li><a href="index.phpl">Home</a></li><br />
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
            <a class="gotopbtn" href="#"> <i class="fas fa-arrow-up"></i> </a>
        </div>
    </div>

</footer>

 <script src="../js/LoginValidation1.js"></script>
</body>
</html>
