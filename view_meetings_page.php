<html>
	<body>
		<?php
			include "header.php";
			if (isset( $_SESSION['group']))
				$gid = $_SESSION['group']['group_id'];
		?>

		<form action="meeting_page.php" method="post">
		<table width=100% border='1'>
			<div align='center'>
				<br><a href='<?php echo "$_SESSION[path]";?>group_page.php'>Back</a>
				<h2>View Meetings</h2>
			</div>
			<?php
				$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
				$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
				$query = "SELECT * FROM meetings m, time_slot t WHERE m.group_id = $gid AND m.time_slot_id = t.time_slot_id ORDER BY m.date";
	
				echo $query . "<br>";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
				
				echo "<tr><th>MID</th><th>Name</th><th>Date</th><th>DOW</th><th>Time</th>
				<th>Capacity</th><th>Announcement</th><th>View</th>";
				
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<form action='$_SESSION[path]meeting_page.php' method='post'>";
					echo "<td>$row[meet_id]</td>";
					echo "<td>$row[meet_name]</td>";
					echo "<td>$row[date]</td>";
					echo "<td>$row[day_of_the_week]</td>";
					echo "<td>$row[start_time] - $row[end_time]</td>";
					echo "<td>$row[capacity]</td>";
					echo "<td>$row[announcement]</td>";
					echo "<td align='center'><button type='submit' name='edit_mid' value='$row[meet_id]'>DETAILS</button></td>";
					echo "</form></tr>";
				}
			?>
		</form>
		</table>
	</body
</html>