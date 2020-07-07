<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <style>
        .FormContainer{
            display:flex;
            flex-direction:row;
            justify-content:space-around;
            //align-items:center;
            border:2px solid black;
            padding-top:5%;
        }

        .DoctorsTable{
            width:800px;
           
           
        }
        tr,td,th{
            border:1px solid black;
            text-align:center;
        }
        .sectiondiv{
            border:2px solid black;
            display:flex;
            flex-direction:column;
            width: 400px;
            padding: 20px 100px;
            margin-left:15%;
        }
        .sectiondiv input{
            margin-top:20px;
            height:30px;
        }
        
      
    </style>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/default.css">
      
       <link rel="stylesheet" href="../css/all.css">
      
    <title></title>                                                                                 
</head>
<body>

 <header>
         
           <div style="display:flex; flex-direction:row;"><img src="../Foto/logoS.png" class="DefaultIcon" style="width: 40px; height: auto;" >
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
    <div style="height:100vh" class="FormContainer">
        <form action="../Views/InsertDoctorView.php" method="post" id="form">
           <div class="sectiondiv">
                <h3 style="text-align:center; margin-bottom:20px;">Register Doctor</h3>
                <Input type="text" placeholder="Emri" name="Emri" >
                    <?php if(isset($Name_Error)) { ?>
                        <p style="color:red;"><?php echo $Name_Error; ?></p>
                        <?php } ?>

                <input type="text" placeholder="Surname" name="SurnameInput"> 
                    <?php if(isset($Surname_Error)) { ?>
                        <p style="color:red;"><?php echo $Surname_Error; ?></p>
                        <?php } ?>

                <input type="text" placeholder="Specialization" name="SpecializationInput">
                    <?php if(isset($Specialization_Error)) { ?>
                        <p style="color:red;"><?php echo $Specialization_Error; ?></p>
                        <?php } ?>     
                        
                <input type="text" placeholder="Experience in years" name="ExperienceInput"> 
                    <?php if(isset($Experience_Error)) { ?>
                        <p style="color:red;"><?php echo $Experience_Error; ?></p>
                        <?php } ?>
                
                <input type="submit" value="Submit" name="SubmitInput">
                    <?php if(isset($Result)) { ?>
                        <p style="color:green;"><?php echo $Result; ?></p>
                        <?php } ?>
            </div>
        </form>
            
        <!--<form action="../Views/ShowDoctosView.php" method="post" style="display:flex; flex-direction:column; justify-content:space-around; align-items:center; height:80%;">-->
            
                    <?php 
                    include_once '../Controller/DoctorController.php';
			        $controller = new DoctorController();
			        $result = $controller->getDoctors();                    
                   // if(isset($Results)) { 
 			echo '<table style="border:1px black ; line-height:25px" class="DoctorsTable">
					<tr>
						<th colspan=6><h3>Doctors Records</h3> </th>
					</tr>
					<tr>
						<th> ID </th>
						<th> Name </th>
						<th> Surname </th>
						<th> Specialization </th>
						<th> Experience </th>
						<th> Staff id </th>
					</tr>';
					foreach($result as $row){
						echo '<tr>
								<td>'; echo $row['Id'] ; echo '</td>
								<td>'; echo $row['Emri']; echo '</td>
								<td>'; echo $row['Mbiemri']; echo '</td>
								<td>'; echo $row['Specializimi']; echo '</td>
								<td>'; echo $row['Pervoja']; echo '</td>
								<td>'; echo $row['Stafi']; echo '</td>
						</tr>';
					}
					echo '</table>';                       
                         //} 
                         ?>
                 <!--        <input type="submit" value="GetDoctors" name="SubmitInp" style=" width:100px;">
               
        </form> -->

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