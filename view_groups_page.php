<html>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			margin-bottom: 50px;
		}
		div {
			border-style: solid;
			padding-top: 10px;
			padding-right: 10px;
			padding-bottom: 10px;
			padding-left: 10px;
		}
	</style>
	
	<body>
		<?php
			include "header.php";
		?>
		
		<br>
		
		<table style='width:100%'>
			<caption>Group Information</caption>
			<?php
				$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
				$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
				$query = "SELECT * FROM groups";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
				echo "<tr><th>GID</th><th>Name</th><th>Description</th><th>Grade Level</th></tr>";
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td>$row[gid]</td>";
					echo "<td>$row[name]</td>";
					echo "<td>$row[description]</td>";
					echo "<td>$row[gradeLvl]</td>";
					echo "</tr>";
				}
			?>
		</table>
	</body
	
</html>