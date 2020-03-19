<html>
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['message'])){
				echo "<br>$_SESSION[message]";
				unset($_SESSION['message']);
			}
			$email = $_SESSION['loggedUser']['email'];
			$password = $_SESSION['loggedUser']['password'];
		?>
		<form action="new_student.php" method="post">
			<h2>Create student account</h2>
			<label><b>Name:*</label><br><input type="text" name="name"/><br><br>
			<label>Phone:</label><br><input type="text" name="phone"/><br><br>
			<label>Email:*</label><br><input type="text" name="email"/><br><br>
			<label>Password:*</label><br><input type="password" name="password"/><br><br>
			<label>Grade Level:*</label>
			<select type="number" name="grade">
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select><br><br>
			<input type="submit">
		</form>
	</body>
</html>