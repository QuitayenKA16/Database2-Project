<html>
	<style>
		p.p1 {
			font: normal 15px Verdana, Geneva, sans-serif;
			margin-left: 15px;
		}
	</style>
	
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['message'])){
				echo "<br>$_SESSION[message]";
				unset($_SESSION['message']);
			}
			$edit_mid = $_POST['edit_mid'];
			
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			$query = "SELECT * FROM meetings m, time_slot t WHERE meet_id = $edit_mid AND m.time_slot_id = t.time_slot_id";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$_SESSION['meet'] = mysqli_fetch_assoc ($result);
			
			$mName = $_SESSION['meet']['meet_name'];
			$mDate = $_SESSION['meet']['date'];
			$mDayOfWeek = $_SESSION['meet']['day_of_the_week'];
			$mStartTime = $_SESSION['meet']['start_time'];
			$mEndTime = $_SESSION['meet']['end_time'];
			$mCapacity = $_SESSION['meet']['capacity'];
			$mAnnounce = $_SESSION['meet']['announcement'];
		?>
		<h3>Cancel meeting</h3>
			
		<?php
			echo "<p class='p1'><b>Meeting ID: </b>$edit_mid</p>";
			echo "<p class='p1'><b>Name: </b>$mName</p>";
			echo "<p class='p1'><b>Date: </b>$mDate</p>";
			echo "<p class='p1'><b>DOW: </b>$mDayOfWeek</p>";
			echo "<p class='p1'><b>Timeslot: </b>$mStartTime-$mEndTime</p>";
			echo "<p class='p1'><b>Capacity: </b>$mCapacity</p>";
			echo "<p class='p1'><b>Announcement: </b>$mAnnounce</p>";
		?>
		<p style='color:red;'>Are you sure you want to cancel this meeting?</p>
			
		<button onclick="window.location.href='admin_page.php'" style="font: normal 16px Verdana, Geneva, sans-serif;">No, Go Back</button>
		<button onclick="window.location.href='cancel_meeting.php'" style="font: normal 16px Verdana, Geneva, sans-serif;">Yes, Cancel</button>

	</body>
</html>