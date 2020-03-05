<html>
	<body>
		<?php
			include "header.php";
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			$_SESSION['message'] = "";
			
			$meet_id = $_SESSION['meet']['meet_id'];
			$mentor_id = substr($_POST['mentor_id'], 0, strlen($_POST['mentor_id'])-1);
				
			$sql = "INSERT INTO enroll2 (meet_id, mentor_id) VALUES ($meet_id, $mentor_id)";
			$_SESSION['message'] .= $sql . "<br>";
			if ($myconnection->query($sql) != TRUE){
				$_SESSION['message'] .= "Error: Could not insert new row.<br>" . $myconnection->error . "<br>";
			}
			else {
				$sql = "UPDATE meetings SET capacity = capacity + 1 WHERE meet_id = $meet_id";
				$_SESSION['message'] .= $sql . "<br>";
				if ($myconnection->query($sql) != TRUE){
					$_SESSION['message'] .= "Error: Could not insert new row.<br>" . $myconnection->error . "<br>";
				}
			}
			$myconnection->close();
			header ("Location:enroll_form.php");
		?>
		<br>
	</body>
</html>