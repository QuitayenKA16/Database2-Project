<html>
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['message'])){
				echo "<br>$_SESSION[message]";
				unset($_SESSION['message']);
			}
		?>
		<form action="new_time_slot.php" method="post">
			<h2>Create new time slot</h2>
			<label><b>Start Time:*</label><br><input type="time" name="start_time"/><br><br>
			<label>DOW:*</label><br>
			<select name="day_of_the_week">
				<option value='Saturday'>Saturday</option>
				<option value='Sunday'>Sunday</option>
			</select><br><br>
			<p style='color:red;'><font size="3">*Meeting length is automatically set to 1 hour.</font></p>
			<input type="submit">
		</form>
	</body>
</html>