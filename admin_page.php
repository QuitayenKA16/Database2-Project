<html>
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
			
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
		?>
		
		<div align="center">
			<h2>User Information</h2>
			<p><b>Name: </b> <?php echo "$name"; ?> <br>
			<p><b>Email: </b> <?php echo "$email"; ?> <br>
			<p><b>Phone Number: </b> <?php echo "$phone"; ?> <br>
			<p><b>User type: </b>Admin<br><br>
			<a href='<?php echo "$_SESSION[path]";?>edit_user_form.php'>Edit Details</a>
		</div><br><hr>
	
		<div align='center'>
			<h2>Actions</h2>
			<h3>Views/Edit</h3>
			<a href='<?php echo "$_SESSION[path]";?>view_users_page.php'>View users</a><br>
			<a href='<?php echo "$_SESSION[path]";?>view_groups_page.php'>View groups</a><br>
			<a href='<?php echo "$_SESSION[path]";?>view_time_slots_page.php'>View time slots</a><br>
			<a href='<?php echo "$_SESSION[path]";?>view_all_meetings_page.php'>View meetings</a><br>
			<a href='<?php echo "$_SESSION[path]";?>view_study_material_page.php'>View study materials</a><br><br>

			<h3>Create</h3>
			<a href='<?php echo "$_SESSION[path]";?>create_admin_form.php'>Create new admin account</a><br>
			<a href='<?php echo "$_SESSION[path]";?>create_time_slot_form.php'>Create new time slot</a><br>
		</div><br><hr>
		
		<div align='center'>
			<h2>Finalize Meetings</h2>
			<b>Next deadline: </b><?php echo date('l yy-m-d', strtotime('next week'));?><br><br>
			<table width=90% border="1">
			<tr><th>MID</th><th>GID</th><th>Date</th><th>Day of Week</th><th>Timeslot</th><th>Mentors (min. 1)</th><th>Mentees (min. 3)</th><th>Study Material</th><th>Edit</th><th>Cancel</th></tr>
			<?php
				$query = "SELECT * FROM meetings WHERE date > CURDATE() AND date < DATE_ADD(CURDATE(), INTERVAL 1 WEEK)";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td align='center'>$row[meet_id]</td>";
					echo "<td align='center'>$row[group_id]</td>";
					echo "<td align='center'>$row[date]</td>";
					
					$time_slot =  mysqli_fetch_array (mysqli_query($myconnection, "SELECT * FROM time_slot WHERE time_slot_id = $row[time_slot_id]"), MYSQLI_ASSOC);
					echo "<td align='center'>$time_slot[day_of_the_week]</td>";
					echo "<td align='center'>$time_slot[start_time] - $time_slot[end_time]</td>";
					
					$menteeCnt = mysqli_num_rows(mysqli_query($myconnection, "SELECT mentee_id from enroll WHERE meet_id = $row[meet_id]"));
					$mentorCnt = mysqli_num_rows(mysqli_query($myconnection, "SELECT mentor_id from enroll2 WHERE meet_id = $row[meet_id]"));
					
					if ($mentorCnt < 2)
						echo "<td align='center' style='color:red;'>$mentorCnt</td>";
					else 
						echo "<td align='center'>$mentorCnt</td>";
					
					if ($menteeCnt < 3)
						echo "<td align='center' style='color:red;'>$menteeCnt</td>";
					else 
						echo "<td align='center'>$menteeCnt</td>";
					
					$materialCnt = mysqli_num_rows(mysqli_query($myconnection, "SELECT * from assign WHERE meet_id = $row[meet_id]"));
					echo "<td align='center'>$materialCnt</td>";
					
					echo "<form action='$_SESSION[path]meeting_page.php' method='post'>";
					echo "<td align='center'><button type='submit' name='edit_mid' value='$row[meet_id]'>Details</button></td></form>";
					
					echo "<form action='$_SESSION[path]cancel_meeting_form.php' method='post'>";
					echo "<td align='center'><button type='submit' name='edit_mid' value='$row[meet_id]'>CANCEL</button></td></form>";
					
					echo "</tr>";
				}
			?>
			</table><br>
		</div><hr>
	</body>
</html>