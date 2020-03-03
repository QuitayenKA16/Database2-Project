<html>
	<body>
		<?php
			include "header.php";
		
			$myconnection = mysqli_connect('localhost', 'root', '') 
				or die ('Could not connect: ' . mysql_error());

			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

			$sql = "INSERT INTO users (name, email, phone, password)
				VALUES ('$_POST[name]', '$_POST[email]', '$_POST[phone]', '$_POST[password]')";
			$_SESSION['message'] = $sql . "<br>";
			
			if ($myconnection->query($sql) != TRUE){
				$_SESSION['message'] .= "Error creating admin account.<br> Error: " . $sql . "<br>" . $myconnection->error . "<br>";
			}
			else {
				$query = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = '$_POST[password]'";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
				$id = $row['id'];
				
				$sql = "INSERT INTO admins VALUES (?)";
				$stmt = $myconnection->prepare($sql);
				$stmt->bind_param("i", $id);
				
				if ($stmt->execute() === TRUE) {
					$_SESSION['message'] .= "Successful new admin creation: <b>$_POST[name]</b><br>";
				}
				else {
					$_SESSION['message'] .= "Error: " . $sql . "<br>" . $myconnection->error . "<br>";
				}
			}
			$myconnection->close();
			header ("Location:create_admin_form.php");
		?>
		<br>
	</body>
</html>