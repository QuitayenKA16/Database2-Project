<html>
	<body>
		<?php
			include "header.php";
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			$meet_id = $_SESSION['meet']['meet_id'];
			$student_list = "";
			
			echo "<br><a href='http://localhost/Database2-Project/admin_page.php'>Back</a><br><br>";
			
			$query = "SELECT * from enroll WHERE meet_id = $meet_id";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
				$student_id = $row['mentee_id'];
				$query = "SELECT * from users WHERE id = $student_id";
				$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$row2 = mysqli_fetch_array ($result2, MYSQLI_ASSOC);
				$email = $row2['email'];
				$student_list .= $email . "<br>";
			}
			
			$query = "SELECT * from enroll2 WHERE meet_id = $meet_id";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
				$student_id = $row['mentor_id'];
				$query = "SELECT * from users WHERE id = $student_id";
				$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$row2 = mysqli_fetch_array ($result2, MYSQLI_ASSOC);
				$email = $row2['email'];
				$student_list .= $email . "<br>";
			}
			
			$sql = "DELETE FROM meetings WHERE meet_id = $meet_id";
			if ($myconnection->query($sql) != TRUE){
				echo "Error: Could not delete meeting.<br>" . $myconnection->error . "<br>";
			}
			else{
				echo "The meeting ($meet_id) has been cancelled.<br><br><b>List of students to notify:</b><br>$student_list";
				unset($_SESSION['meet']);
			}
		?>
	</body>
</html>