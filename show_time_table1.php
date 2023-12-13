<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function get_students($conn, $semester)
{
    $semester = $conn->real_escape_string($semester);
    $query = "SELECT * FROM timetable WHERE semester LIKE '%$semester%'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return array();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["semester"])) {
    $semester = $conn->real_escape_string($_POST['semester']);
    $students = get_students($conn, $semester);
}




$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Student Data</title>

</head>
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

    form {
        margin: 20px;
        color: black;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
    }

    input[type="number"],
    input[type="date"],
    input[type="text"],
    select {
        display: block;
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    select {
        width: 100%;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }



    #hi {
        text-align: center;
        
        color: white;
        padding: 20px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        border: 2px solid white;
        background-color: white;
        color: black;

        margin-right: 100px;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid black;
    }

    th {
        background-color: green;
        color: white;
    }

    img {
        max-width: 75px;
        max-height: 75px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #3e8e41;
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
			min-width: 260px;
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

<body>
<header>
		<h1>CS Department Management System</h1>
		<nav>
			<ul>
				<li><a href="project.php">Home</a></li>
				<li class="dropdown">
					<a href="#">Attendance</a>
					<div class="dropdown-content">
						<b> <a href="view_attendance1.php">View Attendance</a></b>
					</div>
				</li>

				<li class="dropdown">
					<a href="#">Student Records</a>
					<div class="dropdown-content">
						<b> <a href="search1.php">View Records</a></b>
					</div>
				</li>
				<li><a href="student_card1.php">Student Card</a></li>

				<li class="dropdown">
					<a href="#">Courses</a>
					<div class="dropdown-content">
						<b> <a href="prospectus1.php">Prospectus</a></b>
					</div>
				</li>
				<li class="dropdown">
					<a href="#">Time Table</a>
					<div class="dropdown-content">
						<b> <a href="show_time_table1.php">Show Time Table</a></b>
					</div>
				</li>


		
				<li><a href="faculty1.php">Faculty</a></li>
				<li><a href="login.php">Logout</a></li>

			</ul>
		</nav>
	</header>
    <h1 id="hi">TimeTable Display System</h1>
    <form action="show_time_table1.php" method="post">
        <label for="semester">Select semester from 1 to 8:</label>
        <select name="semester" id="semester" required>
            <option value="">--Select Semester--</option>
            <option value="semester 1">1st semester</option>
            <option value="semester 2">2nd semester</option>
            <option value="semester 3">3rd semester</option>
            <option value="semester 4">4th semester</option>
            <option value="semester 5">5th semester</option>
            <option value="semester 6">6th semester</option>
            <option value="semester 7">7th semester</option>
            <option value="semester 8">8th semester</option>
            

        </select>
        <br><br>

        <input type="submit" name="submit" value="Submit">

    </form>

    <?php if (!empty($students)) { ?>
        
            <table>
                <thead>
                    <tr>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Credit Hours</th>
                        <th>Semester</th>
                        <th>Week Days</th>
                        <th>Teacher</th>
                        <th>Time of Day</th>
                        <th>Lecture Time</th>
                        <th>Friday Lecture Time</th>





                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($students as $student) { ?>


                        <tr>
                            <td><?php echo $student['courseCode']; ?></td>
                            <td><?php echo $student['courseTitle']; ?></td>
                            <td><?php echo $student['creditHours']; ?></td>
                            <td><?php echo $student['semester']; ?></td>
                            <td><?php echo $student['weekdays']; ?></td>
                            <td><?php echo $student['teacher_name']; ?></td>
                            <td><?php echo $student['timeofday']; ?></td>
                            <td><?php echo $student['lecture_time']; ?></td>
                            <td><?php echo $student['friday_lecture_time']; ?></td>








                        </tr>
                    <?php } ?>
                </tbody>
            </table>
          

        
    <?php } ?>


</body>

</html>