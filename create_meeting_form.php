<html>
	
	<style>
		textarea {
			width: 215px;
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
		
		<form action="create_meeting_form.php" method="post">
			<h3>Create new meeting</h3>
			<label><span>Name:<span class="required">*</span></span> <input type="text" name="name"/></label> <br>
			<label><span>Announcement:</span><textarea name="announcement"></textarea></label><br>
			<label><span>Date:<span class="required">*</span></span><input type="week" name="week"/></label><br>
			<label><span>Timeslot:<span class="required">*</span></span></label>
			<select name="start_time">
				<?php
					$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
					$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
					$query = "SELECT DISTINCT start_time, end_time FROM time_slot";
					$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
						echo "<option value='$row[start_time]'>$row[start_time] - $row[end_time]</option>";
					}
				?>
			</select><br>
			<label><span>DOW:<span class="required">*</span></span></label>
			<select name="day_of_the_week">
				<option value='Saturday'>Saturday</option>
				<option value='Sunday'>Sunday</option>
			</select><br><br>
			<input type="submit" style="font: normal 16px Verdana, Arial, sans-serif;">
		</form>
	</body>
</html>