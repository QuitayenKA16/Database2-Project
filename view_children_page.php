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
			$_SESSION['back'] = "view_children_page.php";
			if (isset($_POST['table_view'])){
				$_SESSION['table_view'] = $_POST['table_view'];
				$_SESSION['table_sort'] = 'idAsc';
			}
			else if (isset($_POST['table_sort'])){
				$_SESSION['table_sort'] = $_POST['table_sort'];
			}
			unset($_SESSION['edit_uid']);
			$uid = $_SESSION['loggedUser']['uid'];
		?>
		
		<form action="view_children_page.php" method="post">
			<div align='center'>
				<h3>View Students</h3>
			</div>
			<br>
		
		<table style='width:100%'>
			<?php
				$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
				$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
				
				$query = "SELECT * FROM users u, students s WHERE u.uid = s.uid AND s.pid = "
					. $uid . " ORDER BY ";
				
				if ($_SESSION['table_sort']=='idAsc') $query .= "u.uid ASC";
				if ($_SESSION['table_sort']=='idDes') $query .= "u.uid DESC";
				if ($_SESSION['table_sort']=='fNameAsc') $query .= "u.firstName ASC";
				if ($_SESSION['table_sort']=='fNameDes') $query .= "u.firstName DESC";
				if ($_SESSION['table_sort']=='lNameAsc') $query .= "u.lastName ASC";
				if ($_SESSION['table_sort']=='lNameDes') $query .= "u.lastName DESC";
				if ($_SESSION['table_sort']=='uNameAsc') $query .= "u.username ASC";
				if ($_SESSION['table_sort']=='uNameDes') $query .= "u.username DESC";
				if ($_SESSION['table_sort']=='gradeAsc') $query .= "s.grade ASC";
				if ($_SESSION['table_sort']=='gradeDes') $query .= "s.grade DESC";
							
				echo $query . "<br>";
				
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
				
				echo "<th>Grade Level <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='gradeAsc') echo " value='gradeDes'>&#9660</button></th>";
				else echo " value='gradeAsc'>&#9650</button></th>";
				
				echo "<th>Edit</th></tr></form>";
						
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<form action='http://localhost/Database2-Project/edit_user_form.php' method='post'>";
					echo "<td>$row[uid]</td>";
					echo "<td>$row[firstName]</td>";
					echo "<td>$row[lastName]</td>";
					echo "<td>$row[email]</td>";
					echo "<td>$row[phoneNum]</td>";
					echo "<td>$row[username]</td>";
					echo "<td>$row[grade]</td>";
					echo "<td align='center'><button type='submit' name='edit_uid' value='$row[uid]'>EDIT</button></td>";
					echo "</form></tr>";
				}
			?>
		</table>
	</body
</html>