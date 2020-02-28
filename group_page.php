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
			width:50%;
		}
		p.p1 {
			font: normal 14px Verdana, Arial, sans-serif;
			margin-left: 10px;
		}
	</style>

	<body>
		<?php
			include "header.php";
			$_SESSION['table_view'] = 'default';
			$_SESSION['table_sort'] = 'idAsc';
			$edit_gid = (isset($_POST['edit_gid'])) ? $_POST['edit_gid'] : $_SESSION['group']['group_id'];
			
			$myconnection = mysqli_connect('localhost', 'root', '') or die ('Could not connect: ' . mysql_error());
			$mydb = mysqli_select_db ($myconnection, 'db2') or die ('Could not select database');
			$query = "SELECT * FROM groups WHERE group_id = $edit_gid";
			$result = mysqli_query($myconnection, $query) or die ('Query failed: ' . mysql_error());
			$_SESSION['group'] = mysqli_fetch_assoc ($result);
			$gid = $_SESSION['group']['group_id'];
			$gName = $_SESSION['group']['name'];
			$gMentee = ($_SESSION['group']['mentee_grade_req'] == NULL) ? "N/A" : $_SESSION['group']['mentee_grade_req'];
			$gMentor = ($_SESSION['group']['mentor_grade_req'] == NULL) ? "N/A" : $_SESSION['group']['mentor_grade_req'];
			$gDesc = $_SESSION['group']['description'];
		?>
		
		<div class="column1" style="background-color:#f2f2f2;">
			<h3 align="center">Group Information</h3>
			<p class="p1"><b>GID: </b> <?php echo "$gid"; ?> <br>
			<p class="p1"><b>Name: </b> <?php echo "$gName"; ?> <br>
			<p class="p1"><b>Description: </b> <?php echo "$gDesc"; ?> <br>
			<p class="p1"><b>Can Mentor: </b> <?php echo "$gMentee"; ?> <br>
			<p class="p1"><b>Can be Mentored by: </b> <?php echo "$gMentor"; ?> <br>

			<br><br><br>
			<a href='http://localhost/Database2-Project/edit_group_form.php'>Edit Details</a>
		</div>
		
		<div class="column1" style="">
			<h3 align="center">Actions</h3>
			<?php
				echo "<div align='center'>";
				echo "<a href='http://localhost/Database2-Project/view_members_page.php'>View members</a><br><br><br>";
				echo "<a href='http://localhost/Database2-Project/view_meetings_page.php'>View meetings</a><br>";
				echo "<a href='http://localhost/Database2-Project/create_meeting_form.php'>Create meeting</a><br><br>";
				echo "</div>";
			?>
		</div>
		<br><br><a href='http://localhost/Database2-Project/view_groups_page.php'>Back</a>
	</body
</html>