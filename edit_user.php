<html>
	<body>
		<?php
			include "header.php";
			
			$id = $_SESSION['edit_uid'];
			if ($id == $_SESSION['loggedUser']['id'])
				echo "<br><a href='$_SESSION[path]user_page.php'>Back</a><br><br>";
			else if ($_SESSION['type'] == -1) //admin
				echo "<br><a href='$_SESSION[path]view_users_page.php'>Back</a><br><br>";
			else if ($_SESSION['type'] == 0) //parent
				echo "<br><a href='$_SESSION[path]view_children_page.php'>Back</a><br><br>";	
				
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			
			if (isset($_POST['delete'])){
				$sql = "DELETE FROM users WHERE id = $id";
				echo $sql . "<br>";
	
				if ($myconnection->query($sql) === TRUE)
					echo "Successful deleting user: <b>UID" . $_SESSION['edit_uid'] . "</b><br>";
			}
			else {
				$name = $myconnection->real_escape_string($_POST['name']);
				$phone = $myconnection->real_escape_string($_POST['phone']);
				if (isset($_POST['password'])){
					$password = $myconnection->real_escape_string($_POST['password']);
					"UPDATE users SET name='$name', phone='$phone', password='$password' WHERE id=$id";
				}
				else {
					"UPDATE users SET name='$name', phone='$phone' WHERE id=$id";
				}
				echo $sql . "<br>";
	
				if ($myconnection->query($sql) === TRUE) {
					echo "Record updated successfully";
					if ($id = $_SESSION['loggedUser']['id']){
						$email = $_SESSION['loggedUser']['email'];
						$password = (isset($_POST['password'])) ? $_POST['password'] : $_SESSION['loggedUser']['password'];
						$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
						$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
						if (mysqli_num_rows($result) == 1)
							$_SESSION['loggedUser'] = mysqli_fetch_array ($result, MYSQLI_ASSOC);
					}
				}
				else {
					$_SESSION['message'] = "Error updating record: " . $myconnection->error;
					echo $_SESSION['message'];
					header ("Location:edit_user_form.php");
				}
			}
			$myconnection->close();
		?>
	</body>
</html>