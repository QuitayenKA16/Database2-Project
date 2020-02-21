<html>
	<body>
		<?php
			include "header.php";
		
			$myconnection = mysqli_connect('localhost', 'root', '') 
				or die ('Could not connect: ' . mysql_error());

			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

			$sql = "INSERT INTO users (firstName, lastName, email, phoneNum, username, password)
				VALUES ('$_POST[firstName]', '$_POST[lastName]', '$_POST[email]', '$_POST[phoneNum]', '$_POST[username]', '$_POST[password]')";

			if ($myconnection->query($sql) != TRUE){
				$_SESSION['error'] = "Error creating admin account.<br> Error: " . $sql . "<br>" . $myconnection->error;
				header ("Location:create_admin_form.php");
			}
			else {
			
				$query = "SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]'";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
				$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
				$uid = $row['uid'];
				
				$sql = "INSERT INTO admins VALUES (?)";
				$stmt = $myconnection->prepare($sql);
				$stmt->bind_param("i", $uid);
				
				if ($stmt->execute() === TRUE) {
					echo "Successful new admin creation: <b>$_POST[username]</b>";
				} else {
					echo "Error: " . $sql . "<br>" . $myconnection->error;
				}
			}
			$myconnection->close();
		?>

		<br>

	</body>
</html>