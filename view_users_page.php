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
			$_SESSION['table_view'] = (isset($_POST['view'])) ? $_POST['view'] : "default";
		?>
		
		<br>
		
		<form action="view_users_page.php" method="post">
			<label for="field8"><span><b>View: </b></span></label>
			<select type="text" name="view">
				<?php
					echo "<option value='default'";
					if ($_SESSION['table_view'] == "default") echo " selected";
					echo ">All</option>";
					echo "<option value='parents'";
					if ($_SESSION['table_view'] == "parents") echo " selected";
					echo ">Parents</option>";
					echo "<option value='students'";
					if ($_SESSION['table_view'] == "students") echo " selected";
					echo ">Students</option>";
				?>
			</select>
			<input type="submit">
		</form>
		
		
		<table style='width:100%'>
			<?php
				$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
				$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
				
				if ($_SESSION['table_view'] == "parents"){
					$query = "SELECT * FROM users WHERE uid IN (SELECT uid FROM parents) ORDER BY uid ASC";
					echo "<caption>All Parent Information</caption>";
				}
				else if ($_SESSION['table_view'] == "students"){
					//$query = "SELECT * FROM users WHERE uid IN (SELECT uid FROM students) ORDER BY uid ASC";
					$query = "SELECT * FROM users u, students s WHERE u.uid = s.uid ORDER BY u.uid";
					echo "<caption>All Student Information</caption>";
				}
				else {
					$query = "SELECT * FROM users WHERE uid > 1";
					echo "<caption>All User Information</caption>";
				}
				
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
				
				if ($_SESSION['table_view'] == "students")
					echo "<tr><th>UID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Username</th><th>Parent ID</th></tr>";
				else
					echo "<tr><th>UID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Username</th></tr>";
				
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td>$row[uid]</td>";
					echo "<td>$row[firstName]</td>";
					echo "<td>$row[lastName]</td>";
					echo "<td>$row[email]</td>";
					echo "<td>$row[phoneNum]</td>";
					echo "<td>$row[username]</td>";
					if ($_SESSION['table_view'] == "students")
						echo "<td>$row[pid]</td>";
					echo "</tr>";
				}
			?>
		</table>
	</body
	
</html>