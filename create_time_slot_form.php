<html>
	
	<style>
	</style>
	
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['message'])){
				echo "<br>$_SESSION[message]";
				unset($_SESSION['message']);
			}
		?>
		
		<form action="new_time_slot.php" method="post">
			<h3>Create new time slot</h3>
			<label><span>Start Time: <span class="required">*</span></span> <input type="time" name="start_time"/></label> <br>
			<label><span>DOW:<span class="required">*</span></span></label>
			<select name="day_of_the_week">
				<option value='Saturday'>Saturday</option>
				<option value='Sunday'>Sunday</option>
			</select><br><br>
			<p style="font: normal 14px Verdana, Geneva, sans-serif;">*Meeting length is automatically set to 1 hour.</p>
			<input type="submit" style="font: normal 16px Verdana, Geneva, sans-serif;">
		</form>
	</body>
</html>