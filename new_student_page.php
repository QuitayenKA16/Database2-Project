<html>
	<body>
		<?php
			include "header.php";
		
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

			$query = "SELECT * FROM users WHERE email = '$_POST[loginEmail]' AND password = '$_POST[loginPassword]'";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
	
			if (mysqli_num_rows($result) == 1){
				$parentId = (mysqli_fetch_array ($result, MYSQLI_ASSOC))['id'];
				
				$sql = "SELECT * FROM parents WHERE id = " . $parentId;
				$result = mysqli_query($myconnection, $sql) or die ('Query failed: ' . mysql_error());
				
				if (mysqli_num_rows($result) == 1) {
					echo "Successful parent selection: <b>$_POST[name]</b><br>";
				
					$sql = "INSERT INTO users (name, email, phone, password)
						VALUES ('$_POST[name]', '$_POST[email]', '$_POST[phone]', '$_POST[password]')";
					
					if ($myconnection->query($sql) != TRUE){
						$_SESSION['error'] = "<br>Error creating student account.<br>Error: " . $sql . "<br>" . $myconnection->error;
						header ("Location:create_student_form.php");
					}
					else{
						$query = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = '$_POST[password]'";
						$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
						$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
						$studentId = $row['id'];
						$grade = $_POST['grade'];
				
						$sql = "INSERT INTO students VALUES (" . $studentId . "," . $parentId . "," . $grade . ")";
						if ($myconnection->query($sql) === TRUE)
							echo "Successful new student creation: <b>$_POST[name]</b>";
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