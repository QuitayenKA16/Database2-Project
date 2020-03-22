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
		?>
		
		<div align='center'>
			<h2>User Information</h2>
			<p class="p1"><b>Name: </b> <?php echo "$name"; ?> <br>
			<p class="p1"><b>Email: </b> <?php echo "$email"; ?> <br>
			<p class="p1"><b>Phone Number: </b> <?php echo "$phone"; ?> <br>
			<p class="p1"><b>User type: </b>
				<?php
					echo "Student<br><p class='p1'><b>Grade Level: </b>$_SESSION[grade]<br>";
					echo "<p class='p1'><b>Parent ID: </b>";
						
					$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
					$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
					$query = "SELECT * FROM users u, students s WHERE u.id = $uid AND u.id = s.student_id";
					$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
					echo "$row[parent_id]";
				?>
			<br><br>
			<a href='<?php echo "$_SESSION[path]";?>edit_user_form.php'>Edit Details</a>
		</div><br><hr>
		
			<?php
				echo "<div align='center'>";
				$gid = $_SESSION['grade'] - 5;
					
				echo "<h2>Upcoming Meetings</h2>";
				echo "<table width=70% border='1'><tr><th>MID</th><th>GID</th><th>Announcement</th><th>Date</th><th>DOW</th><th>Time</th><th>Role</th></tr>";
					
				$query = "SELECT * FROM meetings m, enroll e WHERE m.meet_id = e.meet_id AND e.mentee_id = $uid AND m.date < DATE_ADD(CURDATE(), INTERVAL 1 WEEK)";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
					
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td align='center'>$row[meet_id]</td>";
					echo "<td align='center'>$row[group_id]</td>";
					echo "<td align='center'>$row[announcement]</td>";
					echo "<td align='center'>$row[date]</td>";
					$query = "SELECT * FROM time_slot WHERE time_slot_id = $row[time_slot_id]";
					$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					$row2 = mysqli_fetch_array ($result2, MYSQLI_ASSOC);
					echo "<td align='center'>$row2[day_of_the_week]</td>";
					echo "<td align='center'>$row2[start_time] - $row2[end_time]</td>";
					echo "<td align='center'>mentee</td>";
					echo "</tr>";
				}
					
				$query = "SELECT * FROM meetings m, enroll2 e WHERE m.meet_id = e.meet_id AND e.mentor_id = $uid AND m.date < DATE_ADD(CURDATE(), INTERVAL 1 WEEK)";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count += mysqli_num_rows($result);
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td align='center'>$row[meet_id]</td>";
					echo "<td align='center'>$row[group_id]</td>";
					echo "<td align='center'>$row[announcement]</td>";
					echo "<td align='center'>$row[date]</td>";
					$query = "SELECT * FROM time_slot WHERE time_slot_id = $row[time_slot_id]";
					$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					$row2 = mysqli_fetch_array ($result2, MYSQLI_ASSOC);
					echo "<td align='center'>$row2[day_of_the_week] $row2[start_time] - $row2[end_time]</td>";
					echo "<td align='center'>mentor</td>";
					echo "</tr>";
				}
					
				if ($count == 0)
					echo "<tr><td align='center' colspan=5>No Upcoming Meetings</td></tr>";
					
				echo "</table></div><br><hr>";
				echo "<div align='center'>";
				echo "<h2>Actions</h2>";
				echo "<a href='$_SESSION[path]student_enroll_form.php'>Edit meeting enrollment</a><br>";
				echo "<a href='$_SESSION[path]view_student_study_material_page.php'>View study material</a><br>";
				if ($_SESSION['grade'] >= 9)
					echo "<a href='$_SESSION[path]view_mentor_meeting_page.php'>View meetings (mentor)</a><br>";
			?>
		</div><br><hr>
	</body
</html>