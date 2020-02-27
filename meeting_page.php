<html>
	<style>
		* {
			box-sizing: border-box;
		}
		.column1{
			border-style: solid;
			float: left;
			padding: 10px;
			height:300px;
			margin-top:15px;
		}
		p.p1 {
			font: normal 14px Verdana, Arial, sans-serif;
			margin-left: 10px;
		}
	</style>

	<body>
		<?php
			include "header.php";
			$_SESSION['back'] = "view_meetings_page.php";
			$edit_mid = (isset($_POST['edit_mid'])) ? $_POST['edit_mid'] : $_SESSION['meet']['meet_id'];
			
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			$query = "SELECT * FROM meetings WHERE meet_id = $edit_mid";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$_SESSION['meet'] = mysqli_fetch_assoc ($result);
			$mName = $_SESSION['meet']['meet_name'];
			$mDate = $_SESSION['meet']['date'];
			$mTime = $_SESSION['meet']['time_slot_id'];
			$mCapacity = $_SESSION['meet']['capacity'];
			$mAnnounce = $_SESSION['meet']['announcement'];
		?>
		
		<div class="column1" style="background-color:#f2f2f2; width:40%;">
			<h3 align="center">Meeting Information</h3>
			<p class="p1"><b>MID: </b> <?php echo "$edit_mid"; ?> <br>
			<p class="p1"><b>Name: </b> <?php echo "$mName"; ?> <br>
			<p class="p1"><b>Date: </b> <?php echo "$mDate"; ?> <br>
			<p class="p1"><b>Time Slot: </b> <?php echo "$mTime"; ?> <br>
			<p class="p1"><b>Capacity: </b> <?php echo "$mCapacity"; ?> <br>
			<p class="p1"><b>Announcement: </b> <?php echo "$mAnnounce"; ?> <br>

			<br><br><br>
		</div>
		
		<div class="column1" style="width:20%;">
			<h3 align="center">Mentors</h3>
			<?php
			?>
		</div>
		<div class="column1" style="width:20%;">
			<h3 align="center">Mentees</h3>
			<?php
			?>
		</div>
		<div class="column1" style="width:20%;">
			<h3 align="center">Study Crap</h3>
			<?php
			?>
		</div>
	</body
</html>