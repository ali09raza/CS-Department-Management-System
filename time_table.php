<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function get_students($conn, $semester1)
{
    $semester = $conn->real_escape_string($semester1);
    $query = "SELECT * FROM coursetitles WHERE semester LIKE '%$semester1%'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return array();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["semester1"])) {
    $semester1 = $conn->real_escape_string($_POST['semester1']);
    $students = get_students($conn, $semester1);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["new-submit"])) {
    foreach ($_POST['courseCode'] as $courseTitle => $courseCode) {
        $courseTitle = $conn->real_escape_string($courseTitle);
        $courseCode = $conn->real_escape_string($courseCode);
        $creditHours = $conn->real_escape_string($_POST['creditHours'][$courseTitle]);
        $semester = $conn->real_escape_string($_POST['semester'][$courseTitle]);

        // Initialize default values for checkboxes and radio buttons
        $weekdaysValue = '';
        $teacherNameValue = '';
        $timeofdayValue = '';

        // Check if weekdays for this courseTitle are set before imploding
        if (isset($_POST['weekdays'][$courseTitle])) {
            $weekdaysValue = implode(', ', $_POST['weekdays'][$courseTitle]);
        }

        if (isset($_POST['teacher_name'][$courseTitle])) {
            $teacherNameValue = $conn->real_escape_string($_POST['teacher_name'][$courseTitle]);
        }

        if (isset($_POST['timeofday'][$courseTitle])) {
            $timeofdayValue = $conn->real_escape_string($_POST['timeofday'][$courseTitle]);
        }

        $lectureTimeValue = $conn->real_escape_string($_POST['lecture_time']);
        $fridayLectureTimeValue = $conn->real_escape_string($_POST['friday_lecture_time']);

        $sql = "INSERT INTO timetable (`courseCode`, `courseTitle`, `creditHours`, `semester`, `weekdays`, `teacher_name`, `timeofday`, `lecture_time`, `friday_lecture_time`)
                VALUES ('$courseCode', '$courseTitle', '$creditHours', '$semester', '$weekdaysValue', '$teacherNameValue', '$timeofdayValue', '$lectureTimeValue', '$fridayLectureTimeValue')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
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
        border: 2px solid black;

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
			min-width: 300px;
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
    <h1 id="hi"> Time Table System</h1>
    <form action="time_table.php" method="post">
        <label for="semester">Select semester from 1 to 8:</label>
        <select name="semester1" id="semester" required>
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
        <form action="time_table.php" method="post">
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




                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($students as $student) { ?>


                        <tr>
                            <td><?php echo $student['courseCode']; ?></td>
                            <td><?php echo $student['courseTitle']; ?></td>
                            <td><?php echo $student['creditHours']; ?></td>
                            <td><?php echo $student['semester']; ?></td>





                            <td>
                                <label><input type="checkbox" name="weekdays[<?php echo $student['courseTitle']; ?>][]" value="monday">Monday</label>
                                <label><input type="checkbox" name="weekdays[<?php echo $student['courseTitle']; ?>][]" value="tuesday">Tuesday</label>
                                <label><input type="checkbox" name="weekdays[<?php echo $student['courseTitle']; ?>][]" value="wednesday">Wednesday</label>
                                <label><input type="checkbox" name="weekdays[<?php echo $student['courseTitle']; ?>][]" value="thursday">Thursday</label>
                                <label><input type="checkbox" name="weekdays[<?php echo $student['courseTitle']; ?>][]" value="friday">Friday</label>
                                <label><input type="checkbox" name="weekdays[<?php echo $student['courseTitle']; ?>][]" value="saturday">Saturday</label>
                            </td>
                            <td>
                                <label><input type="radio" name="teacher_name[<?php echo $student['courseTitle']; ?>]" value="sohaib sb.">Sohaib sb.</label>
                                <label><input type="radio" name="teacher_name[<?php echo $student['courseTitle']; ?>]" value="ghulam dastgir sb.">Ghulam Dastgir sb.</label>
                                <label><input type="radio" name="teacher_name[<?php echo $student['courseTitle']; ?>]" value="zubair sb.">zubair sb.</label>
                                <label><input type="radio" name="teacher_name[<?php echo $student['courseTitle']; ?>]" value="sher afgun sb.">Sher Afgun sb.</label>
                            </td>
                            <td>
                            <label><input type="radio" name="timeofday[<?php echo $student['courseTitle']; ?>]" value="morning">Morning</label>
                            <label><input type="radio" name="timeofday[<?php echo $student['courseTitle']; ?>]" value="evening">Evening</label>

                                
                            </td>
                            <td>

                                <input type="text" id="lecture_time" name="lecture_time" placeholder="Enter Lecture Time"> <br>
                                <input type="text" id="friday_lecture_time" name="friday_lecture_time" placeholder="Enter friday Lecture Time">
                            </td>

                            <input type="hidden" name="courseCode[<?php echo $student['courseTitle']; ?>]" value="<?php echo $student['courseCode']; ?>">
                            <input type="hidden" name="courseTitle[<?php echo $student['courseTitle']; ?>]" value="<?php echo $student['courseTitle']; ?>">
                            <input type="hidden" name="creditHours[<?php echo $student['courseTitle']; ?>]" value="<?php echo $student['creditHours']; ?>">
                            <input type="hidden" name="semester[<?php echo $student['courseTitle']; ?>]" value="<?php echo $student['semester']; ?>">
                            





                            







                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <input type="submit" name="new-submit" value="new-Submit">

        </form>
    <?php } ?>


</body>

</html>