<html>
	
	<style>
	</style>
	
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['error'])){
				echo "<br>$_SESSION[error]";
				unset($_SESSION['error']);
			}
		?>
		
		<h3>Create new admin account</h3>
		
		<form action="new_admin_page.php" method="post">
			<label for="field1"><span>Name: <span class="required">*</span></span> <input type="text" name="name"/></label> <br>
			<label for="field4"><span>Phone: </span> <input type="text" name="phone"/></label> <br>
			<label for="field3"><span>Email: </span> <input type="text" name="email"/></label> <br>
			<label for="field6"><span>Password: <span class="required">*</span></span> <input type="password" name="password"/></label> <br>
			<input type="submit" style="font: normal 16px Verdana, Arial, sans-serif;">
		</form>
		
	</body>
</html>