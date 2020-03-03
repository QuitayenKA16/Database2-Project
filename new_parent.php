<html>
	<body>
		<?php
			include "header.php";
		
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

			$sql = "INSERT INTO users (name, email, phone, password)
				VALUES ('$_POST[name]', '$_POST[email]', '$_POST[phone]', '$_POST[password]')";
			$_SESSION['message'] = $sql . "<br>";

			if ($myconnection->query($sql) != TRUE){
				$_SESSION['message'] .= "Error creating parent account.<br> Error: " . $sql . "<br>" . $myconnection->error . "<br>";
			}
			else {
			
				$query = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = '$_POST[password]'";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
				$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
				$parentId = $row['id'];
				
				$sql = "INSERT INTO parents VALUES (?)";
				$stmt = $myconnection->prepare($sql);
				$_SESSION['message'] .= $stmt . "<br>";
				$stmt->bind_param("i", $parentId);
				
				if ($stmt->execute() === TRUE) {
					$_SESSION['message'] .= "Successful new parent creation: <b>$_POST[name]</b>";
				} else {
					$_SESSION['message'] .= "Error: " . $sql . "<br>" . $myconnection->error . "<br>";
				}
			}
			$myconnection->close();
			header ("Location:create_parent_form.php");
		?>
		<br>
	</body>
</html>