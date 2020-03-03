<html>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			margin-bottom: 50px;
		}
		label > span{
			width: 25px;
		}
	</style>
	
	<body>
		<?php
			include "header.php";
		?>

		<table style='width:100%'>
			<div align='center'>
				<h3>View Time Slots</h3>
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