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
			<label><span>End Time: </span> <input type="time" name="end_time"/></label> <br>
			<input type="submit" style="font: normal 16px Verdana, Arial, sans-serif;">
		</form>
	</body>
</html>