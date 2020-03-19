<html>
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
		<h2>Cancel meeting</h2>
			<p><b>Meeting ID: </b><?php echo $edit_mid;?></p>
			<p><b>Name: </b><?php echo $mName;?></p>
			<p><b>Date: </b><?php echo $mDate;?></p>
			<p><b>DOW: </b><?php echo $mDayOfWeek;?></p>
			<p><b>Timeslot: </b><?php echo $mStartTime . "-" . $mEndTime;?></p>
			<p><b>Capacity: </b><?php echo $mCapacity;?></p>
			<p><b>Announcement: </b><?php echo $mAnnounce;?></p>
			
		<p style='color:red;'>Are you sure you want to cancel this meeting?</p>
		<button onclick="window.location.href='admin_page.php'">No, Go Back</button>
		<button onclick="window.location.href='cancel_meeting.php'">Yes, Cancel</button><hr>
	</body>
</html>