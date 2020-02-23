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
			$_SESSION['back'] = "view_groups_page.php";
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
				
				if ($_SESSION['table_sort']=='idAsc') $query .= "gid ASC";
				if ($_SESSION['table_sort']=='idDes') $query .= "gid DESC";
				if ($_SESSION['table_sort']=='nameAsc') $query .= "name ASC";
				if ($_SESSION['table_sort']=='nameDes') $query .= "name DESC";
				if ($_SESSION['table_sort']=='gradeAsc') $query .= "gradeLvl ASC";
				if ($_SESSION['table_sort']=='gradeDes') $query .= "gradeLvl DESC";
				
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
				
				echo "<th>Grade Level <button type='submit' class='class2' name='table_sort' ";
				if ($_SESSION['table_sort']=='gradeAsc') echo " value='gradeDes'>&#9660</button></th>";
				else echo " value='gradeAsc'>&#9650</button></th>";
				
				echo "<th>Meetings</th></tr></form>";
				
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<form action='http://localhost/Database2-Project/group_page.php' method='post'>";
					echo "<td>$row[gid]</td>";
					echo "<td>$row[name]</td>";
					echo "<td>$row[description]</td>";
					echo "<td>$row[gradeLvl]</td>";
					echo "<td align='center'><button type='submit' name='edit_uid' value='$row[gid]'>VIEW</button>";
					echo "</td></form></tr>";
				}
			?>
		</table>
	</body
	
</html>