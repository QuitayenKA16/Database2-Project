<html>
	<body>
		<?php
			include "header.php";
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			$_SESSION['message'] = "";
			
			$sql = "INSERT INTO material (title, author, type, url, assigned_date, notes)
				VALUES ('$_POST[title]', '$_POST[author]', '$_POST[type]', '$_POST[url]', '$_POST[date]', '$_POST[notes]')";
			$_SESSION['message'] = $sql . "<br>";

			
			if ($myconnection->query($sql) != TRUE){
				$_SESSION['message'] .= "Error: " . $sql . "<br>" . $myconnection->error . "<br>";
			}
			else {
				$_SESSION['message'] .= "Successful study material creation: <b>$_POST[title]</b><br>";
				$material_id = $myconnection->insert_id;
				$meet_id = $_SESSION['meet']['meet_id'];
				$sql = "INSERT INTO assign (meet_id, material_id) VALUES ($meet_id, $material_id)";

				if ($myconnection->query($sql) != TRUE){
					$_SESSION['message'] .= "Error: " . $sql . "<br>" . $myconnection->error . "<br>";
				}
				else{
					$_SESSION['message'] .= "Successful assignment to meeting: <b>$meet_id</b>";
				}
			}
			
			$myconnection->close();
			header ("Location:assign_material_form.php");
		?>
		<br>
	</body>
</html>