<html>
	<body>
		<?php
			include "header.php";
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
		?>

		<table width=100% border='1'>
			<div align='center'>
				<h2>View Study Material</h2>
			</div>
			<?php
				$query = "SELECT * FROM material";
				echo $query . "<br>";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				
				echo "<tr><th>ID</th><th>Title</th><th>Author</th><th>Type</th><th>URL</th><th>Assigned Date</th><th>Notes</th>";
				
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)){
					echo "<tr>";
					echo "<td>$row[material_id]</td>";
					echo "<td>$row[title]</td>";
					echo "<td>$row[author]</td>";
					echo "<td>$row[type]</td>";
					echo "<td>$row[url]</td>";
					echo "<td>$row[assigned_date]</td>";
					echo "<td>$row[notes]</td>";
					echo "</tr>";
				}
			?>
		</table>
	</body
</html>