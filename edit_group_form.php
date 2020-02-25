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
			$_SESSION['back'] = "group_page.php";
			$gName = $_SESSION['group']['name'];
			$gLvl = $_SESSION['group']['mentee_grade_req'];
			$gDesc = $_SESSION['group']['description'];
		?>
		
		<form action="header.php" method="post">
			<h3>Create new group</h3>
			<label for="field3"><span>Name: <span class="required">*</span></span> <input type="text" name="name" <?php echo "value='$gName'";?>/></label> <br>
			<label for="field4"><span>Description: </span> <input type="text" name="description" <?php echo "value='$gDesc'";?>/></label> <br>
			<label for="field8"><span>Grade Level: <span class="required">*</span></span></label>
			<select name="grade" 
				<?php
					echo "type='number' value='$gLvl'>/";
					if ($gLvl == 6)	 echo "<option value='6' selected>6</option>";
					else			 echo "<option value='6'>6</option>";
					if ($gLvl == 7)	 echo "<option value='7' selected>7</option>";
					else			 echo "<option value='7'>7</option>";
					if ($gLvl == 8)	 echo "<option value='8' selected>8</option>";
					else			 echo "<option value='8'>8</option>";
					if ($gLvl == 9)	 echo "<option value='9' selected>9</option>";
					else			 echo "<option value='9'>9</option>";
					if ($gLvl == 10) echo "<option value='10' selected>10</option>";
					else			 echo "<option value='10'>10</option>";
					if ($gLvl == 11) echo "<option value='11' selected>11</option>";
					else			 echo "<option value='11'>11</option>";
					if ($gLvl == 12) echo "<option value='12' selected>12</option>";
					else			 echo "<option value='12'>12</option>";
				?>
			</select><br><br>
			<button type="submit" name="action" value="delete">Delete</button>
			<button type="submit" name="action" value="edit">Submit</button>
		</form>
	</body>
</html>