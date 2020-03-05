<html>
	<style>
		* {
			box-sizing: border-box;
		}
		.column1{
			border-style: solid;
			float: left;
			padding: 10px;
			min-height: 325px;
			height: auto;
			margin-top: 15px;
			position: relative;
		}
		.column1 > span {
			position: absolute;
			bottom: 0;
			right: 0;
		}
		p.p1 {
			font: normal 16px Comic Sans MS, cursive, sans-serif;
			margin-left: 10px;
		}
		h4 {
			margin: 20px 0px 5px 0px;
		}
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			margin-bottom: 50px;
		}
	</style>

	<body>
		<?php
			include "header.php";
			unset($_SESSION['message']);
			$_SESSION['table_view'] = 'default';
			$_SESSION['table_sort'] = 'idAsc';
			$_SESSION['edit_uid'] = $_SESSION['loggedUser']['id'];
			
			$uid = $_SESSION['loggedUser']['id'];
			$name = $_SESSION['loggedUser']['name'];
			$email = $_SESSION['loggedUser']['email'];
			$phone = $_SESSION['loggedUser']['phone'];
		?>
		
		<div class="column1" style="background-color:#f2f2f2; width:40%;">
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
		
		<div class="column1" style="width:60%;">
			<?php
				if ($_SESSION['type'] == -1){ //admin
					echo "<div align='center'>";
					echo "<h3>Actions</h3>";
					echo "<h4>Views/Edit</h4>";
					echo "<a href='http://localhost/Database2-Project/view_users_page.php'>View users</a><br>";
					echo "<a href='http://localhost/Database2-Project/view_groups_page.php'>View groups</a><br>";
					echo "<a href='http://localhost/Database2-Project/view_time_slots_page.php'>View time slots</a><br><br>";

					echo "<h4>Create</h4>";
					echo "<a href='http://localhost/Database2-Project/create_admin_form.php'>Create new admin account</a><br>";
					//echo "<a href='http://localhost/Database2-Project/create_group_form.php'>Create new group</a><br>";
					echo "<a href='http://localhost/Database2-Project/create_time_slot_form.php'>Create new time slot</a><br>";
					echo "</div>";
				}
				else if ($_SESSION['type'] == 0){ //user
					echo "<div align='center'>";
					echo "<h3>Actions</h3>";
					echo "<a href='http://localhost/Database2-Project/create_student_form.php'>Create student account</a><br>";
					echo "<a href='http://localhost/Database2-Project/view_children_page.php'>View children</a><br>";
					echo "<a href='http://localhost/Database2-Project/user_page.php'>Assign meetings</a><br>";
					echo "</div>";
				}
				else { //student
					echo "<div align='center'>";
					$gid = $_SESSION['grade'] - 5;
					
					echo "<h4>Upcoming Meetings:</h4>";
					echo "<table style='width:80%;'><tr><th>MID</th><th>GID</th><th>Date</th><th>Time</th><th>Roll</th></tr>";
					
					$query = "SELECT * FROM meetings m, enroll e WHERE m.meet_id = e.meet_id AND e.mentee_id = $uid";
					$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					$count = mysqli_num_rows($result);
					
					while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
						echo "<tr>";
						echo "<td align='center'>$row[meet_id]</td>";
						echo "<td align='center'>$row[group_id]</td>";
						echo "<td align='center'>$row[date]</td>";
						$query = "SELECT * FROM time_slot WHERE time_slot_id = $row[time_slot_id]";
						$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
						$row2 = mysqli_fetch_array ($result2, MYSQLI_ASSOC);
						echo "<td align='center'>$row2[day_of_the_week] $row2[start_time] - $row2[end_time]</td>";
						echo "<td align='center'>mentee</td>";
						echo "</tr>";
					}
					
					$query = "SELECT * FROM meetings m, enroll2 e WHERE m.meet_id = e.meet_id AND e.mentor_id = $uid";
					$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					$count += mysqli_num_rows($result);
					while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
						echo "<tr>";
						echo "<td align='center'>$row[meet_id]</td>";
						echo "<td align='center'>$row[group_id]</td>";
						echo "<td align='center'>$row[date]</td>";
						$query = "SELECT * FROM time_slot WHERE time_slot_id = $row[time_slot_id]";
						$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
						$row2 = mysqli_fetch_array ($result2, MYSQLI_ASSOC);
						echo "<td align='center'>$row2[day_of_the_week] $row2[start_time] - $row2[end_time]</td>";
						echo "<td align='center'>mentor</td>";
						echo "</tr>";
					}
					echo "</div>";
					
					if ($count == 0){
						echo "<tr><td align='center' colspan=5>No Upcoming Meetings</td></tr>";
					}
					
					echo "</table>";
				
					echo "<div align='center'>";
					echo "<h4>Actions</h4>";
					if ($_SESSION['grade'] <= 9)	echo "<a href='http://localhost/Database2-Project/user_page.php'>Edit meetings (mentee)</a><br>";
					if ($_SESSION['grade'] >= 9)	echo "<a href='http://localhost/Database2-Project/user_page.php'>Edit meetings (mentor)</a><br>";
					echo "</div>";
				}
			?>
			
		</div>		
	</body
</html>