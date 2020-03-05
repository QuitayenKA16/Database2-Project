<html>
	
	<style>
		textarea {
			width: 231px;
			height: 50px;
			resize: none;
		}
	</style>
	
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['message'])){
				echo "<br>$_SESSION[message]";
				unset($_SESSION['message']);
			}
		?>
		
		<form action="new_meeting.php" method="post">
			<br><a href='http://localhost/Database2-Project/group_page.php'>Back</a>
			<h3>Create new meeting</h3>
			<label><span>Name:<span class="required">*</span></span> <input type="text" name="name"/></label> <br>
			<label><span>Announcement:</span><textarea name="announcement"></textarea></label><br>
			<label><span>Date:<span class="required">*</span></span><input type="week" name="week"/></label><br>
			<label><span>Timeslot:<span class="required">*</span></span></label>
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
			</select><br>
			<input type="submit" style="font: normal 16px Comic Sans MS, cursive, sans-serif;">
		</form>
	</body>
</html>