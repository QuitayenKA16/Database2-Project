<html>
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['message'])){
				echo "<br>$_SESSION[message]";
				unset($_SESSION['message']);
			}
		?>
		
		<form action="new_meeting.php" method="post">
			<br><a href='<?php echo "$_SESSION[path]";?>group_page.php'>Back</a>
			<h2>Create new meeting</h2>
			<label><b>Name:*</label><br><input type="text" name="name"/><br><br>
			<label>Announcement:</label><br><textarea name="announcement"></textarea><br><br>
			<label>Week:*</label><br><input type="week" name="week"/><br><br>
			<label>Timeslot:*</label><br>
			<select name="time_slot_id">
				<?php
					$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
					$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
					$query = "SELECT * FROM time_slot";
					$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
						echo "<option value='$row[time_slot_id]'>ID$row[time_slot_id]: $row[day_of_the_week] $row[start_time]-$row[end_time]</option>";
					}
				?>
			</select><br><br>
			<input type="submit">
		</form>
	</body>
</html>