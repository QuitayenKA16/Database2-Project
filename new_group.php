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
			
			$sql = "INSERT INTO groups (name, description, mentee_grade_req, mentor_grade_req) VALUES (?, ?, ?, ?)";
			$stmt = $myconnection->prepare($sql);
			$stmt->bind_param("ssii", $name, $desc, $gradeLvl, $minMentor);
					
			if ($stmt->execute() != TRUE){
				$_SESSION['message'] = "Error creating group.<br> Error: " . $sql . "<br>" . $myconnection->error . "<br>";
			}
			else {
				$_SESSION['message'] = "Successful group creation: <b>$_POST[name]</b><br>";
			}
			$myconnection->close();
			header ("Location:create_group_form.php");
		?>
		<br>
	</body>
</html>