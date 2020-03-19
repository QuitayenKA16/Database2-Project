<html>
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['message'])){
				echo "<br><p>$_SESSION[message]</p>";
				unset($_SESSION['message']);
			}
		?>
		
		<div><br><a href='<?php echo "$_SESSION[path]";?>meeting_page.php'>Back</a></div>
		<h2>Assign new study material</h2>
		<form action="new_study_material.php" method="post">
			<label><b>Title:*</label><br><input type="text" name="title"/><br><br>
			<label>Author:*</label><br><input type="text" name="author"/><br><br>
			<label>Type:</label><br><input type="text" name="type"/><br><br>
			<label>URL:</label><br><input type="text" name="url"/><br><br>
			<label>Assigned Date:*</label><br><input type="date" name="date"/><br><br>
			<label>Notes:</label><br><textarea name="notes"/></textarea><br><br>
			<input type="submit">
		</form>
	</body>
</html>