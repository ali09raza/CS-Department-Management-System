/* The given code is an HTML document that represents a CS Department Management System web page. It
includes the following components: */
<!DOCTYPE html>
<html>

<head>
	<title>CS Department Management System</title>
	<style>
		body {
			/* background: linear-gradient(to bottom, #010230 ,blueviolet ); */
			color: white;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			min-height: 100vh;
			background-image: url("54.jpg");
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
			background-color: black;
			color: white;
			text-align: center;
			position: fixed;
			bottom: 0;
			width: 100%;
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
		 marquee {
    
    color: white;
    text-align: center;
    width: 100%;
   
    font-size: 48px;
    white-space: nowrap;
    overflow: hidden;
    position: relative;
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
	<main>
		<?php
		session_start();


		if (isset($_SESSION['username'])) {
			$username = $_SESSION['username'];
		} else {

			header('Location: login.php');
			exit();
		}
		?>
		<h1>Welcome <?php echo $username; ?> to CS Department Management System</h1>
		<p>This system provides a centralized platform for managing various aspects of the CS department, such as faculty, students, courses, and events.</p>


	</main>
	
</body>

<footer>
<marquee behavior="scroll" direction="left" scrollamount="15">
<b> Computer Science Department Samundri Management System :- This system provides a centralized platform for managing various aspects of the CS department, such as faculty, students, courses,attendance,time table, student card . </b>
</marquee>
	
</footer>

</html>