<html>
	<body>
		<?php
			include "header.php";
		
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

			$query = "SELECT * FROM users WHERE username = '$_POST[loginUsername]' AND password = '$_POST[loginPassword]'";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$count = mysqli_num_rows($result);
	
			if ($count == 1){
				$parentId = (mysqli_fetch_array ($result, MYSQLI_ASSOC))['uid'];
				
				$sql = "SELECT * FROM parents WHERE uid = " . $parentId;
				$result = mysqli_query($myconnection, $sql) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
				
				if ($count == 1) {
					echo "Successful parent selection: <b>$_POST[loginUsername]</b><br>";
				
					$sql = "INSERT INTO users (firstName, lastName, email, phoneNum, username, password)
						VALUES ('$_POST[firstName]', '$_POST[lastName]', '$_POST[email]', '$_POST[phoneNum]', '$_POST[username]', '$_POST[password]')";
					
					if ($myconnection->query($sql) != TRUE){
						$_SESSION['error'] = "<br>Error creating student account.<br>Error: " . $sql . "<br>" . $myconnection->error;
						header ("Location:create_student_form.php");
					}
					else{
						$query = "SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]'";
						$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
						$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
						$studentId = $row['uid'];
						$grade = $_POST['grade'];
				
						$sql = "INSERT INTO students VALUES (" . $studentId . "," . $parentId . "," . $grade . ")";
						if ($myconnection->query($sql) === TRUE)
							echo "Successful new student creation: <b>$_POST[username]</b>";
						else
							echo "Error: " . $sql . "<br>" . $myconnection->error;
					}
				}
				else {
					$_SESSION['error'] = "Parent account was not entered.";
					header ("Location:create_student_form.php");
				}
			}
			else{
				$_SESSION['error'] = "Parent account username and/or password is incorrect.";
				header ("Location:create_student_form.php");
			}
			$myconnection->close();
		?>
		<br>
	</body>
</html>