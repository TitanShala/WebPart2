<?php
    //Me bo controllerin per mi lexu info
    include_once '../Controller/AppointmentController.php';
    $Controller = new AppointmentController();
    @session_start();
    if(isset($_SESSION['Account'])){
        $Account = $_SESSION['Account'];
        }      
    else{
        header("Location: ../WebPages/Login.php");    
        }

        $GetInfo = "Select * from HospitalInfo" ;
        $info = $Controller->filterTable($GetInfo);
        $Departments = $Controller->filterTable("select * from Reparti");     
        
        if(!isset($Month)){
            $Month='';
        }
        if(!isset($Year)){
            $Year='';
        }
        if(!isset($Day)){
            $Day='';
        }
        if(!isset($Hour)){
            $Hour='';
        }
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="../css/Appointment.css">
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
    <title>Make an Appointment</title>

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
                    <h1 class="HospitalName"><?php echo $info[0][8] ?></h1> <h1 style="color:#24c1d6;">Hospital</h1>
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
        <div class="DivForm">
            <h1>Make an appointment</h1>
            <p id="error" style="color:red;"></p>
            <form id="form" class="form" action="../Views/InsertAppointmentView.php" method="post">
                <div class="box" style="">
                    <img class="img" src="../Foto/department.png"> </img>
                    <div class="radio-input">
                        <?php foreach($Departments as $Department) { 
                            $DepName = $Department['Emri'];
                            echo $DepName."<input type='radio' name='dept' value='".$DepName."'>"; 
                        }?> 
                            <?php if(isset($Department_Error)) { ?>
                            <p style="color:red;"><?php echo $Department_Error ?></p>
                            <?php } ?> 
                        <?php} ?>
                    </div>
                </div>
                <div class="box">
                    <img class="img" src="../Foto/date.png"> </img>
                    <div class="date" style="display:flex; flex-direction:row; justify-content:center;">
                        <input name="Day" class="dateinput" id="day" type="number" placeholder="Day" min="1" max="31" 
                        value="<?php echo htmlspecialchars($Day) ?>"> <br />

                        <input name="Month" class="dateinput" id="month" type="number" placeholder="Month" min="1" max="12" 
                        value="<?php echo htmlspecialchars($Month) ?>"> <br />

                        <input name="Year" class="dateinput" id="year" type="number" placeholder="Year" min= <?php echo date('Y');?> max=<?php echo date('Y') + 1;?> 
                        value="<?php echo htmlspecialchars($Year) ?>"> <br />
                    </div>
                </div>
                <?php if(isset($Day_Error)) { ?>
                            <p style="color:red;"><?php echo $Day_Error ?></p>
                            <?php } ?> 
                            
                            <?php if(isset($Month_Error)) { ?>
                            <p style="color:red;"><?php echo $Month_Error ?></p>
                            <?php } ?> 

                            <?php if(isset($Year_Error)) { ?>
                            <p style="color:red;"><?php echo $Year_Error ?></p>
                            <?php } ?> 

                <div class="box">
                    <img class="img" src="../Foto/clock.png"> </img>
                        <input name="hour" class="input" id="hour" type="number" placeholder="Hour" min="8" max="16" value="<?php echo htmlspecialchars($Hour) ?>"> <br />
                </div>
                <?php if(isset($Hour_Error)) { ?>
                            <p style="color:red;"><?php echo $Hour_Error ?></p>
                            <?php } ?> 

                <input type="submit" class="submit" value="Submit" name="submit">
            </form>
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
    
 <script src="../js/AppointmentValidation.js"></script>
</body>
</html>
