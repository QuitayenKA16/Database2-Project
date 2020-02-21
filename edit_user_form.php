<html>
	
	<style>
	</style>
	
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['error'])){
				echo "$_SESSION[error]";
			}
		?>
		
		<form action="header.php">
			<h3>Edit account details</h3>
			<label for="field3"><span>First Name: <span class="required">*</span></span> <input type="text" name="firstName" <?php echo "value='$_SESSION[firstName]'";?>/></label> <br>
			<label for="field3"><span>Last Name: <span class="required">*</span></span> <input type="text" name="lastName" <?php echo "value='$_SESSION[lastName]'";?>/></label> <br>
			<label for="field4"><span>Email: </span> <input type="text" name="email" <?php echo "value='$_SESSION[email]'";?>/></label> <br>
			<label for="field5"><span>Telephone: </span> <input type="text" name="phoneNum" <?php echo "value='$_SESSION[phone]'";?>/></label> <br>
			<label for="field6"><span>Username: <span class="required">*</span></span> <input type="text" name="username" <?php echo "value='$_SESSION[username]'";?> disabled="disabled"/></label> <br>
			<label for="field7"><span>Password: <span class="required">*</span></span> <input type="password" name="password"/></label> <br>
			<label for="field8"><span>Grade Level: <span class="required">*</span></span></label>
			<select name="grade" 
				<?php
						if (isset($_SESSION['grade'])){
							echo "type='number' value='$_SESSION[grade]'>/";
							echo "<option value='6'>6</option>";
							echo "<option value='7'>7</option>";
							echo "<option value='8'>8</option>";
							echo "<option value='9'>9</option>";
							echo "<option value='10'>10</option>";
							echo "<option value='11'>11</option>";
							echo "<option value='12'>12</option>";
						}
						else{
							echo "type='text' value='N/A' disabled='disabled'>/";
							echo "<option value='N/A'>N/A</option>";
						}
				?>
			</select><br>
			<input type="submit" style="font: normal 16px Verdana, Arial, sans-serif;">
		</form>
		
	</body>
</html>