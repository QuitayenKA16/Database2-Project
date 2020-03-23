<?php
	include "header.php";
	$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . $myconnection->error);
	$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
	$_SESSION['message'] = "";
	
	$uid = $_SESSION['edit_uid'];
	
	if (isset($_POST['mentee_meet_id'])){
		$meet_id = substr($_POST['mentee_meet_id'], 0, strlen($_POST['mentee_meet_id'])-1);
		$menteeCnt = mysqli_num_rows(mysqli_query($myconnection, "SELECT mentee_id from enroll WHERE meet_id = $meet_id"));
		$isEnrolled = substr($_POST['mentee_meet_id'], -1);
		$_SESSION['message'] .= "<b>MID$meet_id</b>: ";
		
		if ($isEnrolled == "0"){
			if ($menteeCnt < 6){
				$sql = "INSERT INTO enroll (meet_id, mentee_id) VALUES ($meet_id, $uid)";
				if ($myconnection->query($sql) != TRUE){
					$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> " . $myconnection->error . "<br>";
				}
				else {
					$_SESSION['message'] .= "<span style='color:green'>SUCCESS</span> Successful student enrollment.<br>";
					$sql = "UPDATE meetings SET capacity = capacity + 1 WHERE meet_id = $meet_id";
					if ($myconnection->query($sql) != TRUE){
						$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> " . $myconnection->error . "<br>";
					}
				}
			}
			else {
				$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> Meeting $meet_id already has a max of 6 mentees enrolled.<br>";
			}
		}
		else {
			$sql = "DELETE FROM enroll WHERE meet_id = $meet_id AND mentee_id = $uid";
			if ($myconnection->query($sql) != TRUE){
				$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> " . $myconnection->error . "<br>";
			}
			else {
				$sql = "UPDATE meetings SET capacity = capacity - 1 WHERE meet_id = $meet_id";
				if ($myconnection->query($sql) != TRUE){
					$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> " . $myconnection->error . "<br>";
				}
				$_SESSION['message'] .= "<span style='color:green'>SUCCESS</span> Successfully removed student from meeting.<br>";
			}
		}
	}
	
	else if (isset($_POST['mentor_meet_id'])){
		$meet_id = substr($_POST['mentor_meet_id'], 0, strlen($_POST['mentor_meet_id'])-1);
		$query = "SELECT * FROM meetings m, time_slot t WHERE meet_id = $meet_id AND m.time_slot_id=t.time_slot_id";
		$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . $myconnection->error);
		$_SESSION['meet'] = mysqli_fetch_assoc ($result);
		$date = $_SESSION['meet']['date'];
		$announcement = $_SESSION['meet']['announcement'];
		$date2 = (date('N', $date) == 6) ? date('yy-m-d', strtotime($date . ' +1 days')) : date('yy-m-d', strtotime($date . ' -1 days'));
		$time_slot = $_SESSION['meet']['time_slot_id'];
		$start_time =  $_SESSION['meet']['start_time'];
		$end_time =  $_SESSION['meet']['end_time'];
		$isEnrolled = substr($_POST['mentor_meet_id'], -1);
		
		if ($isEnrolled == "0"){
		$_SESSION['message'] .= "<b>MID$meet_id</b>: ";
		$mentorCnt = mysqli_num_rows(mysqli_query($myconnection, "SELECT mentor_id from enroll2 WHERE meet_id = $meet_id"));
			if ($mentorCnt < 3){
				$sameDayTimeMeetings = mysqli_num_rows(mysqli_query($myconnection, 
						"SELECT DISTINCT * FROM enroll2 e, meetings m WHERE e.meet_id=m.meet_id AND m.date='$date' AND m.time_slot_id=$time_slot AND e.mentor_id=$uid"));
				$mentoringSameSubject = mysqli_num_rows(mysqli_query($myconnection, 
						"SELECT DISTINCT * FROM enroll2 e, meetings m WHERE e.meet_id=m.meet_id AND m.date='$date' AND m.announcement='$announcement' AND e.mentor_id=$uid"));
				$mentoringSameSubject += mysqli_num_rows(mysqli_query($myconnection, 
						"SELECT DISTINCT * FROM enroll2 e, meetings m WHERE e.meet_id=m.meet_id AND m.date='$date2' AND m.announcement='$announcement' AND e.mentor_id=$uid"));
						
				if ($sameDayTimeMeetings == 0 && $mentoringSameSubject == 0){
					$sql = "INSERT INTO enroll2 (meet_id, mentor_id) VALUES ($meet_id, $uid)";
					if ($myconnection->query($sql) != TRUE){
						$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> " . $myconnection->error . "<br>";
					}
					else {
						$_SESSION['message'] .= "<span style='color:green'>SUCCESS</span> Successful student enrollment.<br>";
						$sql = "UPDATE meetings SET capacity = capacity + 1 WHERE meet_id = $meet_id";
						if ($myconnection->query($sql) != TRUE){
							$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> " . $myconnection->error . "<br>";
						}
					}
				}
				else{
					if ($sameDayTimeMeetings != 0)
						$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> Student already enrolled in meeting during same date and time-slot.<br>";
					if ($mentoringSameSubject != 0)
						$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> Student already mentoring meeting of same subject that weekend.<br>";
				}
			}
			else {
					$_SESSION['message'] .= "<span style='color:red'>FAILURE</span>Meeting already has a max of 3 mentors enrolled.<br>";
			}
		}
		else {
			$sql = "DELETE FROM enroll2 WHERE meet_id = $meet_id AND mentor_id = $uid";
			if ($myconnection->query($sql) != TRUE){
				$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> " . $myconnection->error . "<br>";
			}
			else {
				$sql = "UPDATE meetings SET capacity = capacity - 1 WHERE meet_id = $meet_id";
				if ($myconnection->query($sql) != TRUE){
					$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> " . $myconnection->error . "<br>";
				}
				$_SESSION['message'] .= "<span style='color:green'>SUCCESS</span> Successfully removed student from meeting.<br>";
			}
		}
	}
	
	else if (isset($_POST['mentee_all'])){
		$group_id = substr($_POST['mentee_all'], 0, strlen($_POST['mentee_all'])-2);
		$isEnrolled = substr($_POST['mentee_all'], -1);
		
		if ($isEnrolled == "0"){
			$query = "SELECT * FROM meetings WHERE group_id = $group_id";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . $myconnection->error);
			while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
				$meet_id = $row['meet_id'];
				$_SESSION['message'] .= "<b>MID$meet_id</b>: ";
				$menteeCnt = mysqli_num_rows(mysqli_query($myconnection, "SELECT mentee_id from enroll WHERE meet_id = $meet_id"));
				if ($menteeCnt < 6){
					$sql = "INSERT INTO enroll (meet_id, mentee_id) VALUES ($meet_id, $uid)";
					if ($myconnection->query($sql) != TRUE){
						if(strpos($myconnection->error, "Duplicate") != false)
							$_SESSION['message'] .= $myconnection->error . "<br>";
						else
							$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> Student already enrolled in meeting.<br>";
					}
					else {
						$_SESSION['message'] .= "<span style='color:green'>SUCCESS</span> Successful student enrollment.<br>";
						$sql = "UPDATE meetings SET capacity = capacity + 1 WHERE meet_id = $meet_id";
						if ($myconnection->query($sql) != TRUE){
							$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> " . $myconnection->error . "<br>";
						}
					}
				}
				else {
					$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> Meeting already has a max of 6 mentees enrolled.<br>";
				}
			}
		}
		else {
			$query = "SELECT * FROM meetings WHERE group_id = $group_id";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . $myconnection->error);
			while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
				$meet_id = $row['meet_id'];
				$query = "SELECT * FROM enroll WHERE meet_id = $meet_id AND mentee_id = $uid";
				$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . $myconnection->error);
				if (mysqli_num_rows($result2) == 1){
					$sql = "DELETE FROM enroll WHERE meet_id = $meet_id AND mentee_id = $uid";
					if ($myconnection->query($sql) != TRUE){
							$_SESSION['message'] .= $myconnection->error . "<br>";
					}
					else {
						$_SESSION['message'] .= "<b>MID$meet_id</b>: <span style='color:green'>SUCCESS</span> Successfully removed student from meeting.<br>";
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
			$query = "SELECT * FROM meetings WHERE group_id = $group_id AND date > CURDATE()";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . $myconnection->error);
			while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
				$meet_id = $row['meet_id'];
				$date = $row['date'];
				$announcement = $row['announcement'];
				$date2 = (date('N', $date) == 6) ? date('yy-m-d', strtotime($date . ' +1 days')) : date('yy-m-d', strtotime($date . ' -1 days'));
				$time_slot = $row['time_slot_id'];
				$start_time =  $row['start_time'];
				$end_time =  $row['end_time'];
				$mentorCnt = mysqli_num_rows(mysqli_query($myconnection, "SELECT mentor_id from enroll2 WHERE meet_id = $meet_id"));
				$_SESSION['message'] .= "<b>MID$meet_id</b>: ";
				
				if ($mentorCnt < 3){
				$sameDayTimeMeetings = mysqli_num_rows(mysqli_query($myconnection, 
						"SELECT DISTINCT * FROM enroll2 e, meetings m WHERE e.meet_id=m.meet_id AND m.date='$date' AND m.time_slot_id=$time_slot AND e.mentor_id=$uid"));
				$mentoringSameSubject = mysqli_num_rows(mysqli_query($myconnection, 
						"SELECT DISTINCT * FROM enroll2 e, meetings m WHERE e.meet_id=m.meet_id AND m.date='$date' AND m.announcement='$announcement' AND e.mentor_id=$uid"));
				$mentoringSameSubject += mysqli_num_rows(mysqli_query($myconnection, 
						"SELECT DISTINCT * FROM enroll2 e, meetings m WHERE e.meet_id=m.meet_id AND m.date='$date2' AND m.announcement='$announcement' AND e.mentor_id=$uid"));
						
					if ($sameDayTimeMeetings == 0 && $mentoringSameSubject == 0){
						$sql = "INSERT INTO enroll2 (meet_id, mentor_id) VALUES ($meet_id, $uid)";
						if ($myconnection->query($sql) != TRUE){
							$_SESSION['message'] .= "Error: Could not enroll student.<br>" . $myconnection->error . "<br>";
						}
						else {
							$_SESSION['message'] .= "<span style='color:green'>SUCCESS</span> Successful student enrollment.<br>";
							$sql = "UPDATE meetings SET capacity = capacity + 1 WHERE meet_id = $meet_id";
							if ($myconnection->query($sql) != TRUE){
								$_SESSION['message'] .= "Error: Could not edit capacity<br>" . $myconnection->error . "<br>";
							}
						}
					}
					else{
						if ($sameDayTimeMeetings != 0)
							$_SESSION['message'] .= "<span style='color:red'>FAIL</span> Student already enrolled in meeting during same date and time-slot.<br>";
						else if ($mentoringSameSubject != 0)
							$_SESSION['message'] .= "<span style='color:red'>FAIL</span> Student already mentoring meeting of same subject that weekend.<br>";
					}
				}
				else {
					$_SESSION['message'] .= "<span style='color:red'>FAIL</span> Meeting already has a max of 3 mentors enrolled.<br>";
				}
			}
		}
		else {
			$query = "SELECT * FROM meetings WHERE group_id = $group_id AND date > CURDATE()";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . $myconnection->error);
			while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
				$meet_id = $row['meet_id'];
				$query = "SELECT * FROM enroll2 WHERE meet_id = $meet_id AND mentor_id = $uid";
				$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . $myconnection->error);
				if (mysqli_num_rows($result2) == 1){
					$sql = "DELETE FROM enroll2 WHERE meet_id = $meet_id AND mentor_id = $uid";
					if ($myconnection->query($sql) != TRUE){
							$_SESSION['message'] .= $myconnection->error . "<br>";
					}
					else {
						$_SESSION['message'] .= "<b>MID$meet_id</b>: <span style='color:green'>SUCCESS</span> Successfully removed student from meeting.<br>";
						$sql = "UPDATE meetings SET capacity = capacity - 1 WHERE meet_id = $meet_id";
						if ($myconnection->query($sql) != TRUE){
							$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> " . $myconnection->error . "<br>";
						}
					}
				}
			}
		}
	}

	$myconnection->close();
	header ("Location:student_enroll_form.php");
?>