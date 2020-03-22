<?php
	include "header.php";
	$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
	$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
	$_SESSION['message'] = "";
	
	$meet_id = $_SESSION['meet']['meet_id'];
	$menteeCnt = mysqli_num_rows(mysqli_query($myconnection, "SELECT mentee_id from enroll WHERE meet_id = $meet_id"));
	$mentorCnt = mysqli_num_rows(mysqli_query($myconnection, "SELECT mentor_id from enroll2 WHERE meet_id = $meet_id"));
				
	if (isset($_POST['mentor_id'])){
		$mentor_id = substr($_POST['mentor_id'], 0, strlen($_POST['mentor_id'])-1);
		$isEnrolled = substr($_POST['mentor_id'], -1);
		
		if ($isEnrolled == "0"){
			if ($mentorCnt < 3){
				$sql = "INSERT INTO enroll2 (meet_id, mentor_id) VALUES ($meet_id, $mentor_id)";
				$_SESSION['message'] .= $sql . "<br>";
				if ($myconnection->query($sql) != TRUE){
					$_SESSION['message'] .= "Error: Could not enroll student.<br>" . $myconnection->error . "<br>";
				}
				else {
					$sql = "UPDATE meetings SET capacity = capacity + 1 WHERE meet_id = $meet_id";
					$_SESSION['message'] .= $sql . "<br>";
					if ($myconnection->query($sql) != TRUE){
						$_SESSION['message'] .= "Error: Could not edit capacity.<br>" . $myconnection->error . "<br>";
					}
				}
			}
			else {
				$_SESSION['message'] .= "Meeting $meet_id already has a max of 3 mentors enrolled.<br>";
			}
		}
		else {
			$sql = "DELETE FROM enroll2 WHERE meet_id = $meet_id AND mentor_id = $mentor_id";
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
	else if (isset($_POST['mentee_id'])){
		$mentee_id = substr($_POST['mentee_id'], 0, strlen($_POST['mentee_id'])-1);
		$isEnrolled = substr($_POST['mentee_id'], -1);
		
		if ($isEnrolled == "0"){
			if ($menteeCnt < 6){
				$sql = "INSERT INTO enroll (meet_id, mentee_id) VALUES ($meet_id, $mentee_id)";
				$_SESSION['message'] .= $sql . "<br>";
				if ($myconnection->query($sql) != TRUE){
					$_SESSION['message'] .= "Error: Could not enroll student.<br>" . $myconnection->error . "<br>";
				}
				else {
					$sql = "UPDATE meetings SET capacity = capacity + 1 WHERE meet_id = $meet_id";
					$_SESSION['message'] .= $sql . "<br>";
					if ($myconnection->query($sql) != TRUE){
						$_SESSION['message'] .= $myconnection->error . "<br>";
					}
				}
			}
			else {
				$_SESSION['message'] .= "Meeting $meet_id already has a max of 6 mentees enrolled.<br>";
			}
		}
		else {
			$sql = "DELETE FROM enroll WHERE meet_id = $meet_id AND mentee_id = $mentee_id";
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
	
	$myconnection->close();
	header ("Location:enroll_members_form.php");
?>