<?php
	include "header.php";
	$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
	$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
	$_SESSION['message'] = "";

	$group_id = $_SESSION['group']['group_id'];
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
	
	$duplicateMeetings = mysqli_num_rows(mysqli_query($myconnection, "SELECT meet_id FROM meetings WHERE date = '$date' AND time_slot_id = $time_slot_id AND group_id = $group_id"));
	
	if ($duplicateMeetings == 0){
		$query = "INSERT INTO meetings (meet_name, date, time_slot_id, capacity, announcement, group_id)
				VALUES ('$name', '$date', $time_slot_id, 0, '$announcement', $group_id)";
		$_SESSION['message'] .= $query . "<br>";
		
		if ($myconnection->query($query) != TRUE){
			$_SESSION['message'] .= "Error creating meeting.<br> Error: " . $query . "<br>" . $myconnection->error . "<br>";
		}
		else {
			$_SESSION['message'] .= "Successful creation of meeting: $name";
		}
	}
	else {
		$_SESSION['message'] .= "Error: Duplicate date and time-slot for GID$group_id<br>";
	}
	
	$myconnection->close();
	header ("Location:create_meeting_form.php");
?>