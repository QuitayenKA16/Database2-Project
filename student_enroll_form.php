<html>
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['message'])){
				echo "<br>$_SESSION[message]";
				unset($_SESSION['message']);
			}
			
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			
			if (isset($_POST['edit_uid']))
				$_SESSION['edit_uid'] = $_POST['edit_uid'];

			$uid = $_SESSION['edit_uid'];
			$query = "SELECT * FROM students WHERE student_id = $uid";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$student = mysqli_fetch_array ($result, MYSQLI_ASSOC);
			$grade = $student['grade'];
			
			$query = "SELECT * FROM users WHERE id = $uid";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
			$student_name = $row['name'];
			echo "<h2>Edit meeting enrollment: $student_name ($uid)</h2>";
		?>
		
		<form action="student_enroll.php" method="post">
		<?php
			if ($grade <= 9){
				echo "<div align='center'><h2>Mentee</h2>";
				
				$query = "SELECT * FROM groups WHERE description = $grade";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$group = mysqli_fetch_array ($result, MYSQLI_ASSOC);
				$group_id = $group['group_id'];
				$group_name = $group['name'];
				echo "<div><h3>$group_name</h3>";
				echo "<button type='submit' name='mentee_all' value='$group_id 0'>ENROLL ALL</button>";
				echo "<button type='submit' name='mentee_all' value='$group_id 1'>REMOVE ALL</button></div><br>";
				
				$query = "SELECT * FROM meetings m, time_slot t WHERE group_id = $group_id AND m.time_slot_id = t.time_slot_id ORDER BY m.date";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				echo "<table width=100% border='1'>";
				echo "<tr><th>MID</th><th>Name</th><th>Date</th><th>Timeslot</th><th>Capacity</th><th>Announcement</th><th>Status</th><th>Edit</th></tr>";
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td>$row[meet_id]</td>";
					echo "<td>$row[meet_name]</td>";
					echo "<td>$row[date]</td>";
					echo "<td>$row[start_time]-$row[end_time]</td>";
					echo "<td align='center'>$row[capacity]</td>";
					echo "<td>$row[announcement]</td>";
					$query = "SELECT * FROM enroll WHERE mentee_id = $uid AND meet_id = $row[meet_id]";		
					$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					echo "<td align='center'>";
					if (mysqli_num_rows($result2) == 1){
						echo "&#10004</td>";
						echo "<td align='center'><button type='submit' name='mentee_meet_id' value='$row[meet_id]1'>leave</button></td>";
					}
					else{
						echo "</td>";
						echo "<td align='center'><button type='submit' name='mentee_meet_id' value='$row[meet_id]0'>enroll</button></td>";
					}
					echo "</tr>";
				}
				
				echo "</table></div><br><hr>";
			}
			
			if ($grade >= 9){
				echo "<div align='center'><h2>Mentor</h2></div>";
				
				$query = "SELECT * FROM groups WHERE mentor_grade_req <= $grade";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					$group_id = $row['group_id'];
					$group_name = $row['name'];
					echo "<div align='center'>";
					echo "<h3>$group_name</h3>";
					echo "<button type='submit' name='mentor_all' value='$group_id 0'>ENROLL ALL</button>";
					echo "<button type='submit' name='mentor_all' value='$group_id 1'>REMOVE ALL</button></div><br>";
					
					$query = "SELECT * FROM meetings m, time_slot t WHERE group_id = $group_id AND m.time_slot_id = t.time_slot_id ORDER BY m.date";
					$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					echo "<table width=100% border='1'>";
					echo "<tr><th>MID</th><th>Name</th><th>Date</th><th>Timeslot</th><th>Capacity</th><th>Announcement</th><th>Status</th><th>Edit</th></tr>";
					while ($row2 = mysqli_fetch_array ($result2, MYSQLI_ASSOC)) {
						echo "<tr>";
						echo "<td>$row2[meet_id]</td>";
						echo "<td>$row2[meet_name]</td>";
						echo "<td>$row2[date]</td>";
						echo "<td>$row2[start_time]-$row2[end_time]</td>";
						echo "<td align='center'>$row2[capacity]</td>";
						echo "<td>$row2[announcement]</td>";
						$query = "SELECT * FROM enroll2 WHERE mentor_id = $uid AND meet_id = $row2[meet_id]";		
						$result3 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
						echo "<td align='center'>";
						if (mysqli_num_rows($result3) == 1){
							echo "&#10004</td>";
							echo "<td align='center'><button type='submit' name='mentor_meet_id' value='$row2[meet_id]1'>leave</button></td>";
						}
						else{
							echo "</td>";
							echo "<td align='center'><button type='submit' name='mentor_meet_id' value='$row2[meet_id]0'>enroll</button></td>";
						}
						echo "</tr>";
					}
					echo "</table></div><br><hr>";
				}
			}
		?>
		</form>
	</body
</html>