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
			if (isset($_POST['table_sort']))
				$_SESSION['table_sort'] = $_POST['table_sort'];
		?>

		<form action="view_groups_page.php" method="post">
		<table style='width:100%'>
			<div align='center'>
			<h3>View Groups</h3>
			</div>
			<?php
				$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
				$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
				$query = "SELECT * FROM groups ORDER BY ";
				
				if ($_SESSION['table_sort']=='idAsc') $query .= "group_id ASC";
				if ($_SESSION['table_sort']=='idDes') $query .= "group_id DESC";
				if ($_SESSION['table_sort']=='nameAsc') $query .= "name ASC";
				if ($_SESSION['table_sort']=='nameDes') $query .= "name DESC";
				if ($_SESSION['table_sort']=='menteeGradeAsc') $query .= "mentee_grade_req ASC";
				if ($_SESSION['table_sort']=='menteeGradeDes') $query .= "mentee_grade_req DESC";
				if ($_SESSION['table_sort']=='mentorGradeAsc') $query .= "mentor_grade_req ASC";
				if ($_SESSION['table_sort']=='mentorGradeDes') $query .= "mentor_grade_req DESC";
				
				echo $query . "<br>";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
				
				echo "<tr><th>GID <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='idAsc') echo " value='idDes'>&#9660</button></th>";
				else echo " value='idAsc'>&#9650</button></th>";
				
				echo "<th>Name <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='nameAsc') echo " value='nameDes'>&#9660</button></th>";
				else echo " value='nameAsc'>&#9650</button></th>";
				
				echo "<th>Description</th>";
				
				echo "<th>Mentee Grade <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='menteeGradeAsc') echo " value='menteeGradeDes'>&#9660</button></th>";
				else echo " value='menteeGradeAsc'>&#9650</button></th>";
				
				echo "<th>Mentor Grade <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='mentorGradeAsc') echo " value='mentorGradeDes'>&#9660</button></th>";
				else echo " value='mentorGradeAsc'>&#9650</button></th>";
				
				echo "<th>Details</th></tr></form>";
				
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<form action='http://localhost/Database2-Project/group_page.php' method='post'>";
					echo "<td>$row[group_id]</td>";
					echo "<td>$row[name]</td>";
					echo "<td>$row[description]</td>";
					echo "<td>$row[mentee_grade_req]</td>";
					echo "<td>$row[mentor_grade_req]</td>";
					echo "<td align='center'><button type='submit' name='edit_gid' value='$row[group_id]'>VIEW</button>";
					echo "</form></tr>";
				}
			?>
		</form>
		</table>
	</body
</html>