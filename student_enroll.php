<?php
	include "header.php";
	$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
	$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
	$_SESSION['message'] = "";
	
	$uid = $_SESSION['edit_uid'];
	
	if (isset($_POST['mentee_meet_id'])){
		$meet_id = substr($_POST['mentee_meet_id'], 0, strlen($_POST['mentee_meet_id'])-1);
		$isEnrolled = substr($_POST['mentee_meet_id'], -1);
		
		if ($isEnrolled == "0"){
			$sql = "INSERT INTO enroll (meet_id, mentee_id) VALUES ($meet_id, $uid)";
			$_SESSION['message'] .= $sql . "<br>";
			if ($myconnection->query($sql) != TRUE){
				$_SESSION['message'] .= "Error: Could not enroll student.<br>" . $myconnection->error . "<br>";
			}
			else {
				$sql = "UPDATE meetings SET capacity = capacity + 1 WHERE meet_id = $meet_id";
				$_SESSION['message'] .= $sql . "<br>";
				if ($myconnection->query($sql) != TRUE){
					$_SESSION['message'] .= "Error: Could not edit capacity<br>" . $myconnection->error . "<br>";
				}
			}
		}
		else {
			$sql = "DELETE FROM enroll WHERE meet_id = $meet_id AND mentee_id = $uid";
			$_SESSION['message'] .= $sql . "<br>";
			if ($myconnection->query($sql) != TRUE){
				$_SESSION['message'] .= "Error: Could not remove student from meeting.<br>" . $myconnection->error . "<br>";
			}
			else {
				$sql = "UPDATE meetings SET capacity = capacity - 1 WHERE meet_id = $meet_id";
				$_SESSION['message'] .= $sql . "<br>";
				if ($myconnection->query($sql) != TRUE){
					$_SESSION['message'] .= $myconnection->error . "<br>";
				}
				$_SESSION['message'] .= "Successfully removed student from meeting.<br>";
			}
		}
	}
	
	else if (isset($_POST['mentor_meet_id'])){
		$meet_id = substr($_POST['mentor_meet_id'], 0, strlen($_POST['mentor_meet_id'])-1);
		$isEnrolled = substr($_POST['mentor_meet_id'], -1);
		
		if ($isEnrolled == "0"){
			$sql = "INSERT INTO enroll2 (meet_id, mentor_id) VALUES ($meet_id, $uid)";
			$_SESSION['message'] .= $sql . "<br>";
			if ($myconnection->query($sql) != TRUE){
				$_SESSION['message'] .= "Error: Could not enroll student.<br>" . $myconnection->error . "<br>";
			}
			else {
				$sql = "UPDATE meetings SET capacity = capacity + 1 WHERE meet_id = $meet_id";
				$_SESSION['message'] .= $sql . "<br>";
				if ($myconnection->query($sql) != TRUE){
					$_SESSION['message'] .= "Error: Could not edit capacity<br>" . $myconnection->error . "<br>";
				}
			}
		}
		else {
			$sql = "DELETE FROM enroll2 WHERE meet_id = $meet_id AND mentor_id = $uid";
			$_SESSION['message'] .= $sql . "<br>";
			if ($myconnection->query($sql) != TRUE){
				$_SESSION['message'] .= "Error: Could not remove student from meeting.<br>" . $myconnection->error . "<br>";
			}
			else {
				$sql = "UPDATE meetings SET capacity = capacity - 1 WHERE meet_id = $meet_id";
				$_SESSION['message'] .= $sql . "<br>";
				if ($myconnection->query($sql) != TRUE){
					$_SESSION['message'] .= $myconnection->error . "<br>";
				}
				$_SESSION['message'] .= "Successfully removed student from meeting.<br>";
			}
		}
	}
	
	else if (isset($_POST['mentee_all'])){
		$group_id = substr($_POST['mentee_all'], 0, strlen($_POST['mentee_all'])-2);
		$isEnrolled = substr($_POST['mentee_all'], -1);
		
		if ($isEnrolled == "0"){
			$query = "SELECT * FROM meetings WHERE group_id = $group_id";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
				$meet_id = $row['meet_id'];
				$sql = "INSERT INTO enroll (meet_id, mentee_id) VALUES ($meet_id, $uid)";
				if ($myconnection->query($sql) != TRUE){
					if(strpos($myconnection->error, "Duplicate") != false)
						$_SESSION['message'] .= $myconnection->error . "<br>";
				}
				else {
					$_SESSION['message'] .= $sql . "<br>";
					$sql = "UPDATE meetings SET capacity = capacity + 1 WHERE meet_id = $meet_id";
					if ($myconnection->query($sql) != TRUE){
						$_SESSION['message'] .= "Error: Could not edit capacity<br>" . $myconnection->error . "<br>";
					}
				}
			}
		}
		else {
			$query = "SELECT * FROM meetings WHERE group_id = $group_id";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
				$meet_id = $row['meet_id'];
				$query = "SELECT * FROM enroll WHERE meet_id = $meet_id AND mentee_id = $uid";
				$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				if (mysqli_num_rows($result2) == 1){
					$sql = "DELETE FROM enroll WHERE meet_id = $meet_id AND mentee_id = $uid";
					if ($myconnection->query($sql) != TRUE){
							$_SESSION['message'] .= $myconnection->error . "<br>";
					}
					else {
						$_SESSION['message'] .= $sql . "<br>";
						$sql = "UPDATE meetings SET capacity = capacity - 1 WHERE meet_id = $meet_id";
						if ($myconnection->query($sql) != TRUE){
							$_SESSION['message'] .= "Error: Could not edit capacity<br>" . $myconnection->error . "<br>";
						}
					}
				}
			}
		}
	}
	
	else if (isset($_POST['mentor_all'])){
		$group_id = substr($_POST['mentor_all'], 0, strlen($_POST['mentor_all'])-2);
		$isEnrolled = substr($_POST['mentor_all'], -1);
		
		if ($isEnrolled == "0"){
			$query = "SELECT * FROM meetings WHERE group_id = $group_id";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
				$meet_id = $row['meet_id'];
				$sql = "INSERT INTO enroll2 (meet_id, mentor_id) VALUES ($meet_id, $uid)";
				if ($myconnection->query($sql) != TRUE){
					if(strpos($myconnection->error, "Duplicate") != false)
						$_SESSION['message'] .= $myconnection->error . "<br>";
				}
				else {
					$_SESSION['message'] .= $sql . "<br>";
					$sql = "UPDATE meetings SET capacity = capacity + 1 WHERE meet_id = $meet_id";
					if ($myconnection->query($sql) != TRUE){
						$_SESSION['message'] .= "Error: Could not edit capacity<br>" . $myconnection->error . "<br>";
					}
				}
			}
		}
		else {
			$query = "SELECT * FROM meetings WHERE group_id = $group_id";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
				$meet_id = $row['meet_id'];
				$query = "SELECT * FROM enroll2 WHERE meet_id = $meet_id AND mentor_id = $uid";
				$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				if (mysqli_num_rows($result2) == 1){
					$sql = "DELETE FROM enroll2 WHERE meet_id = $meet_id AND mentor_id = $uid";
					if ($myconnection->query($sql) != TRUE){
							$_SESSION['message'] .= $myconnection->error . "<br>";
					}
					else {
						$_SESSION['message'] .= $sql . "<br>";
						$sql = "UPDATE meetings SET capacity = capacity - 1 WHERE meet_id = $meet_id";
						if ($myconnection->query($sql) != TRUE){
							$_SESSION['message'] .= "Error: Could not edit capacity<br>" . $myconnection->error . "<br>";
						}
					}
				}
			}
		}
	}

	$myconnection->close();
	header ("Location:student_enroll_form.php");
?>