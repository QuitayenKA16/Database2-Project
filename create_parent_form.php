<html>
	
	<style>
	</style>
	
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['error'])){
				echo "<br>$_SESSION[error]";
			}
		?>
		
		<h3>Create new parent account</h3>
		
		<form action="new_parent_page.php" method="post">
			<label for="field1"><span>First Name: <span class="required">*</span></span> <input type="text" name="firstName"/></label> <br>
			<label for="field2"><span>Last Name: <span class="required">*</span></span> <input type="text" name="lastName"/></label> <br>
			<label for="field3"><span>Email: </span> <input type="text" name="email"/></label> <br>
			<label for="field4"><span>Telephone: </span> <input type="text" name="phoneNum"/></label> <br>
			<label for="field5"><span>Username: <span class="required">*</span></span> <input type="text" name="username"/></label> <br>
			<label for="field6"><span>Password: <span class="required">*</span></span> <input type="password" name="password"/></label> <br>
			<input type="submit">
		</form>
		
	</body>
</html>