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
			font: normal 14px Verdana, Geneva, sans-serif;
			margin-left: 10px;
		}
		h4 {
			margin: 20px 0px 5px 0px;
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
		<div align="center">
			<br><a href='<?php echo "$_SESSION[path]";?>view_groups_page.php'>View Groups</a>
			<a href='<?php echo "$_SESSION[path]";?>view_all_meetings_page.php'>View Meetings</a>
		</div>
		
		<div class="column1" style="background-color:#f2f2f2;">
			<h3 align="center">Group Information</h3>
			<p class="p1"><b>GID: </b> <?php echo "$gid"; ?> <br>
			<p class="p1"><b>Name: </b> <?php echo "$gName"; ?> <br>
			<p class="p1"><b>Description: </b> <?php echo "$gDesc"; ?> <br>
			<p class="p1"><b>Can Mentor: </b> <?php echo "$gMentee"; ?> <br>
			<p class="p1"><b>Can be Mentored by: </b> <?php echo "$gMentor"; ?> <br>
		</div>
		
		<div class="column1" style="">
			<h3 align="center">Actions</h3>
			<div align='center'>
			<h4>View/Edit</h4>
			<a href='<?php echo "$_SESSION[path]";?>view_members_page.php'>View members</a><br>
			<?php
				if ($_SESSION['group']['mentor_grade_req'] != NULL){
					echo "<a href='$_SESSION[path]view_meetings_page.php'>View meetings</a><br><br>";
					echo "<h4>Create</h4>";
					echo "<a href='$_SESSION[path]create_meeting_form.php'>Create single meeting</a><br>";
					echo "<a href='$_SESSION[path]create_meetings_form.php'>Create multiple meetings</a><br>";
				}
				echo "</div>";
			?>
		</div>
	</body
</html>