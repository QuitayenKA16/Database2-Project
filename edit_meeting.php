<?php
	include "header.php";
	$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
	$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
	$_SESSION['message'] = "";

	$meet_id = $_SESSION['meet']['meet_id'];
	$name = $myconnection->real_escape_string($_POST['name']);
	$announcement = $myconnection->real_escape_string($_POST['announcement']);
	if ($announcement == "Blank")
		$announcement = "";
	$year = substr($_POST['week'], 0, 4);
	$week = substr($_POST['week'], -2, 2);
	$date = new DateTime();
	$date->setISODate($year,$week);
	$date = $date->format('yy-m-d');
	$date = strtotime($date);
	$time_slot_id = $myconnection->real_escape_string($_POST['time_slot_id']);
	
	$query = "SELECT day_of_the_week FROM time_slot WHERE time_slot_id = $time_slot_id";
	$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
	$day_of_the_week = (mysqli_fetch_array ($result, MYSQLI_ASSOC))['day_of_the_week'];
	$increment = ($day_of_the_week == "Saturday") ? "+5 day" : "+6 day";
	$date = strtotime($increment, $date);
	$date = date('yy-m-d', $date);
	
	$sql = "UPDATE meetings SET meet_name='$name', date='$date', time_slot_id=$time_slot_id, announcement='$announcement' WHERE meet_id=$meet_id";
		
	if ($myconnection->query($sql) != TRUE){
		$_SESSION['message'] .= "Error updating meeting.<br> Error: " . $sql . "<br>" . $myconnection->error . "<br>";
	}
	else {
		$_SESSION['message'] .= $sql . "<br>";
		$_SESSION['message'] .= "Successfully updated meeting: MID$meet_id";
		
		$query = "SELECT * FROM meetings m, time_slot t WHERE meet_id = $meet_id AND m.time_slot_id = t.time_slot_id";
		$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
		$_SESSION['meet'] = mysqli_fetch_assoc ($result);
	}
	
	$myconnection->close();
	header ("Location:edit_meeting_form.php");
?>