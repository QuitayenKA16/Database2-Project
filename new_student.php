<html>
	<body>
		<?php
			include "header.php";
		
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			
			$name = $_SESSION['loggedUser']['name'];
			$email = $_SESSION['loggedUser']['email'];
			$password = $_SESSION['loggedUser']['password'];
			
			$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
			$_SESSION['message'] = $query . "<br>";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
	
			if (mysqli_num_rows($result) == 1){
				$parentId = (mysqli_fetch_array ($result, MYSQLI_ASSOC))['id'];
				
				$sql = "SELECT * FROM parents WHERE parent_id = " . $parentId;
				$_SESSION['message'] = $sql . "<br>";
				$result = mysqli_query($myconnection, $sql) or die ('Query failed: ' . mysql_error());
				
				if (mysqli_num_rows($result) == 1) {
					echo "Successful parent selection: <b>$name</b><br>";
				
					$sql = "INSERT INTO users (name, email, phone, password)
						VALUES ('$_POST[name]', '$_POST[email]', '$_POST[phone]', '$_POST[password]')";
					$_SESSION['message'] = $sql . "<br>";
					
					if ($myconnection->query($sql) != TRUE){
						$_SESSION['error'] = "<br>Error creating student account.<br>Error: " . $sql . "<br>" . $myconnection->error . "<br>";
					}
					else{
						$query = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = '$_POST[password]'";
						$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
						$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
						$studentId = $row['id'];
						$grade = $_POST['grade'];
				
						$sql = "INSERT INTO students VALUES (" . $studentId . "," . $grade . "," . $parentId . ")";
						if ($myconnection->query($sql) === TRUE){
							$_SESSION['message'] .= "Successful new student creation: <b>$_POST[name]</b><br>";
							if ($grade <= 9){ //mentees
								$sql = "INSERT INTO mentees VALUES (" . $studentId . ")";
								$_SESSION['message'] = $sql . "<br>";
								if ($myconnection->query($sql) != TRUE) echo "Error: " . $sql . "<br>" . $myconnection->error . "<br>";
							}
							if ($grade >= 9){ //mentors
								$sql = "INSERT INTO mentors VALUES (" . $studentId . ")";
								$_SESSION['message'] = $sql . "<br>";
								if ($myconnection->query($sql) != TRUE) echo "Error: " . $sql . "<br>" . $myconnection->error . "<br>";
							}
						}
						else
							$_SESSION['message'] .= "Error: " . $sql . "<br>" . $myconnection->error . "<br>";
					}
				}
				else {
					$_SESSION['message'] .= "Parent account was not entered.<br>";
					header ("Location:create_student_form.php");
				}
			}
			else{
				$_SESSION['message'] .= "Parent account username and/or password is incorrect.<br>";
			}
			$myconnection->close();
			header ("Location:create_student_form.php");
			
		?>
		<br>
	</body>
</html>