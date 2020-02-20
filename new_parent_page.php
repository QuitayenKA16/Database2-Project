<html>
	<style>

	</style>
	
	<body>
		<?php
			include "header.php";
		
			$myconnection = mysqli_connect('localhost', 'root', '') 
				or die ('Could not connect: ' . mysql_error());

			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

			$sql = "INSERT INTO users (name, email, phoneNum, username, password)
				VALUES ('$_POST[name]', '$_POST[email]', '$_POST[phoneNum]', '$_POST[username]', '$_POST[password]')";

			if ($myconnection->query($sql) != TRUE){
				$_SESSION['error'] = "Error creating student account.<br> Error: " . $sql . "<br>" . $myconnection->error;
				header ("Location:create_parent_form.php");
			}
			else {
			
				$query = "SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]'";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
				$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
				$parentId = $row['uid'];
				
				$sql = "INSERT INTO parents VALUES (?)";
				$stmt= $myconnection->prepare($sql);
				$stmt->bind_param("i", $parentId);
				
				if ($stmt->execute() === TRUE) {
					echo "Successful new parent creation: <b>$_POST[username]</b>";
				} else {
					echo "Error: " . $sql . "<br>" . $myconnection->error;
				}
			}
			$myconnection->close();
		?>

		<br>

	</body>
</html>