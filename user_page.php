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
			width:50%;
		}
		p.p1 {
			font: normal 14px Verdana, Arial, sans-serif;
			margin-left: 10px;
		}
		h4 {
			margin: 20px 0px 5px 0px;
		}
		
	</style>

	<body>
		<?php
			include "header.php";
			unset($_SESSION['error']);
			$_SESSION['back'] = "user_page.php";
			$_SESSION['table_view'] = 'default';
			$_SESSION['table_sort'] = 'idAsc';
			$_SESSION['edit_uid'] = $_SESSION['loggedUser']['id'];
			
			$uid = $_SESSION['loggedUser']['id'];
			$name = $_SESSION['loggedUser']['name'];
			$email = $_SESSION['loggedUser']['email'];
			$phone = $_SESSION['loggedUser']['phone'];
		?>
		
		<div class="column1" style="background-color:#f2f2f2;">
			<h3 align="center">User Information</h3>
			<p class="p1"><b>Name: </b> <?php echo "$name"; ?> <br>
			<p class="p1"><b>Email: </b> <?php echo "$email"; ?> <br>
			<p class="p1"><b>Phone Number: </b> <?php echo "$phone"; ?> <br>
			<p class="p1"><b>User type: </b>
				<?php
					if ($_SESSION['type'] == 0)
						echo "Parent<br>";
					else if ($_SESSION['type'] == -1)
						echo "Admin<br>";
					else{ //student
						echo "Student<br><p class='p1'><b>Grade Level: </b>$_SESSION[grade]<br>";
						echo "<p class='p1'><b>Parent ID: </b>";
						
						$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
						$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
						$query = "SELECT * FROM users u, students s WHERE u.id = $uid AND u.id = s.student_id";
						$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
						$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
						echo "$row[parent_id]";
					};
				?>
			<br><br><br>
			<a href='http://localhost/Database2-Project/edit_user_form.php'>Edit Details</a>
		</div>
		
		<div class="column1" style="">
			<h3 align="center">Actions</h3>
			<?php
				if ($_SESSION['type'] == -1){ //admin
					echo "<div align='center'>";
					echo "<h4>Views</h4>";
					echo "<a href='http://localhost/Database2-Project/view_users_page.php'>View users</a><br>";
					echo "<a href='http://localhost/Database2-Project/view_groups_page.php'>View groups</a><br><br>";

					echo "<h4>Create</h4>";
					echo "<a href='http://localhost/Database2-Project/create_admin_form.php'>Create new admin account</a><br>";
					echo "<a href='http://localhost/Database2-Project/create_group_form.php'>Create new group</a><br>";
					echo "</div>";
				}
				else if ($_SESSION['type'] == 0){ //user
					echo "<div align='center'>";
					echo "<a href='http://localhost/Database2-Project/create_student_form.php'>Create student account</a><br>";
					echo "<a href='http://localhost/Database2-Project/view_children_page.php'>View children</a><br>";
					echo "<a href='http://localhost/Database2-Project/user_page.php'>Assign meetings</a><br>";
					echo "</div>";
				}
				else { //student
					echo "<div align='center'>";
					echo "<a href='http://localhost/Database2-Project/user_page.php'>Join groups</a><br>";
					echo "<a href='http://localhost/Database2-Project/user_page.php'>Join meetings</a><br>";
					echo "</div>";
				}
			?>
		</div>		
	</body
</html>