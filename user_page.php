<html>
	<style>
		* {
			box-sizing: border-box;
		}
		.column1{
			border-style: solid;
			float: left;
			padding: 10px;
			height:300px;
			margin-top:15px;
		}
		.column2{
			border-style: none;
			float: left;
			padding: 10px;
			width: 50%;
		}
		p.p1 {
			font: normal 14px Verdana, Arial, sans-serif;
			margin-left: 10px;
		}
	</style>

	<body>
		<?php
			include "header.php";
			$_SESSION['error'] = "";
		?>
		
		<div class="column1" style="background-color:#f2f2f2; width:40%;">
			<h3 align="center">User Information</h3>
			<p class="p1"><b>Name: </b> <?php echo "$_SESSION[lastName], $_SESSION[firstName]"; ?> <br>
			<p class="p1"><b>Email: </b> <?php echo "$_SESSION[email]"; ?> <br>
			<p class="p1"><b>Phone Number: </b> <?php echo "$_SESSION[phone]"; ?> <br>
			<p class="p1"><b>User type: </b>
				<?php
					if ($_SESSION['type'] == 0)
						echo "Parent<br>";
					else if ($_SESSION['type'] == -1)
						echo "Admin<br>";
					else
						echo "Student<br><p class='p1'><b>Grade Level: </b>$_SESSION[grade]<br>";
				?>
			<br><br><br>
			<a href='http://localhost/Database2-Project/user_page.php'>Edit Details</a>
		</div>
		
		<div class="column1" style="width:60%;">
			<h3 align="center">Actions</h3>
				
			<?php
				if ($_SESSION['type'] == -1){ //admin
					echo "<div class='column2' align='center'>";
					echo "<p style='font: bold 16px Verdana, Arial, sans-serif;'>Views</p>";
					echo "<a href='http://localhost/Database2-Project/view_users_page.php'>View Users</a><br>";
					echo "<a href='http://localhost/Database2-Project/view_groups_page.php'>View Groups</a><br><br>";
					echo "</div>";
					
					echo "<div class='column2' align='center'>";
					echo "<p style='font: bold 16px Verdana, Arial, sans-serif;'>Create / Edit</p>";
					echo "<a href='http://localhost/Database2-Project/create_group_form.php'>Create Group</a><br>";
					echo "<a href='http://localhost/Database2-Project/admin_page.php'>Edit Group</a><br>";
					echo "</div>";
				}
				else if ($_SESSION['type'] == 0){ //user
					echo "<div align='center'>";
					echo "<a href='http://localhost/Database2-Project/user_page.php'>View Children</a><br>";
					echo "<a href='http://localhost/Database2-Project/user_page.php'>Assign Meetings</a><br>";
					echo "</div>";
				}
				else { //student
					echo "<div align='center'>";
					echo "<a href='http://localhost/Database2-Project/user_page.php'>Join Group</a><br>";
					echo "<a href='http://localhost/Database2-Project/user_page.php'>Attend Meeting</a><br>";
					echo "</div>";
				}
			?>
		</div>

		
	</body
</html>