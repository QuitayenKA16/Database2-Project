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
			if (isset($_SESSION['error'])){
				echo "<br>$_SESSION[error]";
				unset($_SESSION['error']);
			}
		?>
		
		<form action="create_meeting_form.php" method="post">
			<h3>Create new meeting</h3>
			<label for="field3"><span>Name: <span class="required">*</span></span> <input type="text" name="name"/></label> <br>
			<label for="field4"><span>Announcement: </span><textarea name="announcement"></textarea></label><br>
			<label for="field4"><span>Date: <span class="required">*</span></span>
				<input type="date" name="date" min='2020-09-01' max='2020-12-31'/>
			</label><br>
			<label for="field8"><span>Timeslot: <span class="required">*</span></span></label>
			<select name="start_time">
				<option value='16:00:00'>4:00PM - 5:00PM</option>
				<option value='17:00:00'>5:00PM - 6:00PM</option>
				<option value='18:00:00'>6:00PM - 7:00PM</option>
				<option value='19:00:00'>7:00PM - 8:00PM</option>
			</select><br><br>
			<input type="submit" style="font: normal 16px Verdana, Arial, sans-serif;">
		</form>
	</body>
</html>