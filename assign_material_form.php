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
				echo "<br><p>$_SESSION[message]</p>";
				unset($_SESSION['message']);
			}
		?>
		
		<div><br><a href='<?php echo "$_SESSION[path]";?>meeting_page.php'>Back</a></div>
		<h3>Assign new study material</h3>
		<form action="new_study_material.php" method="post">
			<label><span>Title:<span class="required">*</span></span> <input type="text" name="title"/></label> <br>
			<label><span>Author:<span class="required">*</span></span><input type="text" name="author"/></label><br>
			<label><span>Type:<span class="required">*</span></span><input type="text" name="type"/></label><br>
			<label><span>URL:</span><input type="text" name="url"/></label><br>
			<label><span>Assigned Date:<span class="required">*</span></span><input type="date" name="date"/></label><br>
			<label><span>Notes:</span><textarea name="notes"/></textarea></label><br>
			<input type="submit" style="font: normal 16px Verdana, Geneva, sans-serif;">
		</form>
	
	</body>
</html>