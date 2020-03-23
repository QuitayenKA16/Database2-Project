<?php
	include "header.php";
	$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
	$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
	$_SESSION['message'] = "";
	
	$meet_id = $_SESSION['meet']['meet_id'];
	$announcement = $_SESSION['meet']['announcement'];
	$date = $_SESSION['meet']['date'];
	$announcement = $_SESSION['meet']['announcement'];
	$date2 = (date('N', $date) == 6) ? date('yy-m-d', strtotime($date . ' +1 days')) : date('yy-m-d', strtotime($date . ' -1 days'));
	$time_slot = $_SESSION['meet']['time_slot_id'];
	$menteeCnt = mysqli_num_rows(mysqli_query($myconnection, "SELECT mentee_id from enroll WHERE meet_id = $meet_id"));
	$mentorCnt = mysqli_num_rows(mysqli_query($myconnection, "SELECT mentor_id from enroll2 WHERE meet_id = $meet_id"));
				
	if (isset($_POST['mentor_id'])){
		$mentor_id = substr($_POST['mentor_id'], 0, strlen($_POST['mentor_id'])-1);
		$isEnrolled = substr($_POST['mentor_id'], -1);
		$_SESSION['message'] .= "<b>UID$mentor_id: </b>";
		
		if ($isEnrolled == "0"){
			if ($mentorCnt < 3){
				$sameDayTimeMeetings = mysqli_num_rows(mysqli_query($myconnection, 
						"SELECT DISTINCT * FROM enroll2 e, meetings m WHERE e.meet_id=m.meet_id AND m.date='$date' AND m.time_slot_id=$time_slot AND e.mentor_id=$mentor_id"));
				$mentoringSameSubject = mysqli_num_rows(mysqli_query($myconnection, 
						"SELECT DISTINCT * FROM enroll2 e, meetings m WHERE e.meet_id=m.meet_id AND m.date='$date' AND m.announcement='$announcement' AND e.mentor_id=$mentor_id"));
				$mentoringSameSubject += mysqli_num_rows(mysqli_query($myconnection, 
						"SELECT DISTINCT * FROM enroll2 e, meetings m WHERE e.meet_id=m.meet_id AND m.date='$date2' AND m.announcement='$announcement' AND e.mentor_id=$mentor_id"));
						
				if ($sameDayTimeMeetings == 0 && $mentoringSameSubject == 0){
					$sql = "INSERT INTO enroll2 (meet_id, mentor_id) VALUES ($meet_id, $mentor_id)";
					if ($myconnection->query($sql) != TRUE){
						$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> Error: Could not enroll student.<br>" . $myconnection->error . "<br>";
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
						$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> Student already enrolled in meeting during same date and time-slot.<br>";
					if ($mentoringSameSubject != 0)
						$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> Student already mentoring meeting of same subject that weekend.<br>";
				}
			}
			else {
				$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> Meeting already has a max of 3 mentors enrolled.<br>";
			}
		}
		else {
			$sql = "DELETE FROM enroll2 WHERE meet_id = $meet_id AND mentor_id = $mentor_id";
			if ($myconnection->query($sql) != TRUE){
				$_SESSION['message'] .= "Error: Could not remove student from meeting.<br>" . $myconnection->error . "<br>";
			}
			else {
				$_SESSION['message'] .= "<span style='color:green'>SUCCESS</span> Successful student removal.<br>";
				$sql = "UPDATE meetings SET capacity = capacity - 1 WHERE meet_id = $meet_id";
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
		$_SESSION['message'] .= "<b>UID$mentee_id: </b>";
		
		if ($isEnrolled == "0"){
			if ($menteeCnt < 6){
				$sql = "INSERT INTO enroll (meet_id, mentee_id) VALUES ($meet_id, $mentee_id)";
				if ($myconnection->query($sql) != TRUE){
					$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> Error enrolling student - " . $myconnection->error . "<br>";
				}
				else {
					$_SESSION['message'] .= "<span style='color:green'>SUCCESS</span> Successful student enrollment.<br>";
					$sql = "UPDATE meetings SET capacity = capacity + 1 WHERE meet_id = $meet_id";
					if ($myconnection->query($sql) != TRUE){
						$_SESSION['message'] .= $myconnection->error . "<br>";
					}
				}
			}
			else {
				$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> Meeting $meet_id already has a max of 6 mentees enrolled.<br>";
			}
		}
		else {
			$sql = "DELETE FROM enroll WHERE meet_id = $meet_id AND mentee_id = $mentee_id";
			if ($myconnection->query($sql) != TRUE){
				$_SESSION['message'] .= "<span style='color:red'>FAILURE</span> Error removing student from meeting - " . $myconnection->error . "<br>";
			}
			else {
				$_SESSION['message'] .= "<span style='color:green'>SUCCESS</span> Successful student removal.<br>";
				$sql = "UPDATE meetings SET capacity = capacity - 1 WHERE meet_id = $meet_id";
				if ($myconnection->query($sql) != TRUE){
					$_SESSION['message'] .= $myconnection->error . "<br>";
				}
			}
		}
	}
	
	$myconnection->close();
	header ("Location:enroll_members_form.php");
?>