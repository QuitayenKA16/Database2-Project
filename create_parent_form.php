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
		
		<h3>Create new parent account</h3>
		<form action="new_parent.php" method="post">
			<label for="field1"><span>Name: <span class="required">*</span></span> <input type="text" name="name"/></label> <br>
			<label for="field4"><span>Phone: </span> <input type="text" name="phone"/></label> <br>
			<label for="field3"><span>Email: <span class="required">*</span></span> <input type="text" name="email"/></label> <br>
			<label for="field6"><span>Password: <span class="required">*</span></span> <input type="password" name="password"/></label> <br>
			<input type="submit" style="font: normal Comic Sans MS, cursive, sans-serif;">
		</form>
	</body>
</html>