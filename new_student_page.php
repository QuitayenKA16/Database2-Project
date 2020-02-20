<html>
	<style>

	</style>
	
	<body>
		<?php
			include "header.php";
		
			$myconnection = mysqli_connect('localhost', 'root', '') 
				or die ('Could not connect: ' . mysql_error());

			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

			$query = "SELECT * FROM users WHERE username = '$_POST[loginUsername]' AND password = '$_POST[loginPassword]'";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$count = mysqli_num_rows($result);
	
			if ($count == 1){
				$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
				$parentId = $row['uid'];
				
				$sql = "INSERT INTO users (name, email, phoneNum, username, password)
					VALUES ('$_POST[name]', '$_POST[email]', '$_POST[phoneNum]', '$_POST[username]', '$_POST[password]')";

				if ($myconnection->query($sql) != TRUE){
					$_SESSION['error'] = "<br>Error creating student account.<br>Error: " . $sql . "<br>" . $myconnection->error;
					header ("Location:create_student_form.php");
				}
				else{
					echo "Successful parent selection: <b>$_POST[loginUsername]</b><br>";
					
					$query = "SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]'";
					$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					$count = mysqli_num_rows($result);
					$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
					$studentId = $row['uid'];
					$grade = $_POST['grade'];
			
					$sql = "INSERT INTO students VALUES (?, ?, ?)";
					$stmt= $myconnection->prepare($sql);
					$stmt->bind_param("iii", $studentId, $parentId, $grade);
			
					if ($stmt->execute() === TRUE) {
						echo "Successful new student creation: <b>$_POST[username]</b>";
					} else {
						echo "Error: " . $sql . "<br>" . $myconnection->error;
					}
				}
			}
			else{
				$_SESSION['error'] = "Parent account either does not exist or username and/or password is incorrect.";
				header ("Location:create_student_form.php");
			}
			$myconnection->close();
		?>

		<br>

	</body>
</html>