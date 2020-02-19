<html>
	
	<style>
		label {
			margin: 0px 0px 10px 0px;
		}
		input {
			margin: 0px 0px 10px 0px;
		}
		span.required {
			color:red;
		}
	</style>
	
	<body>
		<?php include "header.php";?>
		

		<form action="new_student_page.php" method="post">
			<h3>Login as parent account</h3>
			<label for="field1"><span>Username: <span class="required">*</span></span> <input type="text" name="loginUsername"/></label> <br>
			<label for="field2"><span>Password: <span class="required">*</span></span> <input type="password" name="loginPassword"/></label> <br>
		
			<h3>Create student account</h3>
			<label for="field3"><span>Name: <span class="required">*</span></span> <input type="text" name="name"/></label> <br>
			<label for="field4"><span>Email: <span class="required">*</span></span> <input type="text" name="email"/></label> <br>
			<label for="field5"><span>Telephone: </span> <input type="text" name="phoneNum"/></label> <br>
			<label for="field6"><span>Username: <span class="required">*</span></span> <input type="text" name="username"/></label> <br>
			<label for="field7"><span>Password: <span class="required">*</span></span> <input type="password" name="password"/></label> <br>
			<label for="field8"><span>Grade Level: <span class="required">*</span></span></label>
			<select type="number" name="grade">
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
			<input type="submit">
		</form>
		
		
		
	</body>
</html>