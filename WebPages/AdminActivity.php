<?php
include_once '../Controller/ManageController.php';
$Controller = new ManageController();
$search_result = $Controller->LoadTableDepartment();

$search_result1 = $Controller->LoadTableDoctor();

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Default.css">
    <link rel="stylesheet" href="../css/RegisterDoctor1.css"> 
    <link rel="stylesheet" href="../css/Index.css">
    <link rel="stylesheet" href="../css/AdminActivity.css"> 
      
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
                <div class="HospitalName">
                    <img class="IconImg" src="../Foto/logoS.png">
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
                <div class="ManageDiv" >
        
                    <ul class="Manager">
                        <li><div class="ImgAnchor"><img class="ManagePhoto" src="../Foto/Manage.png"><a>Manage</a></div>
                            <ul>      
                                <li><a href="../WebPages/RegisterDoctor.php">Doctors</a></li>
                                <li><a href="../WebPages/ManageDepartments.php">Departments</a></li>
                                <li><a href="#">Admin Activities</a></li>
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


        <form action="../WebPages/AdminActivity.php" method="post" class="SearchForm">
                 <div class="SearchFormInputContainer">
                     <input type="text" placeholder="Search" name="SearchInput1" class="SearchInput">
                     <input type="submit" value="Search" name="SearchSubmit1" class="SearchSubmit">
                 </div>
        <div id="table-wrapper">
               <div id="table-scroll">
                 <table class="table sticky">
                    <thead>
                    <tr>
				        <th colspan=5><h3>Admin Activity to Doctors</h3> </th>
				    </tr>

			        <tr>
                        <th> Date </th>
						<th> Stafi </th>
		                <th> Doctor Name </th>
                        <th> Doctor ID </th>
						<th> Activity </th>
			            
	                </tr>
                    </thead>
                    <tbody>
                  <?php 
                  
                  foreach($search_result1 as $row){
                        $sql = "Select * from Doktori where Id=".$row['Doctor'];
                      $result = $Controller->filterTable($sql);
                      ?>
                    
                    <tr>
                        <td><?php echo $row['Data'];?></td>
                        <td><?php echo $row['Stafi'];?></td>
                        <td><?php echo $result[0][1]." ".$result[0][2];?></td>
                        <td><?php echo $row['Doctor'];?></td>
                        <td><?php echo $row['Aktiviteti'];?></td>
                        
                        
                    </tr>
                  <?php } ?>
                  </tbody>

                 </table>
              </div>
            </div>
            </form>     


        <form action="../WebPages/AdminActivity.php" method="post" class="SearchForm"  >
                 <div class="SearchFormInputContainer">
                     <input type="text" placeholder="Search" name="SearchInput" class="SearchInput">
                     <input type="submit" value="Search" name="SearchSubmit" class="SearchSubmit">
                 </div>
        <div id="table-wrapper">
               <div id="table-scroll">
                 <table  class="table sticky">
                    <thead>
                    <tr>
				        <th colspan=5><h3>Admin Activity to Departments</h3> </th>
				    </tr>

			        <tr>
                        <th> Date </th>
						<th> Stafi </th>
		                <th> Department:Name </th>
                        <th> Department:ID </th>
						<th> Activity </th>
			            
	                </tr>
                    </thead>
                    <tbody>
                  <?php 
                  
                  foreach($search_result as $row){
                        $sql = "Select * from Reparti where Id=".$row['Reparti'];
                      $result = $Controller->filterTable($sql);
                      ?>
                    
                    <tr>
                        <td><?php echo $row['Data'];?></td>
                        <td><?php echo $row['Stafi'];?></td>
                        <td><?php echo $result[0][1];?></td>
                        <td><?php echo $row['Reparti'];?></td>
                        <td><?php echo $row['Aktiviteti'];?></td>
                        
                        
                    </tr>
                  <?php } ?>
                  </tbody>

                 </table>
              </div>
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
