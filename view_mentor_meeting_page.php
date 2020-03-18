<html>
	<style>
		* {
			box-sizing: border-box;
		}
		.column1{
			border-style: solid;
			float: left;
			padding: 10px 10px 0px;
			height: auto;
			min-height:312px;
			margin-bottom: 25px;
		}
		p.p1 {
			font: normal 14px Verdana, Geneva, sans-serif;
			margin-left: 10px;
		}
	</style>
	
	<body>
		<?php
			include "header.php";
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
		?>

		<form action="view_mentor_meeting_page.php" method="post">
			<div align='center'>
				<h3>View Meetings as Mentor</h3>
				<?php
					$query = "SELECT * FROM enroll2 WHERE mentor_id = $_SESSION[edit_uid]";
					$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());

					if (mysqli_num_rows($result) > 0) {
						echo "<select name='edit_mid'>";
						
						$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
						$meet_id = $row['meet_id'];
						echo "<option value='$meet_id'><b>MID: </b>$meet_id</option>";
						$edit_mid = (isset($_POST['edit_mid'])) ? $_POST['edit_mid'] : $meet_id;
						
						while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
							$meet_id = $row['meet_id'];
							echo "<option value='$meet_id'><b>MID: </b>$meet_id</option>";
						}
						echo "</select>";
						echo "<button style='margin-left:10px;' type='submit' style='font: normal 16px Verdana, Geneva, sans-serif;'>Select</button>";
						echo "</div>";
					
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
							<?php
								$emailList = "<b>Emails:</b><br>";
								$query = "SELECT * FROM enroll2 WHERE meet_id = $edit_mid";
								$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
								while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
									$mentor_id = $row['mentor_id'];
									$query = "SELECT * FROM users WHERE id = $mentor_id";
									$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
									$count = mysqli_num_rows($result2);
									$row2 = mysqli_fetch_array ($result2, MYSQLI_ASSOC);
									echo "$row2[name]<br>";
									$emailList .= "$row2[email]<br>";
								}
								echo "<br><br>" . $emailList;
							?>
						</div>
						<div class="column1" align="center" style="width:30%;">
							<h3 >Mentees</h3>
							<?php
								$emailList = "<b>Emails:</b><br>";
								$query = "SELECT * FROM enroll WHERE meet_id = $edit_mid";
								$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
								while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
									$mentee_id = $row['mentee_id'];
									$query = "SELECT * FROM users WHERE id = $mentee_id";
									$result2 = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
									$count = mysqli_num_rows($result2);
									$row2 = mysqli_fetch_array ($result2, MYSQLI_ASSOC);
									echo "$row2[name]<br>";
									$emailList .= "$row2[email]<br>";
								}
								echo "<br><br>" . $emailList;
							?>
						</div>
					<?php
					echo "</form>";
					}
					else {
						echo "<p>You are not enrolled as a mentor in any meetings.</p>";
						echo "<p>Find meetings to mentor: <a href='http://localhost/Database2-Project/student_enroll_form.php'>Edit Meetings</a></p>";
						echo "</div></form>";
					}
				?>
	</body
</html>