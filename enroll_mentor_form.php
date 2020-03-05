<html>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			margin-bottom: 50px;
		}
	</style>
	
	<body>
		<?php
			include "header.php";
			if (isset($_SESSION['message'])){
				echo "<br>$_SESSION[message]";
				unset($_SESSION['message']);
			}
			$meet_id = $_SESSION['meet']['meet_id'];
			$group_id = $_SESSION['meet']['group_id'];
			
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			
			if (!isset($_SESSION['group'])){
				$query = "SELECT * FROM groups WHERE group_id = $group_id";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$_SESSION['group'] = mysqli_fetch_assoc ($result);
			}
			
			$g_desc = $_SESSION['group']['description'];
			$mentor_grade_req = $_SESSION['group']['mentor_grade_req'];
		?>
		
		<form action="enroll_mentor.php" method="post">
		
		<div align='center'>
			<br><a href='http://localhost/Database2-Project/meeting_page.php'>Back</a><br>
			<h3>Mentors</h3>
		</div>
		<table style='width:100%'>
			<?php
				$query = "SELECT * FROM users u, students s WHERE u.id = s.student_id AND s.grade >= $mentor_grade_req";
				echo "SELECT * FROM users u, students s WHERE u.id = s.student_id AND s.grade >= mentor_grade_req<br>";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
				
				echo "<tr><th>Student ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Status</th></tr>";
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					$count = 1;
					$nameStr = "mentor" . $count;
					echo "<tr>";
					echo "<td>$row[id]</td>";
					echo "<td>$row[name]</td>";
					echo "<td>$row[email]</td>";
					echo "<td>$row[phone]</td>";
					$query = "SELECT * FROM enroll2 WHERE mentor_id = $row[id] AND meet_id = $meet_id";		
					$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					echo "<td align='center'>";
					if (mysqli_num_rows($result2) == 1)
						echo "enrolled</td>";
					else{
						echo date('w', time());
						//echo "<button style='min-width:110px;' type='submit' name='mentor_id' value='$row[id]0'>ENROLL</button></td>";
						echo "</td>";
					}
					echo "</tr>";
					$count += 1;
				}
			?>
		</table>
		</form>
	</body
</html>