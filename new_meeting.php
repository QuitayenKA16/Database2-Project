<html>
	<body>
		<?php
			include "header.php";
		
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			$_SESSION['message'] = "";

			$group_id = $_SESSION['group']['group_id'];
			$name = $_POST['name'];
			$announcement = $_POST['announcement'];
			$week = $_POST['week'];
			$time_slot_id = $_POST['time_slot_id'];
			
			$_SESSION['message'] .= $group_id . "<br>";
			$_SESSION['message'] .= $name . "<br>";
			$_SESSION['message'] .= $announcement . "<br>";
			$_SESSION['message'] .= $week . "<br>";
			$_SESSION['message'] .= $time_slot_id . "<br>";
			
			$query = "INSERT INTO meetings (meet_name, date, time_slot_id, capacity, announcement, group_id)
				VALUES ($name, $date, $time_slot_id, 0, $announcement, $group_id)";
			$_SESSION['message'] .= $query;
			
			/*
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