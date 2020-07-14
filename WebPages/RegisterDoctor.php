<?php
    @session_start();
    if(isset($_SESSION['Account'])){
    
        $Account = $_SESSION['Account'];
}
else{
    header("Location: ../WebPages/Login.php");
}
    include_once '../Models/DbConn.php';
    include_once '../Controller/DoctorController.php';

    $DocController = new DoctorController();
    $search_result = $DocController->LoadTable();
    $GetInfo = "Select * from HospitalInfo" ;
    $info = $DocController->filterTable($GetInfo);   
   
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
    <link rel="stylesheet" href="../css/Default.css">
    <link rel="stylesheet" href="../css/RegisterDoctor1.css"> 
    <link rel="stylesheet" href="../css/Index.css"> 
      
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
                                <li><a href="#">Doctors</a></li>
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

<section style="min-height:80vh">
    <div class="ButtonContainer">
        <input  type="button" class="btn" value="Register" onclick="RegisterClick();">
        <input  type="button" class="btn" value="Edit" onclick="EditClick();">
        <input  type="button" class="btn" value="Delete" onclick="DeleteClick();">
    </div>

    <div  class="FormContainer">
        
            
            <form id="formR" action="../Views/InsertDoctorView.php" method="post"  class="RegisterForm" id="RegisterForm" enctype="multipart/form-data">
            
                    <h1 class="FormH1">Register</h1>
                    
                    <div class="textbox">
                        <p style="margin-top:60px; color:red; font-size:15px; margin-bottom:15px;" id="error"></p>
                        <i class="fas fa-user"></i>
                        <Input required type="text" id="NameR" placeholder="Name" name="Emri" value="<?php echo htmlspecialchars($Name) ?>"> <br />
                    </div>    
                        <?php if(isset($Name_Error)) { ?>
                            <p style="color:red;"><?php echo $Name_Error ?></p>
                            <?php } ?> 
                    

                    <div class="textbox">
                        <i class="fas fa-user"></i>
                        <input required type="text" id="SurnameR" placeholder="Surname" name="SurnameInput" value="<?php echo htmlspecialchars($surname) ?>"> <br /> 
                    </div>    
                        <?php if(isset($Surname_Error)) { ?>
                            <p style="color:red;"><?php echo $Surname_Error ?></p>
                            <?php } ?>
                    

                    <div class="textbox">
                        <i class="fas fa-user-md"></i>
                        <input required type="text" id="SpecializationR" placeholder="Specialization" name="SpecializationInput" value="<?php echo htmlspecialchars($specialization) ?>"> <br />
                    </div>    
                        <?php if(isset($Specialization_Error)) { ?>
                            <p style="color:red;"><?php echo $Specialization_Error; ?></p>
                            <?php } ?>     
                    
                    
                    <div class="textbox">
                        <i class="far fa-clock"></i>
                        <input required type="number" id="ExperienceR" placeholder="Experience in years" name="ExperienceInput" value="<?php echo htmlspecialchars($experience) ?>"> <br />
                    </div>

                    <?php if(isset($Experience_Error)) { ?>
                            <p style="color:red;"><?php echo $Experience_Error; ?></p>
                            <?php } ?>
                    
                    <input type="hidden" name="size" value="1000000">
                    <div class="textbox">
                        <i class="far fa-clock"></i>
                        <input type="file" name="IMAGE" style="font-size:15px;"> <br />
                    </div>    

                    
                    
                    <div class="LoginButtons">
                        <input class="FormSubmit" type="submit" value="Submit" name="SubmitInput">
                            
                        <input  type="button" class="Cancelbtn" value="Cancel" onclick="cancelRegister();">                        
                    </div>
                    
                
            </form>
        

        
            <form action="../Views/EditDoctorView.php" class="EditForm"  method="post" id="formE" >
                <h1 class="FormH1">Edit</h1>
                
                <div class="textbox">
                    <p style="margin-top:60px; color:red; font-size:15px; margin-bottom:15px;" id="errorE"></p>
                    <i class="fas fa-id-card"></i>
                    <input required type="number" id="idE" placeholder="Type the id of Doctor" name="Id" class="EditID" min="1" value="<?php echo htmlspecialchars($DocID) ?>"> <br />
                </div>    
                        <?php if(isset($IdError)) { ?>
                            <p style="color:red;"><?php echo $IdError ?></p>
                            <?php } ?> 
                                           
                <div class="textbox">    
                    <i class="fas fa-user"></i>
                    <Input type="text" id="NameE" placeholder="New Name" name="Emri" value="<?php echo htmlspecialchars($DocName) ?>"> <br />
                </div>    
                        <?php if(isset($DocName_Error)) { ?>
                            <p style="color:red;"><?php echo $DocName_Error ?></p>
                            <?php } ?>

                <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input type="text" id="SurnameE" placeholder="New Surname" name="SurnameInput" value="<?php echo htmlspecialchars($DocSurname) ?>"> <br /> 
                </div>        
                    <?php if(isset($DocSurname_Error)) { ?>
                            <p style="color:red;"><?php echo $DocSurname_Error; ?></p>
                            <?php } ?>

                <div class="textbox">
                    <i class="fas fa-user-md"></i>       
                    <input type="text" id="SpecializationE" placeholder="New Specialization" name="SpecializationInput" value="<?php echo htmlspecialchars($DocSpecialization) ?>"> <br />
                </div>       
                    <?php if(isset($DocSpecialization_Error)) { ?>
                            <p style="color:red;"><?php echo $DocSpecialization_Error; ?></p>
                            <?php } ?> 

                <div class="textbox">
                    <i class="far fa-clock"></i>            
                    <input type="text" id="ExperienceE" placeholder="New Experience in years" name="ExperienceInput" value="<?php echo htmlspecialchars($DocExperience) ?>"> <br />
                </div>        
                    <?php if(isset($DocExperience_Error)) { ?>
                            <p style="color:red;"><?php echo $DocExperience_Error; ?></p>
                            <?php } ?>
                    
                <div class="LoginButtons">            
                    <input class="FormSubmit" type="submit" value="Submit" name="SubmitInputt">
                        <?php if(isset($NullError)) { ?>
                                <p style="color:red;"><?php echo $NullError; ?></p>                       
                                <?php } ?>    
                    
                        
                    <input  type="button" class="Cancelbtn" value="Cancel" onclick="cancelEdit();">                                
                </div>
            </form>
        

         
            <form class="DeleteForm" action="../Views/DeleteDoctorView.php" method="post" id="formD">
                <h1 class="FormH1">Delete</h1>
                <div class="textbox">
                    <p style="margin-top:60px; color:red; font-size:15px; margin-bottom:15px;" id="errorD"></p>
                    <i class="fas fa-id-card"></i>
                    <input required id="idD" type="number" min="1" placeholder="Type ID" name="DeleteInput" class="DeleteInput" value="<?php echo htmlspecialchars($DeleteInput) ?>"> <br />
                </div>      
                            <?php if(isset($error)) { ?>
                                <p style="color:red;"><?php echo $error; ?></p>
                                <?php } ?>

                            <?php if(isset($Error)) { ?>
                                <p style="color:red;"><?php echo $Error; ?></p>
                                <?php } ?>
                
                <div class="LoginButtons">
                    <input class="FormSubmit" type="submit" value="Delete" name="DeleteSubmit" >
                    
                    <input  type="button" class="Cancelbtn" value="Cancel" onclick="cancelDelete();">                        
                </div>    
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

 <script src="../js/Manage.js"></script>
 <script src="../js/Doctors.js"></script>
</body>
</html>
