<html>
	<body>
		<?php
			include "header.php";
		
			$myconnection = mysqli_connect('localhost', 'root', '') 
				or die ('Could not connect: ' . mysql_error());

			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

			$sql = "INSERT INTO users (name, email, phone, password)
				VALUES ('$_POST[name]', '$_POST[email]', '$_POST[phone]', '$_POST[password]')";

			if ($myconnection->query($sql) != TRUE){
				$_SESSION['error'] = "Error creating admin account.<br> Error: " . $sql . "<br>" . $myconnection->error;
				header ("Location:create_admin_form.php");
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
					echo "Successful new admin creation: <b>$_POST[name]</b>";
				} else {
					echo "Error: " . $sql . "<br>" . $myconnection->error;
				}
			}
			$myconnection->close();
		?>
		<br>
	</body>
</html>