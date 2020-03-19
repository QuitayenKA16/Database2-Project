<?php
	include "header.php";
	$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
	$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
	$_SESSION['message'] = "";

	$group_id = $_SESSION['group']['group_id'];
	$name = $myconnection->real_escape_string($_POST['name']);
	$announcement = $myconnection->real_escape_string($_POST['announcement']);
	$time_slot_id = $myconnection->real_escape_string($_POST['time_slot_id']);
	
	$query = "SELECT day_of_the_week FROM time_slot WHERE time_slot_id = $time_slot_id";
	$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
	$day_of_the_week = (mysqli_fetch_array ($result, MYSQLI_ASSOC))['day_of_the_week'];
	$increment = ($day_of_the_week == "Saturday") ? "+5 day" : "+6 day";
	
	$start_year = substr($_POST['start_week'], 0, 4);
	$start_week_num = substr($_POST['start_week'], -2, 2);
	$start_date = new DateTime();
	$start_date->setISODate($start_year,$start_week_num);
	$start_date = $start_date->format('yy-m-d');
	$start_date = strtotime($start_date);
	$start_date = strtotime($increment, $start_date);
	
	$end_year = substr($_POST['end_week'], 0, 4);
	$end_week_num = substr($_POST['end_week'], -2, 2);
	$end_date = new DateTime();
	$end_date->setISODate($end_year,$end_week_num);
	$end_date = $end_date->format('yy-m-d');
	$end_date = strtotime($end_date);
	$end_date = strtotime($increment, $end_date);
	$end_date = date('yy-m-d', $end_date);
	
	$date = $start_date;
	$dateStr = date('yy-m-d', $date);
	$count = 1;
	$error = 0;
	
	while ($date <= strtotime($end_date)){
		$dateStr = date('yy-m-d', $date);
		$meet_name = $name . " #" . $count;
		$sql = "INSERT INTO meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) VALUES ('$meet_name', '$dateStr', $time_slot_id, 0, '$announcement', $group_id)";
		$_SESSION['message'] .= "INSERT INTO meetings VALUES ('$meet_name', '$dateStr', $time_slot_id, 0, '$announcement', $group_id)<br>";
		
		if ($myconnection->query($sql) != TRUE){
			$_SESSION['message'] .= "Error: " . $sql . "<br>" . $myconnection->error . "<br><br>";
			$error = 1;
		}
			
		$date = strtotime("+7 day", $date);
		$count += 1;
	}
	if ($error == 0)
		$_SESSION['message'] .= "<br>Successful creation of meetings.<br>";
	else
		$_SESSION['message'] .= "<br>There were errors during creation of meetings.<br>";
	
	$myconnection->close();
	header ("Location:create_meetings_form.php");
?>