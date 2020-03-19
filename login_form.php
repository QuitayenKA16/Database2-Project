<html>
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['message'])){
				echo "<br>$_SESSION[message]";
				unset($_SESSION['message']);
			}
		?>
		<h2>Login as existing account</h2>
		<form action="process_login.php" method="post">
			<label><b>Email:*</label><br><input type="text" name="loginEmail"/><br><br>
			<label>Password:*</label><br><input type="password" name="loginPassword"/><br><br>
			<input type="submit" >
		</form>
	</body>
</html>