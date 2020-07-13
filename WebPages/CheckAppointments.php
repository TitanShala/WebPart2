<?php
    include_once '../Controller/AppointmentController.php';
    $Controller = new AppointmentController();
    $search_result = $Controller->loadTable();
    @session_start();
    if(isset($_SESSION['Account'])){
    $Account = $_SESSION['Account'];
    }
    else{  
    header("Location: ../WebPages/Login.php");
    }
    $GetInfo = "Select * from HospitalInfo" ;
    $info = $Controller->filterTable($GetInfo);    
?> 

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/LoadInfo.css"> 
    <link rel="stylesheet" href="../css/Default.css">
         
    <?php
            if(isset($Account) ){
                echo '<link rel="stylesheet" href="../css/SignedIn.css">';
                if($Account == 'Admin'){
                    echo '<link rel="stylesheet" href="../css/Admin.css">';  
                }
                
            }
       ?>    
    <title></title>                                                                                 
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
                                <li><a href="#">Client Appointments</a></li>
                            </ul>   
                        </li>
                    </ul>
                </div>
            </div>   
        </header>

        <section style="min-height:80vh; padding-bottom:200px;">
                    
                    <h1 style="inline-block">Contact Messages</h1>
                    ?>
                  <form action = "../WebPages/CheckAppointments.php" method="post" style="margin-bottom:100px;">
                  <div class="SearchFormInputContainer">
                     <input type="text" placeholder="Search" name="SearchInput" class="SearchInput">
                     <input type="submit" value="Search" name="SearchSubmit" class="SearchSubmit">
                 </div>

                  <?php 
                  if(count($search_result) < 1){
                    echo '<h2 style="text-align:center;" >No Appointments</h2>';
                  }
                  
                  echo '<div class="ContactDiv" style="display:inline-block; align-items:left; margin-bottom:50px;"> ';
                  foreach($search_result as $row){ ?>
                    
                    
                        <div class="ClientInfoDiv" style="width:300px; float:left;">
                            <?php echo "<h3>Date: $row[Data]</h3>";?>
                            <?php echo "<h3>Name: $row[Name]</h3>";?>
                            <?php echo "<h3>Username: $row[Username]</h3>";?>
                            <?php echo "<h3>Department: $row[Department]</h3>";?>
                            <?php echo "<h3>Hour: $row[Hour]</h2>";?>
                            
                        </div>
                       
                        <!-- <?php echo "<p>$row[Message]</p>";?> -->
                   

                  <?php } ?>
                  </div>
                  </form>

                  
               

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
