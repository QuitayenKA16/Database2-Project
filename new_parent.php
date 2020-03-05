<html>
	<body>
		<?php
			include "header.php";
		
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

			$sql = "INSERT INTO users (name, email, phone, password)
				VALUES ('$_POST[name]', '$_POST[email]', '$_POST[phone]', '$_POST[password]')";
			$_SESSION['message'] = "";

			if ($myconnection->query($sql) != TRUE){
				$_SESSION['message'] .= "Error: " . $sql . "<br>" . $myconnection->error . "<br>";
			}
			else {
				$parentId = $myconnection->insert_id;
				$sql = "INSERT INTO parents VALUES ($parentId)";				
				if ($myconnection->query($sql) == TRUE){
					$_SESSION['message'] .= "Successful new parent creation: <b>$_POST[name]</b>";
				} else {
					$_SESSION['message'] .= "Error: " . $myconnection->error . "<br>";
				}
			}
			$myconnection->close();
			header ("Location:create_parent_form.php");
		?>
		<br>
	</body>
</html>