<html>
	<style>	
		h3 {
			margin: 20px 0px 5px 0px;
		}
	</style>
	
	<body>
		<?php
			include "header.php";
			$_SESSION['error'] = "";
		?>
		
		<div>
			<h3>Existing user</h3>
			<a href="http://localhost/Database2-Project/login_form.php">Login existing account</a><br>
		</div>
		<br>
		
		<div>
			<h3>New user</h3>
			<p><u>Admin:</u> Must be logged in as an admin to create a new admin account.</p>
			<p><u>Parent:</u>
			<a href="http://localhost/Database2-Project/create_parent_form.php"> Create new parent account</a><br>
			</p><p><u>Student:</u> Must be logged in as a parent to create a new child student account.</p>
		</div>
	</body>
</html>