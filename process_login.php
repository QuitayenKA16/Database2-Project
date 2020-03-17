<?php
	$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
	$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

	$query = "SELECT * FROM users WHERE email = '$_POST[loginEmail]' AND password = '$_POST[loginPassword]'";
	$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
	
	if (mysqli_num_rows($result) == 1){
		session_start();
		$_SESSION['loggedUser'] = mysqli_fetch_array ($result, MYSQLI_ASSOC);
		$id = $_SESSION['loggedUser']['id'];
		
		// student
		$query = "SELECT * FROM students WHERE student_id = $id";
		$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
		
		if (mysqli_num_rows($result) == 1){
			$_SESSION['type'] = 1;
			$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
			$_SESSION['grade'] = $row['grade'];
		}
		else{
			//parent
			$query = "SELECT * FROM parents WHERE parent_id = $id";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			
			if (mysqli_num_rows($result) == 1)
				$_SESSION['type'] = 0;
			else
				$_SESSION['type'] = -1;
		}
		$_SESSION['back'] = 'user_page.php';
		header ("Location:user_page.php");
	}
	else{
		session_start();
		$_SESSION['message'] = "Incorrect email and/or password.";
		header ("Location:login_form.php");
	}

	mysqli_free_result($result);
	mysqli_close($myconnection);
?>