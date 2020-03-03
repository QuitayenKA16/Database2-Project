<html>
	<style>
	</style>
	
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['message'])){
				echo "$_SESSION[message]";
				unset($_SESSION['message']);
			}
			
			if (isset($_POST['edit_uid'])){
				$_SESSION['edit_uid'] = $_POST['edit_uid'];
				if ($_SESSION['type'] == -1) //admin editing another user
					echo "<br><a href='http://localhost/Database2-Project/view_users_page.php'>Back</a> ";
				else if ($_SESSION['type'] == 0) //parent editing child
					echo "<br><a href='http://localhost/Database2-Project/view_children_page.php'>Back</a> ";
			}
			else {
				echo "<br><a href='http://localhost/Database2-Project/user_page.php'>Back</a> ";
			}
			
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			$query = "SELECT * FROM users WHERE id = $_SESSION[edit_uid]";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
			$name = $row['name'];
			$email = $row['email'];
			$phone = $row['phone'];
			$password = $row['password'];
			
			$query = "SELECT * FROM students WHERE student_id = '$_SESSION[edit_uid]'";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
			$grade = (mysqli_num_rows($result) == 1) ? $row['grade'] : 5;
		?>
		
		<form action="edit_user.php" method="post">
			<h3>Edit account details</h3>
			<label><span>Name: <span class="required">*</span></span> <input type="text" name="name" <?php echo "value='$name'";?>/></label> <br>
			<label><span>Phone: </span> <input type="text" name="phone" <?php echo "value='$phone'";?>/></label> <br>
			<label><span>Email: </span> <input type="text" name="email" <?php echo "value='$email'";?> disabled='disabled'/></label> <br>
			<label><span>Password: <span class="required">*</span></span> <input type="password" name="password" 
				<?php
					echo "value='$password'";
					if ($_SESSION['edit_uid'] != $_SESSION['loggedUser']['id'] && $_SESSION['type'] == 0)
						echo " disabled='disabled'";
				?>
				/></label> <br>
			<label><span>Grade Level: <span class="required">*</span></span></label>
			<select name="grade" 
				<?php
					if ($grade > 5){
						echo "type='number' value='$grade'>/";
						if ($grade == 6)	echo "<option value='6' selected>6</option>";
						else				echo "<option value='6'>6</option>";
						if ($grade == 7)	echo "<option value='7' selected>7</option>";
						else				echo "<option value='7'>7</option>";
						if ($grade == 8)	echo "<option value='8' selected>8</option>";
						else				echo "<option value='8'>8</option>";
						if ($grade == 9)	echo "<option value='9' selected>9</option>";
						else				echo "<option value='9'>9</option>";
						if ($grade == 10)	echo "<option value='10' selected>10</option>";
						else				echo "<option value='10'>10</option>";
						if ($grade == 11)	echo "<option value='11' selected>11</option>";
						else				echo "<option value='11'>11</option>";
						if ($grade == 12)	echo "<option value='12' selected>12</option>";
						else				echo "<option value='12'>12</option>";
					}
					else{
						echo "type='text' value='N/A' disabled='disabled'>/";
						echo "<option value='N/A'>N/A</option>";
					}
				?>
			</select><br><br>
			<?php if ($_SESSION['type'] == -1) //only admins can delete
				echo "<button type='submit' name='delete' value='delete'>Delete</button>";?>
			<button type="submit" name="action" value="edit">Submit</button>
		</form>
		
	</body>
</html>