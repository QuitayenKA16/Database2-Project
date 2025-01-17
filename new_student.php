<?php
	include "header.php";
	$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
	$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
	
	$name = $_SESSION['loggedUser']['name'];
	$email = $_SESSION['loggedUser']['email'];
	$password = $_SESSION['loggedUser']['password'];
	$_SESSION['message'] = "";
	
	$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
	$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());

	if (mysqli_num_rows($result) == 1){
		$parentId = (mysqli_fetch_array ($result, MYSQLI_ASSOC))['id'];
		$sql = "SELECT * FROM parents WHERE parent_id = " . $parentId;
		$result = mysqli_query($myconnection, $sql) or die ('Query failed: ' . mysql_error());
		
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['message'] .= "Successful parent selection: <b>$name</b><br><br>";
			
			$studentName = $myconnection->real_escape_string($_POST['name']);
			$studentEmail = $myconnection->real_escape_string($_POST['email']);
			$studentPhone = $myconnection->real_escape_string($_POST['phone']);
			$studentPassword = $myconnection->real_escape_string($_POST['password']);
		
			$sql = "INSERT INTO users (name, email, phone, password) VALUES ('$studentName', '$studentEmail', '$studentPhone', '$studentPassword')";
			if ($myconnection->query($sql) != TRUE){
				$_SESSION['message'] .= "Error creating student account.<br>Error: " . $sql . "<br>" . $myconnection->error . "<br>";
			}
			else{
				$studentId = $myconnection->insert_id;
				$grade = $myconnection->real_escape_string($_POST['grade']);
		
				$sql = "INSERT INTO students VALUES (" . $studentId . "," . $grade . "," . $parentId . ")";
				if ($myconnection->query($sql) === TRUE){
					$_SESSION['message'] .= "Successful new student creation: <b>$studentName</b><br>";
					if ($grade <= 9){ //mentees
						$sql = "INSERT INTO mentees VALUES (" . $studentId . ")";
						if ($myconnection->query($sql) != TRUE)
							$_SESSION['message'] .= "Error: " . $sql . "<br>" . $myconnection->error . "<br>";
					}
					if ($grade >= 9){ //mentors
						$sql = "INSERT INTO mentors VALUES (" . $studentId . ")";
						if ($myconnection->query($sql) != TRUE)
							$_SESSION['message'] .= "Error: " . $sql . "<br>" . $myconnection->error . "<br>";
					}
				}
				else
					$_SESSION['message'] .= "Error: " . $sql . "<br>" . $myconnection->error . "<br>";
			}
		}
		else {
			$_SESSION['message'] .= "Error: Parent account was not entered.<br>";
		}
	}
	else{
		$_SESSION['message'] .= "Error: Parent account username and/or password is incorrect.<br>";
	}
	$myconnection->close();
	header ("Location:create_student_form.php");
?>