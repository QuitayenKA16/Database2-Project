<html>	
	<body>
		<?php
			include "header.php";
			$uid = $_SESSION['loggedUser']['id'];
			$grade = $_SESSION['grade'];
		?>

		<div align='center'>
			<h2>View Study Material</h2>
		</div>
		<?php
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
				
			if ($grade <= 9){
				$query = "SELECT * FROM groups WHERE description = $grade";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$group_id = (mysqli_fetch_array($result, MYSQLI_ASSOC))['group_id'];
					
				$query = "SELECT * FROM meetings WHERE group_id = $group_id";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					
				echo "<h3 align='center'>Mentee</h3>";
				echo "<table width=100% border='1'>";
				echo "<tr><th>MID</th><th>GID</th><th>Title</th><th>Author</th><th>Type</th><th>URL</th><th>Assigned Date</th><th>Notes</th>";
					
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)){
					$meet_id = $row['meet_id'];
					$query = "SELECT * FROM assign WHERE meet_id = $meet_id";
					$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
						
					if (mysqli_num_rows($result2) > 0){
						$material_id = (mysqli_fetch_array($result2, MYSQLI_ASSOC))['material_id'];
						$query = "SELECT * FROM material WHERE material_id = $material_id ORDER BY assigned_date";
						$result3 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
						
						while ($row2 = mysqli_fetch_array ($result3, MYSQLI_ASSOC)) {
							echo "<tr>";
							echo "<td>$row2[material_id]</td>";
							echo "<td>$group_id</td>";
							echo "<td>$row2[title]</td>";
							echo "<td>$row2[author]</td>";
							echo "<td>$row2[type]</td>";
							echo "<td>$row2[url]</td>";
							echo "<td>$row2[assigned_date]</td>";
							echo "<td>$row2[notes]</td>";
							echo "</tr>";
						}
					}
				}
				echo "</table><br><hr>";
			}
				
			if ($grade >= 9){
				echo "<h3 align='center'>Mentor</h3>";
				echo "<table width=100% border='1'>";
				echo "<tr><th>MID</th><th>GID</th><th>Title</th><th>Author</th><th>Type</th><th>URL</th><th>Assigned Date</th><th>Notes</th>";
				
				$query = "SELECT * FROM enroll2 WHERE mentor_id = $uid";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)){
					$meet_id = $row['meet_id'];
					$query = "SELECT * FROM meetings WHERE meet_id = $meet_id";
					$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					$group_id = (mysqli_fetch_array($result2, MYSQLI_ASSOC))['group_id'];
					$query = "SELECT * FROM assign WHERE meet_id = $meet_id";
					$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					 
					if (mysqli_num_rows($result2) > 0){
						$material_id = (mysqli_fetch_array($result2, MYSQLI_ASSOC))['material_id'];
						$query = "SELECT * FROM material WHERE material_id = $material_id ORDER BY assigned_date";
						$result3 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
						
						while ($row2 = mysqli_fetch_array ($result3, MYSQLI_ASSOC)) {
							echo "<tr>";
							echo "<td>$row2[material_id]</td>";
							echo "<td>$group_id</td>";
							echo "<td>$row2[title]</td>";
							echo "<td>$row2[author]</td>";
							echo "<td>$row2[type]</td>";
							echo "<td>$row2[url]</td>";
							echo "<td>$row2[assigned_date]</td>";
							echo "<td>$row2[notes]</td>";
							echo "</tr>";
						}
					}
				}
				echo "</table><br><hr>";
			}
		?>
	</body
</html>