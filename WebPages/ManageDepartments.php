<?php
    @session_start();
    if(isset($_SESSION['Account'])){
    $Account = $_SESSION['Account'];
}
else{
    
    header("Location: ../WebPages/Login.php");
    

}
include_once '../Controller/DepartmentController.php';
$Controller = new DepartmentController();
$search_result = $Controller->LoadTable();
    if(!isset($Id)){
        $Id="";
    }
    if(!isset($Name)){
        $Name="";
    }
    if(!isset($Nr)){
        $Nr="";
    }
    if(!isset($NameE)){
        $NameE="";
    }
    if(!isset($IdE)){
        $IdE="";
    }
    if(!isset($NrE)){
        $NrE="";
    }
    if(!isset($IdD)){
        $IdD="";
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
                                <li><a href="../WebPages/RegisterDoctor.php">ManageDoctors</a></li>
                                <li><a>ManageUsers</a></li>
                                <li><a>Departments</a></li>
                            </ul>   
                        </li>
                    </ul>
                </div>
            </div>   
        </header>

<section>
            <div class="ButtonContainer">
                <input  type="button" class="btn" value="Register" onclick="RegisterClick();">
                <input  type="button" class="btn" value="Edit" onclick="EditClick();">
                <input  type="button" class="btn" value="Delete" onclick="DeleteClick();">
            </div>

            <div  class="FormContainer">
 
            <form action="../Views/InsertDepartmentView.php" method="post" id="form" class="RegisterForm" id="RegisterForm">
            
                    <h1 class="FormH1">Register</h1>
                    <div class="textbox">
                        <i class="fas fa-user"></i>
                        <Input required type="text" id="Name" placeholder="Name" name="Emri" value="<?php echo htmlspecialchars($Name) ?>"> <br />
                    </div>    
                        <?php if(isset($Name_Error)) { ?>
                            <p style="color:red;"><?php echo $Name_Error ?></p>
                            <?php } ?> 

                    <div class="textbox">
                        <i class="fas fa-user-md"></i>
                        <input required type="text" id="NrRoom" placeholder="Number of Rooms" name="NrRooms" value="<?php echo htmlspecialchars($Nr) ?>"> <br />
                    </div>    
                        <?php if(isset($NrRooms_Error)) { ?>
                            <p style="color:red;"><?php echo $NrRooms_Error ?></p>
                            <?php } ?>     
                    
                    
                    <div class="LoginButtons">
                        <input class="FormSubmit" type="submit" value="Submit" name="SubmitReg">
                            <?php if(isset($InsertResult)) { ?>
                                <p style="color:green;"><?php echo $InsertResult; ?></p>                       
                                <?php } ?>
                        <input  type="button" class="Cancelbtn" value="Cancel" onclick="CancelDepReg();">                        
                    </div>
                    
                
            </form> 
            
            <form action="../Views/EditDepartmentView.php" class="EditForm"  method="post" >
                <h1 class="FormH1">Edit</h1>
                
                <div class="textbox">
                    <i class="fas fa-id-card"></i>
                    <input required type="text" id="idDR" placeholder="Type the id of Department" name="Id" class="EditID" value="<?php echo htmlspecialchars($IdE) ?>"> <br />
                </div>    
                        <?php if(isset($IdE_Error)) { ?>
                            <p style="color:red;"><?php echo $IdE_Error ?></p>
                            <?php } ?> 
                                           
                <div class="textbox">    
                    <i class="fas fa-user"></i>
                    <Input  type="text" id="NameDR" placeholder="New Name" name="Name" value="<?php echo htmlspecialchars($NameE) ?>"> <br />
                </div>    
                        <?php if(isset($NameE_Error)) { ?>
                            <p style="color:red;"><?php echo $NameE_Error ?></p>
                            <?php } ?>

                <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input  type="text" id="NumberOfRooms" placeholder="New Number of Rooms" name="Nr" value="<?php echo htmlspecialchars($NrE) ?>"> <br /> 
                </div>        
                    <?php if(isset($NrE_Error)) { ?>
                            <p style="color:red;"><?php echo $NrE_Error; ?></p>
                            <?php } ?>
                    
                <div class="LoginButtons">            
                    <input class="FormSubmit" type="submit" value="Submit" name="SubmitInputt">
                        <?php if(isset($NullError)) { ?>
                                <p style="color:red;"><?php echo $NullError; ?></p>                       
                                <?php } ?>    
                    
                        <?php if(isset($ResultEdit)) { ?>
                            <p style="color:green;"><?php echo $ResultEdit; ?></p>                       
                            <?php } ?>
                    <input  type="button" class="Cancelbtn" value="Cancel" onclick="CancelDepEdit();">                                
                </div>
            </form>        
            
            <form class="DeleteForm" action="../Views/DeleteDepartmentView.php" method="post" id="DeleteForm">
                <h1 class="FormH1">Delete</h1>
                <div class="textbox">
                    <i class="fas fa-id-card"></i>
                    <input required id="idDep" type="text" placeholder="Type ID" name="IdD" class="DeleteInput" value="<?php echo htmlspecialchars($IdD) ?>"> <br />
                </div>
                            <?php if(isset($IdD_Error)) { ?>
                                <p style="color:red;"><?php echo $IdD_Error; ?></p>
                                <?php } ?>

                        
               
                <div class="LoginButtons">
                    <input class="FormSubmit" type="submit" value="Delete" name="DeleteSubmit" >
                    <?php if(isset($DeleteResult)) { ?>
                                <p style="color:green;"><?php echo $DeleteResult; ?></p>
                                <?php } ?>
                    <input  type="button" class="Cancelbtn" value="Cancel" onclick="CancelDepDel();">                        
                </div>    
            </form>

            <form action="../WebPages/ManageDepartments.php" method="post" class="SearchForm" style="display:flex; flex-direction:column">
                 <div class="SearchFormInputContainer">
                    <input type="text" placeholder="Search" name="SearchInput" class="SearchInput">
                    <input type="submit" value="Search" name="SearchSubmit" class="SearchSubmit">
                 </div>            

            <div id="table-wrapper">
               <div id="table-scroll">
                 <table style="border:1px black ; line-height:25px" class="table sticky">
                    <thead>
                    <tr>
				        <th colspan=4><h3>Departments Records</h3> </th>
				    </tr>

			        <tr>
						<th> ID </th>
		                <th> Name </th>
						<th> Nr: Rooms </th>
                        <th> Admin </th>           
	                </tr>
                    </thead>
                    <tbody>
                  <?php foreach($search_result as $row){ ?>
                    
                    <tr>
                        
                        <td><?php echo $row['Id'];?></td>
                        <td><?php echo $row['Emri'];?></td>
                        <td><?php echo $row['NrDhoma'];?></td>
                        <td><?php echo $row['Stafi'];?></td>
                        
                    </tr>
                  <?php } ?>
                  </tbody>

                 </table>
              </div>
            </div>                            

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

<script src="../js/Manage.js"></script>
</body>

</html>