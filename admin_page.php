<html>
	<style>
		* {
			box-sizing: border-box;
		}
		.column1{
			border-style: solid;
			float: left;
			padding: 10px;
			min-height: 350px;
			height: auto;
			margin-top: 15px;
			margin-bottom: px;
			position: relative;
		}
		.column1 > span {
			position: absolute;
			bottom: 0;
			right: 0;
		}
		p.p1 {
			font: normal 16px Verdana, Geneva, sans-serif;
			margin-left: 10px;
		}
		h4 {
			margin: 20px 0px 5px 0px;
		}
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			margin-bottom: 25px;
		}
		table {
			width: 95%;
		}
		button.linkBtn {
			background-color: transparent;
			outline: none;
			border: none;
			overflow: hidden;
			text-decoration: underline;
			cursor: pointer;
			color: #2c87f0;
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
			<p class="p1"><b>User type: </b>Admin<br>
			<br><br><br><br><br>
			<a href='http://localhost/Database2-Project/edit_user_form.php'>Edit Details</a>
		</div>
	
		<div class='column1' style='width:60%;'>
			<div align='center'>
				<h3>Actions</h3>
				<h4>Views/Edit</h4>
				<a href='http://localhost/Database2-Project/view_users_page.php'>View users</a><br>
				<a href='http://localhost/Database2-Project/view_groups_page.php'>View groups</a><br>
				<a href='http://localhost/Database2-Project/view_time_slots_page.php'>View time slots</a><br>
				<a href='http://localhost/Database2-Project/view_all_meetings_page.php'>View meetings</a><br>
				<a href='http://localhost/Database2-Project/view_study_material_page.php'>View study materials</a><br><br>

				<h4>Create</h4>
				<a href='http://localhost/Database2-Project/create_admin_form.php'>Create new admin account</a><br>
				<a href='http://localhost/Database2-Project/create_time_slot_form.php'>Create new time slot</a><br>
			</div>
		</div>	
		
		<div class='column1' align='center' style='width:100%; margin-bottom:25px;'>
			<h3>Finalize Meetings</h3>
			<?php
				$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
				$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
				
				echo "<b>Next deadline: </b>" . date('l yy-m-d', strtotime('next week')) . "<br><br>";
				$query = "SELECT * FROM meetings WHERE date > CURDATE() AND date < DATE_ADD(CURDATE(), INTERVAL 1 WEEK)";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				
				echo "<table><tr><th>MID</th><th>GID</th><th>Date</th><th>Day of Week</th><th>Timeslot</th>
						<th>Mentors (min. 1)</th><th>Mentees (min. 3)</th><th>Study Material</th><th>Edit</th><th>Cancel</th></tr>";
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td align='center'>$row[meet_id]</td>";
					echo "<td align='center'>$row[group_id]</td>";
					echo "<td align='center'>$row[date]</td>";
					
					$query = "SELECT * FROM time_slot WHERE time_slot_id = $row[time_slot_id]";
					$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					$row2 = mysqli_fetch_array ($result2, MYSQLI_ASSOC);
					echo "<td align='center'>$row2[day_of_the_week]</td>";
					echo "<td align='center'>$row2[start_time] - $row2[end_time]</td>";
					
					$query = "SELECT mentee_id from enroll WHERE meet_id = $row[meet_id]";
					$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					$menteeCnt = mysqli_num_rows($result2);
					$query = "SELECT mentor_id from enroll2 WHERE meet_id = $row[meet_id]";
					$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					$mentorCnt = mysqli_num_rows($result2);
					
					if ($mentorCnt < 2)
						echo "<td align='center' style='color:red;'>$mentorCnt</td>";
					else 
						echo "<td align='center'>$mentorCnt</td>";
					
					if ($menteeCnt < 3)
						echo "<td align='center' style='color:red;'>$menteeCnt</td>";
					else 
						echo "<td align='center'>$menteeCnt</td>";
					
					$query = "SELECT * from assign WHERE meet_id = $row[meet_id]";
					$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					$materialCnt = mysqli_num_rows($result2);
					echo "<td align='center'>$materialCnt</td>";
					
					echo "<form action='http://localhost/Database2-Project/meeting_page.php' method='post'>";
					echo "<td align='center'><button class='linkBtn' type='submit' name='edit_mid' value='$row[meet_id]'>Details</button></td></form>";
					
					echo "<form action='http://localhost/Database2-Project/cancel_meeting_form.php' method='post'>";
					echo "<td align='center'><button type='submit' name='edit_mid' value='$row[meet_id]'>CANCEL</button></td></form>";
					
					echo "</tr>";
				}
				
				echo "</table></div>";
		?>
		
	</body
</html>