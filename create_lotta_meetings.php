<html>
	<body>
		<?php
			include "header.php";
			$_SESSION['message'] = "";
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			
			$query = "SELECT * FROM groups";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			
			while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
				$count = 1;
				$satDate = strtotime("2020-09-05");
				$sunDate = strtotime("2020-09-06");
				$group_id = $row['group_id'];
				while ($satDate < strtotime("2020-12-31")){
					$satStr = date('yy-m-d', $satDate);
					$sunStr = date('yy-m-d', $sunDate);
					$meet_name = ($group_id + 5) . "th Grade Meeting " . $count;
					$sql = "INSERT INTO meetings (meet_name, date, time_slot_id, capacity, announcement, group_id)
						VALUES ($meet_name, $satStr, 0, '', $group_id)";
					//$_SESSION['message'] .= $sql . "<br>";
					
					$count += 1;
					$meet_name = ($group_id + 5) . "th Grade Meeting " . $count;
					$sql = "INSERT INTO meetings (meet_name, date, time_slot_id, capacity, announcement, group_id)
						VALUES ($meet_name, $sunStr, 0, '', $group_id)";
					//$_SESSION['message'] .= $sql . "<br>";
					
					$count += 1;
					$satDate = strtotime("+7 day", $satDate);
					$sunDate = strtotime("+7 day", $sunDate);
				}
			}
		?>
	</body>
</html>