<html>
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['message'])){
				echo "<br><p>$_SESSION[message]</p>";
				unset($_SESSION['message']);
			}
			
			$_SESSION['edit_mat_id'] = (isset($_POST['material_id'])) ? $_POST['material_id'] : $_SESSION['edit_mat_id'];
			$material_id = $_SESSION['edit_mat_id'];
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			$query = "SELECT * FROM material WHERE material_id = $material_id";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$_SESSION['material'] = mysqli_fetch_assoc ($result);
			
			$title = $_SESSION['material']['title'];
			$author = $_SESSION['material']['author'];
			$type = $_SESSION['material']['type'];
			$URL = $_SESSION['material']['url'];
			$assignedDate = $_SESSION['material']['assigned_date'];
			$notes = $_SESSION['material']['notes'];
		?>
		
		<div><br><a href='<?php echo "$_SESSION[path]";?>meeting_page.php'>Back</a></div>
		<h2>Edit study material</h2>
		<form action="edit_material.php" method="post">
			<label><b>Title:*</label><br><input type="text" name="title" value="<?php echo $title;?>"/><br><br>
			<label>Author:*</label><br><input type="text" name="author" value="<?php echo $author;?>"/><br><br>
			<label>Type:</label><br><input type="text" name="type" value="<?php echo $type;?>"/><br><br>
			<label>URL:</label><br><input type="text" name="url" value="<?php echo $URL;?>"/><br><br>
			<label>Assigned Date:*</label><br><input type="date" name="date" value="<?php echo $assignedDate;?>"/><br><br>
			<label>Notes:</label><br><textarea name="notes" value="<?php echo $notes;?>"/></textarea><br><br>
			<input type="submit">
		</form>
	</body>
</html>