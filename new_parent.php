<?php
	include "header.php";
	$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
	$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');

	$name = $myconnection->real_escape_string($_POST['name']);
	$email = $myconnection->real_escape_string($_POST['email']);
	$phone = $myconnection->real_escape_string($_POST['phone']);
	$password = $myconnection->real_escape_string($_POST['password']);
	$sql = "INSERT INTO users (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";
	$_SESSION['message'] = "";

	if ($myconnection->query($sql) != TRUE){
		$_SESSION['message'] .= "Error: " . $sql . "<br>" . $myconnection->error . "<br>";
	}
	else {
		$parentId = $myconnection->insert_id;
		$sql = "INSERT INTO parents VALUES ($parentId)";				
		if ($myconnection->query($sql) == TRUE){
			$_SESSION['message'] .= "Successful new parent creation: <b>$name</b>";
		} else {
			$_SESSION['message'] .= "Error: " . $myconnection->error . "<br>";
		}
	}
	$myconnection->close();
	header ("Location:create_parent_form.php");
?>