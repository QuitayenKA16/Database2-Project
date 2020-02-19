<html>
	<style>
		label {
			margin: 0px 0px 10px 0px;
		}
		input {
			margin: 0px 0px 10px 0px;
		}
		span.required {
			color:red;
		}
			
	</style>
	
	<body>
		<?php
			include "header.php";
			
			
		?>
		
		<h3>Login as existing account</h3>
		<form action="process_login.php" method="post">
			<label for="field1"><span>Username: <span class="required">*</span></span> <input type="text" name="username"/></label> <br>
			<label for="field2"><span>Password: <span class="required">*</span></span> <input type="password" name="password"/></label> <br>
			<input type="submit">
		</form>

	</body>
</html>