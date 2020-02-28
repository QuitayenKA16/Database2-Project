<html>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			margin-bottom: 50px;
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
			$gid = $_SESSION['group']['group_id']
		?>
		
		<form action="view_members_page.php" method="post">
			<div align='center'>
				<br><a href='http://localhost/Database2-Project/group_page.php'>Back</a>
				<h3>View Group Members</h3>
			</div>
			<br>
		
		<table style='width:100%'>
			<?php
				$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
				$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
				
				$query = "SELECT * FROM users u, students s
							WHERE u.id = s.student_id AND s.grade = $gid + 5 ORDER BY ";
				
				if ($_SESSION['table_sort']=='idAsc') $query .= "u.id ASC";
				if ($_SESSION['table_sort']=='idDes') $query .= "u.id DESC";
				if ($_SESSION['table_sort']=='emailAsc') $query .= "u.email ASC";
				if ($_SESSION['table_sort']=='emailDes') $query .= "u.email DESC";
				if ($_SESSION['table_sort']=='nameAsc') $query .= "u.name ASC";
				if ($_SESSION['table_sort']=='nameDes') $query .= "u.name DESC";
							
				echo $query . "<br>";
				
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
				
				echo "<tr><th>ID <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='idAsc') echo " value='idDes'>&#9660</button></th>";
				else echo " value='idAsc'>&#9650</button></th>";
				
				echo "<th>Name <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='nameAsc') echo " value='nameDes'>&#9660</button></th>";
				else echo " value='nameAsc'>&#9650</button></th>";
				
				echo "<th>Email <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='emailAsc') echo " value='emailDes'>&#9660</button></th>";
				else echo " value='emailAsc'>&#9650</button></th>";
				
				echo "<th>Phone Number</th></tr></form>";
						
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td>$row[id]</td>";
					echo "<td>$row[name]</td>";
					echo "<td>$row[email]</td>";
					echo "<td>$row[phone]</td>";
					echo "</form></tr>";
				}
			?>
		</table>
	</body
</html>