<html>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
	
	<body>
		<?php
			include "header.php";
		?>
		
		<br>
		<div style="border:solid" >
			<p>Blahhh<br>
		</div>
		
		<br>
		
			<table style='width:100%'>
			<caption>User Information</caption>
			<?php
				$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
				$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
				$query = "SELECT * FROM users WHERE uid > 1";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
				echo "<tr><th>UID</th><th>Name</th><th>Email</th><th>Phone Number</th><th>Username</th></tr>";
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td>$row[uid]</td>";
					echo "<td>$row[name]</td>";
					echo "<td>$row[email]</td>";
					echo "<td>$row[phoneNum]</td>";
					echo "<td>$row[username]</td>";
					echo "</tr>";
				}
			?>
		</table>
	</body
	
</html>