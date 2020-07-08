<?php
include_once '../Controller/DoctorController.php';
$Controller = new DoctorController();
$TopDoctors = $Controller->topDoctors();
$count = count($TopDoctors);
$search_result = $Controller->LoadTable();
      
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Doctors</title>
    <link rel="stylesheet" href="../css/Doctors.css">
    <link rel="stylesheet" href="../css/default.css">
    
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/Table.css">
    
</head>        

<body>
        <header>
        
            
           <div style="display:flex; flex-direction:row;"><img style="width: 40px; height: auto;;" src="../Foto/logoS.png">
                <h1 class="HospitalName">Peja</h1> <h1 class="HospitalName" style="color:#24c1d6;">Hospital</h1>
           </div>
        <nav>
            <ul class="Nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contactUs.php">Contact</a></li>
                <li><a href="Appointment.php">Appointment</a></li>
             </ul>
         
        </nav>
        <a href="Login.php" class="SignInNav"> <input type="button" style="background:none; border:none;">Sign In</input> </a>
        <a href="Login.php" class="SignOutNav" onclick="SigningOut()"> <input type="button" style="background:none; border:none;">Sign Out</input> </a>

            
        
        </header>

<section>
    <div class="team-section" style="display:none;" >
        <h1>Our Doctors</h1>
            <span class="Doctorborder"></span>
                <div class="picture-section">
                    <a href="#Doctor1"><img src="../Foto/DoctorProfile1.jpg" alt=""></a>
                    <a href="#Doctor2"><img src="../Foto/DoctorProfile2.jpg" alt=""></a>
                    <a href="#Doctor3"><img src="../Foto/DoctorProfile3.png" alt=""></a>
                    <a href="#Doctor4"><img src="../Foto/DoctorProfile4.jpg" alt=""></a>
                </div>

                <div class="DoctorsSection" id="Doctor1">
                    <span class="DoctorName"><?php if($count>=1){ echo $TopDoctors[0][1]." ".$TopDoctors[0][2]; }?></span>       
                    <span class="Doctorborder"></span>
                    <p><?php if($count>=1){ echo 'Specialization:'.$TopDoctors[0][3]."</br>Experience: ".$TopDoctors[0][4]." Years"; }?></p>   
                </div>

                <div class="DoctorsSection" id="Doctor2">
                    <span class="DoctorName"><?php if($count>=2){ echo $TopDoctors[1][1]." ".$TopDoctors[1][2]; }?></span>
                    <span class="Doctorborder"></span>
                    <p><?php if($count>=2){ echo 'Specialization:'.$TopDoctors[1][3]."</br>Experience: ".$TopDoctors[1][4]." Years"; }?></p>
                </div>
    
                <div class="DoctorsSection" id="Doctor3">
                    <span class="DoctorName"><?php if($count>=3){ echo $TopDoctors[2][1]." ".$TopDoctors[2][2]; }?></span>
                    <span class="Doctorborder"></span>
                    <p><?php if($count>=3){ echo 'Specialization:'.$TopDoctors[2][3]."</br>Experience: ".$TopDoctors[2][4]." Years"; } ?></p>
                </div>

                <div class="DoctorsSection" id="Doctor4">
                    <span class="DoctorName"><?php if($count>=4){ echo $TopDoctors[3][1]." ".$TopDoctors[3][2]; } ?></span>
                    <span class="Doctorborder"></span>
                    <p><?php if($count>=4){ echo 'Specialization:'.$TopDoctors[3][3]."</br>Experience: ".$TopDoctors[3][4]." Years"; }?></p>
                </div> 
                <input type="button" value="Check all doctors" class="DocBTN" onclick="SeeAllClick();">
    </div>

    
            <form action="../WebPages/Doctors.php" method="post" class="SearchForm"  >
                 <div class="SearchFormInputContainer">
                     <input type="text" placeholder="Search" name="SearchInput" class="SearchInput">
                     <input type="submit" value="Search" name="SearchSubmit" class="SearchSubmit">
                 </div>
                <div id="table-wrapper">
                   <div id="table-scroll">
                     <table style="border:1px black ; line-height:25px" class="table sticky">
                        <thead>
                        <tr>
				            <th colspan=4><h3>Doctors Records</h3> </th>
				        </tr>

			            <tr>						
		                    <th> Name </th>
						    <th> Surname </th>
			                <th> Specialization </th>
						    <th> Experience </th>           
	                    </tr>
                        </thead>
                        <tbody>
                      <?php foreach($search_result as $row){ ?>
                    
                        <tr>
                            <td><?php echo $row['Emri'];?></td>
                            <td><?php echo $row['Mbiemri'];?></td>
                            <td><?php echo $row['Specializimi'];?></td>
                            <td><?php echo $row['Pervoja'];?></td>
                        </tr>
                      <?php } ?>
                      </tbody>

                     </table>
                  </div>
                </div>
                <input type="button" value="See the most experienced" class="DocBTN" onclick="SeeTop4();">
         </form> 
    

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
                <li><a href="Appointment.php">Appointment</a></li>
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

 <script src="../js/Doctors.js"></script>
</body>
</html>

