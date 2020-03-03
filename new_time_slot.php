<html>
	<body>
		<?php
			include "header.php";
		
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

			$start = $_POST['start_time'] . ":00";
			$end = $_POST['end_time'] . ":00";
			
			$sql = "INSERT INTO time_slot (day_of_the_week, start_time, end_time) VALUES ('Saturday', '$start', '$end')";
			$_SESSION['message'] = $sql . "<br>";
					
			if ($myconnection->query($sql) != TRUE){
				$_SESSION['message'] .= "Error creating time slot.<br> Error: " . $sql . "<br>" . $myconnection->error . "<br>";
			}
			else {
				$_SESSION['message'] .= "Successful creation of time slot: Saturday $start - $end<br>";
				$sql = "INSERT INTO time_slot (day_of_the_week, start_time, end_time) VALUES ('Sunday', '$start', '$end')";
				$_SESSION['message'] .= $sql . "<br>";
				if ($myconnection->query($sql) != TRUE){
					$_SESSION['message'] .= "Error creating time slot.<br> Error: " . $sql . "<br>" . $myconnection->error . "<br>";
				}
				else {
					$_SESSION['message'] .= "Successful creation of time slot: Sunday $start - $end<br>";
				}
			}
			$myconnection->close();
			header ("Location:create_time_slot_form.php");
		?>
		<br>
	</body>
</html>