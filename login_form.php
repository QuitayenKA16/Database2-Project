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
		<h3>Login as existing account</h3>
		<form action="process_login.php" method="post">
			<label for="field1"><span>Email: <span class="required">*</span></span> <input type="text" name="loginEmail"/></label> <br>
			<label for="field2"><span>Password: <span class="required">*</span></span> <input type="password" name="loginPassword"/></label> <br>
			<input type="submit" style="font: normal 16px Comic Sans MS, cursive, sans-serif;">
		</form>

	</body>
</html>