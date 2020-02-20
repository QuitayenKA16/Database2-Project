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
			if (isset($_SESSION['error'])){
				echo "<br>$_SESSION[error]";
			}
		?>
		
		<h3>Create new parent account</h3>
		
		<form action="new_parent_page.php" method="post">
			<label for="field1"><span>Name: <span class="required">*</span></span> <input type="text" name="name"/></label> <br>
			<label for="field2"><span>Email: <span class="required">*</span></span> <input type="text" name="email"/></label> <br>
			<label for="field1"><span>Telephone: </span> <input type="text" name="phoneNum"/></label> <br>
			<label for="field2"><span>Username: <span class="required">*</span></span> <input type="text" name="username"/></label> <br>
			<label for="field2"><span>Password: <span class="required">*</span></span> <input type="password" name="password"/></label> <br>
			<input type="submit">
		</form>
		
	</body>
</html>