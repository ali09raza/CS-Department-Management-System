<!DOCTYPE html>
<html>

<head>
	<title>Teacher Detail Form</title>
	<style>
		form {
			width: 50%;
			margin: 0 auto;
			margin-top: 20px;
			border: 1px solid #ccc;
            padding: 40px;



			font-family: Arial, sans-serif;
		}

		input[type=text],
		select {
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			width: 100%;
			
		}

		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 50%;
		}

		/* h1 {
			background-color: blue;
			color: white;
			text-align: center;
		} */


		input[type=submit]:hover {
			background-color: #45a049;
		}

		body {
			 background: linear-gradient(to bottom, #010230 ,blueviolet ); 
			color: white;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			min-height: 100vh;
			/* background-image: url("54.jpg"); */
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			color: white;
		}


		header {
			background-color: #007ACC;
			color: white;
			padding: 10px;
			text-align: center;
		}

		h1 {
			margin: 0;
			font-size: 36px;
		}


		nav {
			background-color: #E1E1E1;
			padding: 10px;
		}

		nav ul {
			margin: 0;
			padding: 0;
			list-style: none;
			text-align: center;
		}

		nav li {
			display: inline-block;
			margin: 0 10px;
		}

		nav a {
			color: #007ACC;
			text-decoration: none;
			font-size: 20px;
			padding: 5px;
			border-radius: 5px;
			transition: all 0.3s ease;
		}

		nav a:hover {
			background-color: #007ACC;
			color: white;
		}


		main {
			padding: 20px;
			text-align: center;
		}

		footer {
    background-color: #007ACC;
    color: white;
    text-align: center;
    position: relative; /* Change position to fixed if you want it to be at the bottom of the viewport */
    bottom: 0;
    width: 100%;
    height: 50px;
	margin-top: 25px;

    display: flex;
    align-items: center;
    justify-content: center; /* Add this line to horizontally center the content */
}



		nav .dropdown {
			position: relative;
			display: inline-block;
		}

		nav .dropdown-content {
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 250px;
			box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
			z-index: 1;
		}

		nav .dropdown-content a {
			display: block;
			padding: 20px 50px;
			text-align: left;
			font-size: 16px;
			text-decoration: none;
			color: #007ACC;
		}

		nav .dropdown-content a:hover {
			background-color: #ddd;
		}

		nav .dropdown:hover .dropdown-content {
			display: block;
		}

	</style>

	
</head>

<body>
<header>
		<h1>CS Department Management System</h1>
		<nav>
			<ul>
				<li><a href="project1.php">Home</a></li>
				<li class="dropdown">
					<a href="#">Attendance</a>
					<div class="dropdown-content">
						<b> <a href="attendance.php">Take Attendance</a></b>
						<b> <a href="view_attendance.php">View Attendance</a></b>
					</div>
				</li>

				<li class="dropdown">
					<a href="#">Student Records</a>
					<div class="dropdown-content">
						<b> <a href="Student_form.php">Add Record</a></b>
						<b> <a href="search.php">View Records</a></b>
					</div>
				</li>
				<li><a href="student_card.php">Student Card</a></li>

				<li class="dropdown">
					<a href="#">Courses</a>
					<div class="dropdown-content">
						<b> <a href="prospectus.php">Prospectus</a></b>
						<b> <a href="edit_course.php">Edit Course</a></b>
						<b> <a href="course_form.php">ADD Course</a></b>

					</div>
				</li>
				<li class="dropdown">
					<a href="#">Time Table</a>
					<div class="dropdown-content">
						<b> <a href="time_table.php">ADD New Time Table</a></b>
						<b> <a href="show_time_table.php">Show Time Table</a></b>
					</div>
				</li>

				

				
				



				<li><a href="faculty.php">Faculty</a></li>
				<li><a href="login.php">Logout</a></li>

			</ul>
		</nav>
	</header>
	
	<form action="edit_course.php" method="post">
		<label for="courseCode">Course Code:</label>
		<input type="text" id="courseCode" name="courseCode" required><br><br>
		<label for="courseTitle">Course Title:</label>
		<input type="text" id="courseTitle" name="courseTitle" required><br><br>
		<label for="creditHours">Credit Hours:</label>
		<input type="text" id="creditHours" name="creditHours" required><br><br>
		<label for="replace_course">Enter Course Title whose values you want to update :</label>
		<input type="text" id="replace_course" name="replace_course" required><br><br>

		<label for="semester">Semester:</label>
		<select id="semester" name="semester">
			<option value="">--Select Semester--</option>
			<option value="semester 1">Semester 1</option>
			<option value="semester 2">Semester 2</option>
			<option value="semester 3">Semester 3</option>
			<option value="semester 4">Semester 4</option>
			<option value="semester 5">Semester 5</option>
			<option value="semester 6">Semester 6</option>
			<option value="semester 7">Semester 7</option>
			<option value="semester 8">Semester 8</option>
		</select><br><br>

		<input type="submit" name="submit" value="Update">
	</form>
</body>

<footer>
	<p>Developed By Ali Raza</p>
</footer>
</html>

<?php
$conn = mysqli_connect("localhost", "root", "", "students");

if (isset($_POST['submit'])) {
	$courseCode = $_POST['courseCode'];
	$courseTitle = $_POST['courseTitle'];
	$creditHours = $_POST['creditHours'];
	$replace_course = $_POST['replace_course'];
	$semester = $_POST['semester'];

	$conn = mysqli_connect("localhost", "root", "", "students1");

	$sql = "UPDATE `coursetitles` SET `courseCode`='$courseCode', `courseTitle`='$courseTitle', `creditHours`='$creditHours', `semester`='$semester' WHERE `courseTitle`='$replace_course'";
	$result = mysqli_query($conn, $sql);

	if ($result) {
		echo "Update successful";
	} else {
		echo "Sorry " . mysqli_error($conn);
	}
}
?>