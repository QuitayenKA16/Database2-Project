<html>
	<style>
	</style>
	
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['error'])){
				echo "$_SESSION[error]";
			}
			
			if (isset($_POST['edit_uid']))	$_SESSION['edit_uid'] = $_POST['edit_uid'];
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			$query = "SELECT * FROM users u WHERE uid = $_SESSION[edit_uid]";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
			$firstName = $row['firstName'];
			$lastName = $row['lastName'];
			$email = $row['email'];
			$phone = $row['phoneNum'];
			$username = $row['username'];
			$password = $row['password'];
			
			$query = "SELECT * FROM students WHERE uid = '$_SESSION[edit_uid]'";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
			$grade = (mysqli_num_rows($result) == 1) ? $row['grade'] : 5;
		?>
		
		<form action="header.php" method="post">
			<h3>Edit account details</h3>
			<label><span>First Name: <span class="required">*</span></span> <input type="text" name="firstName" <?php echo "value='$firstName'";?>/></label> <br>
			<label><span>Last Name: <span class="required">*</span></span> <input type="text" name="lastName" <?php echo "value='$lastName'";?>/></label> <br>
			<label><span>Email: </span> <input type="text" name="email" <?php echo "value='$email'";?>/></label> <br>
			<label><span>Telephone: </span> <input type="text" name="phoneNum" <?php echo "value='$phone'";?>/></label> <br>
			<label><span>Username: <span class="required">*</span></span> <input type="text" name="username" <?php echo "value='$username'";?> disabled="disabled"/></label> <br>
			<label><span>Password: <span class="required">*</span></span> <input type="password" name="password" <?php echo "value='$password'";?>/></label> <br>
			<label><span>Grade Level: <span class="required">*</span></span></label>
			<select name="grade" 
				<?php
					if ($grade > 5){
						echo "type='number' value='$grade'>/";
						if ($grade == 6)	echo "<option value='6' selected>6</option>";
						else	echo "<option value='6'>6</option>";
						if ($grade == 7)	echo "<option value='7' selected>7</option>";
						else	echo "<option value='7'>7</option>";
						if ($grade == 8)	echo "<option value='8' selected>8</option>";
						else	echo "<option value='8'>8</option>";
						if ($grade == 9)	echo "<option value='9' selected>9</option>";
						else	echo "<option value='9'>9</option>";
						if ($grade == 10)	echo "<option value='10' selected>10</option>";
						else	echo "<option value='10'>10</option>";
						if ($grade == 11)	echo "<option value='11' selected>11</option>";
						else	echo "<option value='11'>11</option>";
						if ($grade == 12)	echo "<option value='12' selected>12</option>";
						else	echo "<option value='12'>12</option>";
					}
					else{
						echo "type='text' value='N/A' disabled='disabled'>/";
						echo "<option value='N/A'>N/A</option>";
					}
				?>
			</select><br><br>
			<button type="submit" name="action" value="delete">Delete</button>
			<button type="submit" name="action" value="edit">Submit</button>
		</form>
		
	</body>
</html>