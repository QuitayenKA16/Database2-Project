<html>
	<style>
		* {
			box-sizing: border-box;
		}
		.column1{
			border-style: solid;
			float: left;
			padding: 10px;
			height: auto;
			min-height:317px;
			margin-top:15px;
		}
		p.p1 {
			font: normal 14px Verdana, Geneva, sans-serif;
			margin-left: 10px;
		}
		table {width:100%;}
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			margin-bottom: 50px;
		}
	</style>

	<body>
		<?php
			include "header.php";
			$edit_mid = (isset($_POST['edit_mid'])) ? $_POST['edit_mid'] : $_SESSION['meet']['meet_id'];
			
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			$query = "SELECT * FROM meetings m, time_slot t WHERE meet_id = $edit_mid AND m.time_slot_id = t.time_slot_id";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$_SESSION['meet'] = mysqli_fetch_assoc ($result);
			$gid = $_SESSION['meet']['group_id'];
			$mName = $_SESSION['meet']['meet_name'];
			$mDate = $_SESSION['meet']['date'];
			$mDayOfWeek = $_SESSION['meet']['day_of_the_week'];
			$mStartTime = $_SESSION['meet']['start_time'];
			$mEndTime = $_SESSION['meet']['end_time'];
			$mCapacity = $_SESSION['meet']['capacity'];
			$mAnnounce = $_SESSION['meet']['announcement'];
			
			$query = "SELECT * FROM groups WHERE group_id = $gid";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$_SESSION['group'] = mysqli_fetch_assoc ($result);
		?>
		<div align="center">
			<br><a href='http://localhost/Database2-Project/view_groups_page.php'>View Groups</a>
			<a href='http://localhost/Database2-Project/view_all_meetings_page.php'>View Meetings</a>
		</div>
		
		<div class="column1" style="background-color:#f2f2f2; width:40%;">
			<h3 align="center">Meeting Information</h3>
			<p class="p1"><b>MID: </b> <?php echo "$edit_mid"; ?> <br>
			<p class="p1"><b>GID: </b> <?php echo "$gid"; ?> <br>
			<p class="p1"><b>Name: </b> <?php echo "$mName"; ?> <br>
			<p class="p1"><b>Date: </b> <?php echo "$mDate"; ?> <br>
			<p class="p1"><b>Time Slot: </b> <?php echo "$mDayOfWeek $mStartTime - $mEndTime"; ?> <br>
			<p class="p1"><b>Capacity: </b> <?php echo "$mCapacity"; ?> <br>
			<p class="p1"><b>Announcement: </b> <?php echo "$mAnnounce"; ?> <br><br>
		</div>
		
		<div class="column1" align="center" style="width:30%;">
			<h3>Mentors</h3>
			<a href='http://localhost/Database2-Project/enroll_members_form.php'>Edit</a><br><br>
			<?php
				$query = "SELECT * FROM enroll2 WHERE meet_id = $edit_mid";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					$mentor_id = $row['mentor_id'];
					$query = "SELECT * FROM users WHERE id = $mentor_id";
					$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					$count = mysqli_num_rows($result2);
					$row2 = mysqli_fetch_array ($result2, MYSQLI_ASSOC);
					echo $row2['name'] . "<br>";
				}
			?>
		</div>
		<div class="column1" align="center" style="width:30%;">
			<h3 >Mentees</h3>
			<a href='http://localhost/Database2-Project/enroll_members_form.php'>Edit</a><br><br>
			<?php
				$query = "SELECT * FROM enroll WHERE meet_id = $edit_mid";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
					$mentee_id = $row['mentee_id'];
					$query = "SELECT * FROM users WHERE id = $mentee_id";
					$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
					$count = mysqli_num_rows($result2);
					$row2 = mysqli_fetch_array ($result2, MYSQLI_ASSOC);
					echo $row2['name'] . "<br>";
				}
			?>
		</div>
		<div class="column1" align="center" style="width:100%; min-height:200px; margin-bottom:25px">
			<br><h3 style="display: inline;">Study Material</h3>
			<a href='http://localhost/Database2-Project/assign_material_form.php'>Edit</a><br><br>
			<?php
				$query = "SELECT * FROM assign a, material m WHERE m.material_id = a.material_id AND a.meet_id = $edit_mid";
				$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
				echo "<table>";
				echo "<th>ID</th><th>Title</th><th>Author</th><th>Type</th><th>URL</th><th>Assigned Date</th><th>Notes</th>";
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)){
					echo "<tr>";
					echo "<td>$row[material_id]</td>";
					echo "<td>$row[title]</td>";
					echo "<td>$row[author]</td>";
					echo "<td>$row[type]</td>";
					echo "<td>$row[url]</td>";
					echo "<td>$row[assigned_date]</td>";
					echo "<td>$row[notes]</td>";
					echo "</tr>";
				}
				echo "</table></td></tr>";
			?>
		</div>
	</body
</html>