<html>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			margin-bottom: 50px;
		}
		button[type=submit].class1 {
			font: normal 16px Verdana, Arial, sans-serif;
			background-color: #bfbfbf;
			color: white;
			text-decoration: none;
			cursor: pointer;
			width: 10%;
			height = 20px;
		}
		button[type=submit].class2 {
			font: normal 14px Verdana, Arial, sans-serif;
			background-color: #e6e6e6;
			color: black;
			border: none
			cursor: pointer;
		}
	</style>
	
	<body>
		<?php
			include "header.php";
			if (isset($_POST['table_view'])){
				$_SESSION['table_view'] = $_POST['table_view'];
				$_SESSION['table_sort'] = 'idAsc';
			}
			else if (isset($_POST['table_sort'])){
				$_SESSION['table_sort'] = $_POST['table_sort'];
			}
		?>
		
		<form action="view_users_page.php" method="post">
			<div align='center'>
				<h3>View Users</h3>
				<button type='submit' class='class1'<?php if ($_SESSION['table_view']=='default') echo "disabled='disabled'";?> name='table_view' value='default'/>All</button>
				<button type='submit' class='class1'<?php if ($_SESSION['table_view']=='admin') echo "disabled='disabled'";?> name='table_view' value='admin'/>Admin</button>
				<button type='submit' class='class1'<?php if ($_SESSION['table_view']=='parents') echo "disabled='disabled'";?> name='table_view' value='parents'/>Parents</button>
				<button type='submit' class='class1'<?php if ($_SESSION['table_view']=='students') echo "disabled='disabled'";?> name='table_view' value='students'/>Students</button>
			</div>
			<br><br>
		
		<table style='width:100%'>
			<?php
				$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
				$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
				
				$sort = " ORDER BY ";
				
				if ($_SESSION['table_view'] == "students")
					$sort .= ($_SESSION['table_sort']=='pidAsc' || $_SESSION['table_sort']=='pidDes') ? "s." : "u.";
				
				if ($_SESSION['table_sort']=='idAsc') $sort .= "uid ASC";
				if ($_SESSION['table_sort']=='idDes') $sort .= "uid DESC";
				if ($_SESSION['table_sort']=='fNameAsc') $sort .= "firstName ASC";
				if ($_SESSION['table_sort']=='fNameDes') $sort .= "firstName DESC";
				if ($_SESSION['table_sort']=='lNameAsc') $sort .= "lastName ASC";
				if ($_SESSION['table_sort']=='lNameDes') $sort .= "lastName DESC";
				if ($_SESSION['table_sort']=='uNameAsc') $sort .= "username ASC";
				if ($_SESSION['table_sort']=='uNameDes') $sort .= "username DESC";
				if ($_SESSION['table_sort']=='pidAsc') $sort .= "pid ASC";
				if ($_SESSION['table_sort']=='pidDes') $sort .= "pid DESC";
			
				if ($_SESSION['table_view'] == "students")
					$query = "SELECT * FROM users u, students s WHERE u.uid = s.uid" . $sort;
				else if ($_SESSION['table_view'] == "parents")
					$query = "SELECT * FROM users WHERE uid IN (SELECT uid FROM parents)" . $sort;
				else if ($_SESSION['table_view'] == "admin")
					$query = "SELECT * FROM users WHERE uid IN (SELECT uid FROM admins)" . $sort;
				else
					$query = "SELECT * FROM users" . $sort;
				
							
				//echo $query . "<br>";
				
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
				
				echo "<tr><th>UID <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='idAsc') echo " value='idDes'>&#9660</button></th>";
				else echo " value='idAsc'>&#9650</button></th>";
				
				echo "<th>First Name <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='fNameAsc') echo " value='fNameDes'>&#9660</button></th>";
				else echo " value='fNameAsc'>&#9650</button></th>";
				
				echo "<th>Last Name <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='lNameAsc') echo " value='lNameDes'>&#9660</button></th>";
				else echo " value='lNameAsc'>&#9650</button></th>";
				
				echo "<th>Email</th><th>Phone Number</th>";
				
				echo "<th>Username <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='uNameAsc') echo " value='uNameDes'>&#9660</button></th>";
				else echo " value='uNameAsc'>&#9650</button></th>";
				
				if ($_SESSION['table_view'] == "students"){
					echo "<th>Parent ID <button type='submit' class='class2' name='table_sort' ";
					if ($_SESSION['table_sort']=='pidAsc') echo " value='pidDes'>&#9660</button></th>";
					else echo " value='pidAsc'>&#9650</button></th>";
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