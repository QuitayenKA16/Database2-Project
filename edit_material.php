<?php
	include "header.php";
	$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
	$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
	$_SESSION['message'] = "";
	
	$material_id = $_SESSION['edit_mat_id'];
	$title = $myconnection->real_escape_string($_POST['title']);
	$author = $myconnection->real_escape_string($_POST['author']);
	$type = $myconnection->real_escape_string($_POST['type']);
	$url = $myconnection->real_escape_string($_POST['url']);
	$assigned_date = $myconnection->real_escape_string($_POST['date']);
	$notes = $myconnection->real_escape_string($_POST['notes']);
	
	$sql = "UPDATE material SET title='$title', author='$author', type='$type', url='$url', assigned_date='$assigned_date', notes='$notes' WHERE material_id=$material_id";

	if ($myconnection->query($sql) != TRUE){
		$_SESSION['message'] .= "Error updating study material.<br> Error: " . $sql . "<br>" . $myconnection->error . "<br>";
	}
	else {
		$_SESSION['message'] .= $sql . "<br>";
		$_SESSION['message'] .= "Successfully updated study_material: ID$material_id";
	}
	
	$myconnection->close();
	header ("Location:edit_material_form.php");
?>