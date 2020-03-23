<html>
	<body>
		<?php
			include "header.php";
			$_SESSION['table_sort'] = (isset($_POST['table_sort'])) ? $_POST['table_sort'] : 'midAsc';
		?>

		<form action="view_all_meetings_page.php" method="post">
		<table width=100% border='1'>
			<div align='center'>
				<h2>View Meetings</h2>
			</div>
			<?php
				$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
				$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
				$sort = "";
				
				if ($_SESSION['table_sort']=='midAsc') $sort .= "m.meet_id ASC";
				if ($_SESSION['table_sort']=='midDes') $sort .= "m.meet_id DESC";
				if ($_SESSION['table_sort']=='gidAsc') $sort .= "m.group_id ASC";
				if ($_SESSION['table_sort']=='gidDes') $sort .= "m.group_id DESC";
				if ($_SESSION['table_sort']=='dateAsc') $sort .= "m.date ASC";
				if ($_SESSION['table_sort']=='dateDes') $sort .= "m.date DESC";
				if ($_SESSION['table_sort']=='capAsc') $sort .= "m.capacity ASC";
				if ($_SESSION['table_sort']=='capDes') $sort .= "m.capacity DESC";
				if ($_SESSION['table_sort']=='announceAsc') $sort .= "m.announcement ASC";
				if ($_SESSION['table_sort']=='announceDes') $sort .= "m.announcement DESC";
				
				$query = "SELECT * FROM meetings m, time_slot t WHERE m.time_slot_id = t.time_slot_id ORDER BY " . $sort;
	
				echo $query . "<br>";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				$count = mysqli_num_rows($result);
				
				echo "<tr><th>MID <button type='submit' name='table_sort' ";
				if ($_SESSION['table_sort']=='midAsc') echo " value='midDes'>&#9660</button></th>";
				else echo " value='midAsc'>&#9650</button></th>";
				
				echo "<th>GID <button type='submit' name='table_sort' ";
				if ($_SESSION['table_sort']=='gidAsc') echo " value='gidDes'>&#9660</button></th>";
				else echo " value='gidAsc'>&#9650</button></th>";
				
				echo "<th>Name</th>";
				
				echo "<th>Date <button type='submit' name='table_sort' ";
				if ($_SESSION['table_sort']=='dateAsc') echo " value='dateDes'>&#9660</button></th>";
				else echo " value='dateAsc'>&#9650</button></th>";
				
				echo "<th>DOW</th><th>Time</th><th>Capacity <button type='submit' name='table_sort' ";
				if ($_SESSION['table_sort']=='capAsc') echo " value='capDes'>&#9660</button></th>";
				else echo " value='capAsc'>&#9650</button></th>";
				
				echo "<th>Announcement <button type='submit' name='table_sort' ";
				if ($_SESSION['table_sort']=='announceAsc') echo " value='announceDes'>&#9660</button></th>";
				else echo " value='announceAsc'>&#9650</button></th>";
				
				echo "<th>Edit</th></form>";
				
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<form action='$_SESSION[path]meeting_page.php' method='post'>";
					echo "<td>$row[meet_id]</td>";
					echo "<td>$row[group_id]</td>";
					echo "<td>$row[meet_name]</td>";
					echo "<td>$row[date]</td>";
					echo "<td>$row[day_of_the_week]</td>";
					echo "<td>$row[start_time] - $row[end_time]</td>";
					echo "<td align='center'>$row[capacity]</td>";
					echo "<td>$row[announcement]</td>";
					echo "<td align='center'><button type='submit' name='edit_mid' value='$row[meet_id]'>DETAILS</button></td>";
					echo "</form></tr>";
				}
			?>
		</table>
	</body
</html>