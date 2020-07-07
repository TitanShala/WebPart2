<?php
	include_once '../Controller/DoctorController.php';
	if(isset($_POST['SubmitInp'])){
		$Results = 0 ;

		include 'C:/xampp/htdocs/Project/WebPages/RegisterDoctor.php';
		
		//$ShowDoctors = new ShowDoctors();
		//$ShowDoctors->getDoctors();
		
	}
	
	class ShowDoctors{
		public function getDoctors(){
			$controller = new DoctorController();
			$result = $controller->getDoctors();

			echo '<table style="border:1px solid black ; line-height:40px">
					<tr>
						<th colspan=6><h2>Doctors Records</h2> </th>
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
            /*
			foreach($result as $row){
				echo $row['Emri'].' '.$row['Mbiemri'];
				echo '<br>';
			}*/
		}
	}
	
	?> 

	
    