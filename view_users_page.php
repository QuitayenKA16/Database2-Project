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
			unset($_SESSION['edit_uid']);
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
					$sort .= ($_SESSION['table_sort']=='pidAsc' || $_SESSION['table_sort']=='pidDes'
								|| $_SESSION['table_sort']=='gradeAsc' || $_SESSION['table_sort']=='gradeDes') ? "s." : "u.";
				
				if ($_SESSION['table_sort']=='idAsc') $sort .= "id ASC";
				if ($_SESSION['table_sort']=='idDes') $sort .= "id DESC";
				if ($_SESSION['table_sort']=='nameAsc') $sort .= "name ASC";
				if ($_SESSION['table_sort']=='nameDes') $sort .= "name DESC";
				if ($_SESSION['table_sort']=='emailAsc') $sort .= "email ASC";
				if ($_SESSION['table_sort']=='emailDes') $sort .= "email DESC";
				if ($_SESSION['table_sort']=='pidAsc') $sort .= "parent_id ASC";
				if ($_SESSION['table_sort']=='pidDes') $sort .= "parent_id DESC";
				if ($_SESSION['table_sort']=='gradeAsc') $sort .= "grade ASC";
				if ($_SESSION['table_sort']=='gradeDes') $sort .= "grade DESC";
			
				if ($_SESSION['table_view'] == "students")
					$query = "SELECT * FROM users u, students s WHERE u.id = s.student_id" . $sort;
				else if ($_SESSION['table_view'] == "parents")
					$query = "SELECT * FROM users WHERE id IN (SELECT parent_id FROM parents)" . $sort;
				else if ($_SESSION['table_view'] == "admin")
					$query = "SELECT * FROM users WHERE id IN (SELECT admin_id FROM admins)" . $sort;
				else
					$query = "SELECT * FROM users" . $sort;
				
							
				echo $query . "<br>";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				
				echo "<tr><th>ID <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='idAsc') echo " value='idDes'>&#9660</button></th>";
				else echo " value='idAsc'>&#9650</button></th>";
				
				echo "<th>Name <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='nameAsc') echo " value='nameDes'>&#9660</button></th>";
				else echo " value='nameAsc'>&#9650</button></th>";
	
				echo "<th>Email <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='emailAsc') echo " value='emailDes'>&#9660</button></th>";
				else echo " value='emailAsc'>&#9650</button></th>";
				
				echo "<th>Phone Number</th>";
				
				if ($_SESSION['table_view'] == "students"){
					echo "<th>Parent ID <button type='submit' class='class2' name='table_sort' ";
					if ($_SESSION['table_sort']=='pidAsc') echo " value='pidDes'>&#9660</button></th>";
					else echo " value='pidAsc'>&#9650</button></th>";
					echo "<th>Grade <button type='submit' class='class2' name='table_sort' ";
					if ($_SESSION['table_sort']=='gradeAsc') echo " value='gradeDes'>&#9660</button></th>";
					else echo " value='gradeAsc'>&#9650</button></th>";
				}
				echo "<th>Edit</th></tr></form>";
							
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<form action='http://localhost/Database2-Project/edit_user_form.php' method='post'>";
					echo "<td>$row[id]</td>";
					echo "<td>$row[name]</td>";
					echo "<td>$row[email]</td>";
					echo "<td>$row[phone]</td>";
					if ($_SESSION['table_view'] == "students"){
						echo "<td>$row[parent_id]</td>";
						echo "<td>$row[grade]</td>";
					}
					
					$query = "SELECT * FROM admins WHERE admin_id = $row[id]";
					$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					$row2 = mysqli_fetch_array ($result2, MYSQLI_ASSOC);
					echo "<td align='center'>";
					if (mysqli_num_rows($result2) != 1)
						echo "<button type='submit' name='edit_uid' value='$row[id]'>EDIT</button>";
					echo "</td></form></tr>";
				}
			?>
		</table>
		</form>
	</body
</html>