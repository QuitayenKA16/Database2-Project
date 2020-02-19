<html>
	<style>

	</style>
	
	<body>
		<?php
			include "header.php";
		?>
		
		<?php
			$myconnection = mysqli_connect('localhost', 'root', '') 
				or die ('Could not connect: ' . mysql_error());

			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

			$sql = "INSERT INTO users (name, email, phoneNum, username, password)
				VALUES ('$_POST[name]', '$_POST[email]', '$_POST[phoneNum]', '$_POST[username]', '$_POST[password]')";

			if ($myconnection->query($sql) === TRUE) {
				echo "New user created successfully.";
			} else {
				echo "Error: " . $sql . "<br>" . $myconnection->error;
			}
			$myconnection->close();
		?>

		<br></br>

	</body>
</html>