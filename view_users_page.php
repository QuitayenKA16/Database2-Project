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
		label {
			display: inline-block;
			width: 25px;
		}
		
	</style>
	
	<body>
		<?php
			include "header.php";
			$_SESSION['table_view'] = (isset($_POST['table_view'])) ? $_POST['table_view'] : "default";

			if (isset($_POST['uidAsc'])) $_SESSION['sort'] = "uidAsc";
			if (isset($_POST['uidDes'])) $_SESSION['sort'] = "uidDes";
			if (isset($_POST['fNameAsc'])) $_SESSION['sort'] = "fNameAsc";
			if (isset($_POST['fNameDes'])) $_SESSION['sort'] = "fNameDes";
			if (isset($_POST['lNameAsc'])) $_SESSION['sort'] = "lNameAsc";
			if (isset($_POST['lNameDes'])) $_SESSION['sort'] = "lNameDes";
			if (isset($_POST['uNameAsc'])) $_SESSION['sort'] = "uNameAsc";
			if (isset($_POST['uNameDes'])) $_SESSION['sort'] = "uNameDes";
			if (isset($_POST['pidAsc'])) $_SESSION['sort'] = "pidAsc";
			if (isset($_POST['pidDes'])) $_SESSION['sort'] = "pidDes";
		?>
		
		<br>
		<form action="view_users_page.php" method="post">
			<label><b>View: </b></label>
			<select type="text" name="table_view">
				<?php
					echo "<option value='default'";
					if ($_SESSION['table_view'] == "default") echo " selected";
					echo ">Default(All)</option>";
					echo "<option value='parents'";
					if ($_SESSION['table_view'] == "parents") echo " selected";
					echo ">Parents</option>";
					echo "<option value='students'";
					if ($_SESSION['table_view'] == "students") echo " selected";
					echo ">Students</option>";
				?>
			</select>
			<input type="submit" style="font: normal 16px Verdana, Arial, sans-serif;" value="Set">

		
		<table style='width:100%'>
			<?php
				$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
				$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
				
				$sort = " ORDER BY ";
				
				if ($_SESSION['table_view'] == "students")
					$sort .= ($_SESSION['sort']=='pidAsc' || $_SESSION['sort']=='pidDes') ? "s." : "u.";
				
				if ($_SESSION['sort']=='uidAsc') $sort .= "uid ASC";
				if ($_SESSION['sort']=='uidDes') $sort .= "uid DESC";
				if ($_SESSION['sort']=='fNameAsc') $sort .= "firstName ASC";
				if ($_SESSION['sort']=='fNameDes') $sort .= "firstName DESC";
				if ($_SESSION['sort']=='lNameAsc') $sort .= "lastName ASC";
				if ($_SESSION['sort']=='lNameDes') $sort .= "lastName DESC";
				if ($_SESSION['sort']=='uNameAsc') $sort .= "username ASC";
				if ($_SESSION['sort']=='uNameDes') $sort .= "username DESC";
				if ($_SESSION['sort']=='pidAsc') $sort .= "pid ASC";
				if ($_SESSION['sort']=='pidDes') $sort .= "pid DESC";
			
				if ($_SESSION['table_view'] == "students"){
					$query = "SELECT * FROM users u, students s WHERE u.uid = s.uid" . $sort;
					echo "<caption>All Student Information</caption>";
				}
				
				else if ($_SESSION['table_view'] == "parents"){
					$query = "SELECT * FROM users WHERE uid IN (SELECT uid FROM parents)" . $sort;
					echo "<caption>All Parent Information</caption>";
				}
				else {
					$query = "SELECT * FROM users WHERE uid > 1" . $sort;
					echo "<caption>All User Information</caption>";
				}
				
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
				
				echo "<tr>
							<th><input type='submit' name='uidAsc' value='&#9650' />
							UID <input type='submit' name='uidDes' value='&#9660' /></th>
								
							<th><input type='submit' name='fNameAsc' value='&#9650' />
							First Name <input type='submit' name='fNameDes' value='&#9660' /></th>
								
							<th><input type='submit' name='lNameAsc' value='&#9650' />
							Last Name <input type='submit' name='lNameDes' value='&#9660' /></th>
								
							<th>Email</th>
								
							<th>Phone Number</th>
								
							<th><input type='submit' name='uNameAsc' value='&#9650' />
							Username <input type='submit' name='uNameDes' value='&#9660' /></th>";
							
				if ($_SESSION['table_view'] == "students"){
					echo "<th><input type='submit' name='pidAsc' value='&#9650' />
							 Parent Id <input type='submit' name='pidDes' value='&#9660' /></th>";
				}
				echo "</tr>";
							
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
		</form>
	</body
	
</html>