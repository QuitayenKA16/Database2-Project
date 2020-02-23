<?php
	$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
	$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

	$query = "SELECT * FROM users WHERE username = '$_POST[loginUsername]' AND password = '$_POST[loginPassword]'";
	$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
	$count = mysqli_num_rows($result);
	
	if ($count == 1){
		session_start();
		$_SESSION['username'] = $_POST['loginUsername'];
		$_SESSION['password'] = $_POST['loginPassword'];
		
		$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
		$_SESSION['uid'] = $row['uid'];
		$_SESSION['firstName'] = $row['firstName'];
		$_SESSION['lastName'] = $row['lastName'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['phone'] = $row['phoneNum'];
		
		// student
		$query = "SELECT * FROM students WHERE uid = '$_SESSION[uid]'";
		$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
		
		if ($count == 1){
			$_SESSION['type'] = 1;
			$_SESSION['grade'] = $row['grade'];
		}
		else{
			//parent
			$query = "SELECT * FROM parents WHERE uid = '$_SESSION[uid]'";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$count = mysqli_num_rows($result);
			$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
			
			if ($count == 1)
				$_SESSION['type'] = 0;
			else
				$_SESSION['type'] = -1;
		}
		$_SESSION[back] = 'user_page.php';
		header ("Location:user_page.php");
	}
	else{
		session_start();
		$_SESSION['error'] = "Incorrect username and/or password.";
		header ("Location:login_form.php");
	}
	echo '<br>';
	mysqli_free_result($result);
	mysqli_close($myconnection);
?>