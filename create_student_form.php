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
			$email = $_SESSION['loggedUser']['email'];
			$password = $_SESSION['loggedUser']['password'];
		?>

		<form action="new_student_page.php" method="post">
			<h3>Set parent account</h3>
			<label for="field1"><span>Email: <span class="required">*</span></span> <input type="text" name="loginEmail" value=
				<?php echo "$email";?>/></label> <br>
			<label for="field2"><span>Password: <span class="required">*</span></span> <input type="password" name="loginPassword" value=
				<?php echo "$password";?>/></label> <br>
		
			<h3>Create student account</h3>
			<label for="field3"><span>Name: <span class="required">*</span></span> <input type="text" name="name"/></label> <br>
			<label for="field5"><span>Phone: </span> <input type="text" name="phone"/></label> <br>
			<label for="field4"><span>Email: </span> <input type="text" name="email"/></label> <br>
			<label for="field7"><span>Password: <span class="required">*</span></span> <input type="password" name="password"/></label> <br>
			<label for="field8"><span>Grade Level: <span class="required">*</span></span></label>
			<select type="number" name="grade">
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select><br>
			<input type="submit" style="font: normal 16px Verdana, Arial, sans-serif;">
		</form>
	</body>
</html>