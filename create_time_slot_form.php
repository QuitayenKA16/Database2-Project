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
			<p>*Meeting length is automatically 1 hour.</p><br>
			<label><span>Start Time: <span class="required">*</span></span> <input type="time" name="start_time"/></label> <br>
			<label><span>DOW:<span class="required">*</span></span></label>
			<select name="day_of_the_week">
				<option value='Saturday'>Saturday</option>
				<option value='Sunday'>Sunday</option>
			</select><br><br>
			<input type="submit" style="font: normal 16px Comic Sans MS, cursive, sans-serif;">
		</form>
	</body>
</html>