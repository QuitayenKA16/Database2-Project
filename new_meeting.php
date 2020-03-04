<html>
	<body>
		<?php
			include "header.php";
		
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			$_SESSION['message'] = "";

			$name = $_POST['name'];
			$announcement = $_POST['announcement'];
			$week = $_POST['week'];
			$time_range = $_POST['time'];
			$day_of_the_week = $_POST['day_of_the_week'];
			
			$_SESSION['message'] .= $name . "<br>";
			$_SESSION['message'] .= $announcement . "<br>";
			$_SESSION['message'] .= $week . "<br>";
			$_SESSION['message'] .= $time_range . "<br>";
			$_SESSION['message'] .= $day_of_the_week . "<br><br>";
			
			$start_time = substr($time_range, 0, 8);
			$end_time = substr($time_range, -8, 8);
			
			
			$query = "SELECT * FROM time_slot WHERE start_time = $start_time AND end_time = $end_time AND day_of_the_week = '$day_of_the_week'";
			$_SESSION['message'] .= $query;
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
			$_SESSION['message'] = $row['time_slot_id'];
			
			/*
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
			*/
			$myconnection->close();
			header ("Location:create_meeting_form.php");
		?>
		<br>
	</body>
</html>