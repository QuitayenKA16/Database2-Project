<html>
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['message'])){
				echo "<br>$_SESSION[message]";
				unset($_SESSION['message']);
			}
		?>
		<h2>Create new parent account</h2>
		<form action="new_parent.php" method="post">
			<label><b>Name:*</label><br><input type="text" name="name"/><br><br>
			<label>Phone:</label><br><input type="text" name="phone"/><br><br>
			<label>Email:*</label><br><input type="text" name="email"/><br><br>
			<label>Password:*</label><br><input type="password" name="password"/><br><br>
			<input type="submit">
		</form>
	</body>
</html>