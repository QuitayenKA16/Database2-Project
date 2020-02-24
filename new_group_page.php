<html>
	<body>
		<?php
			include "header.php";
		
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

			$name = $_POST['name'];
			$desc = $_POST['description'];
			$gradeLvl = $_POST['grade'];
			$minMentor = $gradeLvl + 3;
			
			$sql = "INSERT INTO groups (name, description, gradeLvl, minMentorGrade) VALUES (?, ?, ?, ?)";
			$stmt = $myconnection->prepare($sql);
			$stmt->bind_param("ssii", $name, $desc, $gradeLvl, $minMentor);
					
			if ($stmt->execute() != TRUE){
				$_SESSION['error'] = "Error creating group.<br> Error: " . $sql . "<br>" . $myconnection->error;
				header ("Location:create_group_form.php");
			}
			else {
				echo "Successful group creation: <b>$_POST[name]</b><br>";
			}
			$myconnection->close();
		?>
		<br>
	</body>
</html>