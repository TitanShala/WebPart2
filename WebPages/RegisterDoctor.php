<?php
    include_once '../Models/DbConn.php';
    include_once '../Controller/DoctorController.php';

    $DocController = new DoctorController();
    $search_result = $DocController->LoadTable();
   // $DocController->ClearInputs();

?>

<?php 
    //Clear Loaded Inputs
    if(!isset($Name)){
        $Name="";
    }

    if(!isset($surname)){
        $surname="";
    }

    if(!isset($specialization)){
        $specialization="";
    }

    if(!isset($experience)){
        $experience="";
    }

    if(!isset($DeleteInput)){
        $DeleteInput="";
    }

    if(!isset($IdInput)){
        $IdInput="";
    }

    if(!isset($DocName)){
        $DocName="";
    }

    if(!isset($DocSurname)){
        $DocSurname="";
    }

    if(!isset($DocSpecialization)){
        $DocSpecialization="";
    }

    if(!isset($DocExperience)){
        $DocExperience="";
    }

    if(!isset($DocID)){
        $DocID="";
    }
    
?>



<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/RegisterDoctor.css"> 
    <link rel="stylesheet" href="../css/all.css">
      
    <title></title>                                                                                 
</head>
<body>

 <header>
         
           <div style="display:flex; flex-direction:row;"><img src="../Foto/logoS.png" class="DefaultIcon" style="width: 40px; height: auto;" >
           <h1 class="HospitalName">Peja</h1> <h1 class="HospitalName" style="color:#24c1d6;">Hospital</h1></div>
        <nav>
            <ul class="Nav">
                <li><a href="../WebPages/index.php">Home</a></li>
                <li><a href="../WebPages/services.php">Services</a></li>
                <li><a href="../WebPages/contactUs.php">Contact</a></li>
                <li><a href="#">About</a></li>
             </ul>
         
        </nav>
        
        
        <a href="Login.php" class="SignInNav"> <input type="button" style="background:none; border:none;">Sign In</input> </a>
        <a href="#" class="SignOutNav"> <input type="button" style="background:none; border:none;">Sign Out</input> </a>
       
      
</header>

<section>
    <div class="ButtonContainer">
        <input  type="button" class="btn" value="Register" onclick="RegisterClick();">
        <input  type="button" class="btn" value="Edit" onclick="EditClick();">
        <input  type="button" class="btn" value="Delete" onclick="DeleteClick();">
    </div>
    <div  class="FormContainer">
        <form action="../Views/InsertDoctorView.php" method="post" id="form" class="RegisterForm" id="RegisterForm">
           
                <h3 style="text-align:center; margin-bottom:20px;">Register Doctor</h3>
                <Input type="text" placeholder="Name" name="Emri" value="<?php echo htmlspecialchars($Name) ?>"> <br />
                    <?php if(isset($Name_Error)) { ?>
                        <p style="color:red;"><?php echo $Name_Error ?></p>
                        <?php } ?> 

                <input type="text" placeholder="Surname" name="SurnameInput" value="<?php echo htmlspecialchars($surname) ?>"> <br /> 
                    <?php if(isset($Surname_Error)) { ?>
                        <p style="color:red;"><?php echo $Surname_Error; ?></p>
                        <?php } ?>

                <input type="text" placeholder="Specialization" name="SpecializationInput" value="<?php echo htmlspecialchars($specialization) ?>"> <br />
                    <?php if(isset($Specialization_Error)) { ?>
                        <p style="color:red;"><?php echo $Specialization_Error; ?></p>
                        <?php } ?>     
                        
                <input type="text" placeholder="Experience in years" name="ExperienceInput" value="<?php echo htmlspecialchars($experience) ?>"> <br />
                    <?php if(isset($Experience_Error)) { ?>
                        <p style="color:red;"><?php echo $Experience_Error; ?></p>
                        <?php } ?>
                
                <input type="submit" value="Submit" name="SubmitInput">
                    <?php if(isset($Result)) { ?>
                        <p style="color:green;"><?php echo $Result; ?></p>                       
                        <?php } ?>
            
        </form>


        <form action="../Views/EditDoctorView.php" class="EditForm" class="EditForm" method="post" >
            <h3>Edit Doctor</h3>
                <input type="text" placeholder="Type the id of Doctor" name="Id" class="EditID" value="<?php echo htmlspecialchars($DocID) ?>"> <br />
                    <?php if(isset($IdError)) { ?>
                        <p style="color:red;"><?php echo $IdError ?></p>
                        <?php } ?>                
                <Input type="text" placeholder="New Name" name="Emri" value="<?php echo htmlspecialchars($DocName) ?>"> <br />
                    <?php if(isset($DocName_Error)) { ?>
                        <p style="color:red;"><?php echo $DocName_Error ?></p>
                        <?php } ?> 

                <input type="text" placeholder="New Surname" name="SurnameInput" value="<?php echo htmlspecialchars($DocSurname) ?>"> <br /> 
                    <?php if(isset($DocSurname_Error)) { ?>
                        <p style="color:red;"><?php echo $DocSurname_Error; ?></p>
                        <?php } ?>

                <input type="text" placeholder="New Specialization" name="SpecializationInput" value="<?php echo htmlspecialchars($DocSpecialization) ?>"> <br />
                    <?php if(isset($DocSpecialization_Error)) { ?>
                        <p style="color:red;"><?php echo $DocSpecialization_Error; ?></p>
                        <?php } ?>     
                        
                <input type="text" placeholder="New Experience in years" name="ExperienceInput" value="<?php echo htmlspecialchars($DocExperience) ?>"> <br />
                    <?php if(isset($DocExperience_Error)) { ?>
                        <p style="color:red;"><?php echo $DocExperience_Error; ?></p>
                        <?php } ?>
                
                <input type="submit" value="Submit" name="SubmitInputt">
                    <?php if(isset($resultEdit)) { ?>
                        <p style="color:green;"><?php echo $resultEdit; ?></p>                       
                        <?php } ?>
        </form>

        
        <form class="DeleteForm" action="../Views/DeleteDoctorView.php" method="post" id="DeleteForm">
            <h3>Delete Doctor</h3>
            <input type="text" placeholder="Type ID" name="DeleteInput" class="DeleteInput" value="<?php echo htmlspecialchars($DeleteInput) ?>"> <br />
                    <?php if(isset($error)) { ?>
                        <p style="color:red;"><?php echo $error; ?></p>
                        <?php } ?>

                    <?php if(isset($Error)) { ?>
                        <p style="color:red;"><?php echo $Error; ?></p>
                        <?php } ?>
           
            <input type="submit" value="Delete" name="DeleteSubmit" class="DeleteSubmit">
        </form>
        
            
        
            
            <form action="../WebPages/RegisterDoctor.php" method="post" class="SearchForm" style="display:flex; flex-direction:column">
                 <div class="SearchFormInputContainer">
                 <input type="text" placeholder="Search" name="SearchInput" class="SearchInput">
                 <input type="submit" value="Search" name="SearchSubmit" class="SearchSubmit">
                 </div>
                 
            <div id="table-wrapper">
               <div id="table-scroll">
                 <table style="border:1px black ; line-height:25px" class="table sticky">
                    <thead>
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
	                </tr>
                    </thead>
                    <tbody>
                  <?php foreach($search_result as $row){ ?>
                    
                    <tr>
                        
                        <td><?php echo $row['Id'];?></td>
                        <td><?php echo $row['Emri'];?></td>
                        <td><?php echo $row['Mbiemri'];?></td>
                        <td><?php echo $row['Specializimi'];?></td>
                        <td><?php echo $row['Pervoja'];?></td>
                        <td><?php echo $row['Stafi'];?></td>
                        
                    </tr>
                  <?php } ?>
                  </tbody>

                 </table>
              </div>
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
                <li><a href="index.php">Home</a></li><br />
                <li><a href="services.php">Services</a></li><br />
                <li><a href="contactUs.php">Contact</a></li><br />
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


 <script src="../js/RegisterDoctor.js"></script>
</body>
</html>