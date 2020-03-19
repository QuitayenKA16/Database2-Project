<html>
	<body>
		<?php
			include "header.php";
			$_SESSION['message'] = "";
		?>
		
		<div>
			<h2>Existing user</h2>
			<a href="<?php echo "$_SESSION[path]";?>login_form.php">Login existing account</a><br>
		</div><br>
		
		<div>
			<h2>New user</h2>
			<p><u>Admin:</u> Must be logged in as an admin to create a new admin account.</p>
			<p><u>Parent:</u>
			<a href="<?php echo "$_SESSION[path]";?>create_parent_form.php"> Create new parent account</a><br>
			</p><p><u>Student:</u> Must be logged in as a parent to create child's new student account.</p>
		</div>
	</body>
</html>