<!DOCTYPE html>
<html>
<head>
	<title>Faculty Page</title>
	<style>
		body {
			
            background: linear-gradient(to bottom,blueviolet  ,#010230 );
			margin: 0;

			font-family: Arial, sans-serif;
		}
		
		header {
			background-color: #007ACC;
			color: white;
			padding: 20px;
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
		.container {
			max-width: 1200px;
			margin: auto;
			padding: 20px;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}
        
		.faculty-card {
			background-color: #fff;
			border: 1px solid #ccc;
			
			margin: 20px;
			padding: 20px;
			text-align: center;
			width: 300px;
		}
		.faculty-card img {
			border-radius: 50%;
			width: 150px;
			height: 150px;
			object-fit: cover;
			margin-bottom: 20px;
		}
		.faculty-card h3 {
			margin-top: 0;
		}
		.faculty-card p {
			margin-bottom: 0;
		}
      
        #hod {
            margin: 0 auto;
            margin-top: 20px;
        }
		button{
            background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px;
			font-size: 16px;
			border-radius: 5px;
			cursor: pointer;
			width: 0% auto;
			margin-bottom: 20px;
			margin-top: 30px;
            margin-left: 45%;
}
h3{
	text-align:justify;

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
	
	<?php
$conn = mysqli_connect("localhost", "root", "", "students1");

$query = "SELECT * FROM teacher WHERE Rank='HOD'";
$result = mysqli_query($conn, $query);

while ($teacher = mysqli_fetch_assoc($result)) {
?>
  <div class="faculty-card" id="hod">
    <img src="<?php echo $teacher['Image']; ?>" alt="Faculty Member">
    <h3>Name :<?php echo $teacher['Teacher_name']; ?></h3>
    <h3>Rank :<?php echo $teacher['Rank']; ?></h3>
    <h3>Mobile :<?php echo $teacher['Contact_number']; ?></h3>
  </div>
<?php
}
?>

	<div class="container">
        <?php
        $query = "SELECT * FROM teacher where Rank !='HOD'";
        $result1 = mysqli_query($conn, $query);
        
        while ($teacher = mysqli_fetch_assoc($result1)) {
        ?>
        
        <div class="faculty-card">
			<img src="<?php echo $teacher['Image']; ?>" alt="Faculty Member">
			<h3>Name : <?php echo $teacher['Teacher_name']; ?></h3>
			<h3>Rank : <?php echo $teacher['Rank']; ?></h3>
		    <h3>Mobile : <?php echo $teacher['Contact_number']; ?></h3>
		</div>
        <?php
}
?>

		
		
		
	</div>
	<button onclick="window.open('register.php','_blank')">Add New Record</button>
</body>

</html>
