<html>
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['message'])){
				echo "$_SESSION[message]";
				unset($_SESSION['message']);
			}

			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			
			$gid = $_SESSION['meet']['group_id'];
			$mName = $_SESSION['meet']['meet_name'];
			$mDate = $_SESSION['meet']['date'];
			$mDate = new DateTime($mDate);
			$week = $mDate->format("W");
			$mTimeSlot = $_SESSION['meet']['time_slot_id'];
			$mDayOfWeek = $_SESSION['meet']['day_of_the_week'];
			$mStartTime = $_SESSION['meet']['start_time'];
			$mEndTime = $_SESSION['meet']['end_time'];
			$mCapacity = $_SESSION['meet']['capacity'];
			$mAnnounce = $_SESSION['meet']['announcement'];
			
		?>
		
		<form action="edit_meeting.php" method="post">
			<br><a href='<?php echo "$_SESSION[path]";?>meeting_page.php'>Back</a>
			<h2>Edit meeting details</h2>
			<label><b>Name:*</label><br><input type="text" name="name" value="<?php echo $mName;?>"/><br><br>
			<label>Week:*</label><br><input type="week" name="week" value="<?php echo $week;?>"/><br><br>
			<label>Timeslot:*</label><br>
			<select name="time_slot_id">
				<?php
					$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
					$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
					$query = "SELECT * FROM time_slot";
					$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
						echo "<option value='$row[time_slot_id]'";
						if ($row['time_slot_id'] == $mTimeSlot)
							echo " selected";
						echo ">ID$row[time_slot_id]: $row[day_of_the_week] $row[start_time]-$row[end_time]</option>";
					}
				?>
			</select><br><br>
			<label>Announcement:</label><br><input type="text" name="announcement" value="<?php echo $mAnnounce;?>"/><br><br>
			<input type="submit">
		</form>
	</body>
</html>