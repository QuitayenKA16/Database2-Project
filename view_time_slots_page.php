<html>
	<body>
		<?php
			include "header.php";
		?>

		<table width=100% border='1'>
			<div align='center'>
				<h2>View Time Slots</h2>
			</div>
			<?php
				$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
				$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
				$query = "SELECT * FROM time_slot";
	
				echo $query . "<br>";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
				
				echo "<tr><th>ID</th><th>Start Time</th><th>End Time</th><th>DOW</th></tr>";
				
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td>$row[time_slot_id]</td>";
					echo "<td>$row[start_time]</td>";
					echo "<td>$row[end_time]</td>";
					echo "<td>$row[day_of_the_week]</td>";
					echo "</tr>";
				}
			?>
		</form>
		</table>
	</body
</html>