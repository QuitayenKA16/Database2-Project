<?php

	$myconnection = mysqli_connect('localhost', 'root', '') 
		or die ('Could not connect: ' . mysql_error());

	$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

	$query = "SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]'";
	$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
	$count = mysqli_num_rows($result);
	
	if ($count == 1){
		session_start();
		$inputtedUsername = $_POST['username'];
		$inputtedPassword = $_POST['password'];
		$_SESSION['username'] = $inputtedUsername;
		$_SESSION['password'] = $inputtedPassword;
		
		$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
		$_SESSION['uid'] = $row['uid'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['phone'] = $row['phoneNum'];
		
		header ("Location:user_page.php");
	}
	else{
		header ("Location:login_form.php");
	}
	echo '<br>';
	
	mysqli_free_result($result);

	mysqli_close($myconnection);

?>