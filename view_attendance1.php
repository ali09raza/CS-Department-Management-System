<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function get_students($conn, $semester, $timeOfDay)
{
    $semester = $conn->real_escape_string($semester);
    $timeOfDay = $conn->real_escape_string($timeOfDay);

    $query = "SELECT * FROM records WHERE Semester LIKE '%$semester%' AND Time_of_day = '$timeOfDay'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return array();
    }
}

$students = array();
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["semester"]) && isset($_POST["timeOfDay"])) {
    $semester = $_POST['semester'];
    $timeOfDay = $_POST['timeOfDay'];
    $students = get_students($conn, $semester, $timeOfDay);
}

// ... (your existing code up to this point)

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["attendance_date"]) && isset($_POST["attendance"])) {
    $attendanceDate = $_POST["attendance_date"];
    $attendanceData = $_POST["attendance"];

    // Remove the following lines, as they are not needed
    // $fatherNames = $_POST["father_name"];
    // $College_roll_number = $_POST["College_roll_number"];

    foreach ($attendanceData as $studentName => $attendanceStatus) {
        $studentName = $conn->real_escape_string($studentName);
        $attendanceStatus = $conn->real_escape_string($attendanceStatus);

        // Retrieve Father_name and College_roll_number from the POST data directly
        $fatherName = $conn->real_escape_string($_POST["father_name"][$studentName]);
        $collegeRollNumber = $conn->real_escape_string($_POST["College_roll_number"][$studentName]);
        $Time_of_day = $conn->real_escape_string($_POST["Time_of_day"][$studentName]);
        $Semester = $conn->real_escape_string($_POST["Semester"][$studentName]);
        $Uni_roll_number = $conn->real_escape_string($_POST["Uni_roll_number"][$studentName]);

        $studentQuery = "SELECT * FROM records WHERE Student_name = '$studentName'";
    $studentResult = $conn->query($studentQuery);

    if ($studentResult && $studentResult->num_rows > 0) {
        $studentData = $studentResult->fetch_assoc();
        $imagePath = $studentData['image']; // Get the image URL from the "records" table

        // Prepare and execute the SQL statement to insert attendance data
        $sql = "INSERT INTO attendance (`attendance_date`, `College_roll_number`, `Time_of_day`, `Uni_roll_number`, `Semester`, `student_name`, `status`, `Father_name`, `image_path`) VALUES ('$attendanceDate', '$collegeRollNumber', '$Time_of_day', '$Uni_roll_number', '$Semester', '$studentName', '$attendanceStatus', '$fatherName', '$imagePath')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Student data not found for: " . $studentName;
    }

        



       /*  $sql = "INSERT INTO attendance (`attendance_date`,`College_roll_number`,`Time_of_day`,`Uni_roll_number`,`Semester`,`student_name`,`status`,`Father_name`) VALUES ('$attendanceDate','$collegeRollNumber','$Time_of_day','$Uni_roll_number','$Semester', '$studentName', '$attendanceStatus', '$fatherName')";
        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } */
    }
}

// ... (rest of your code)



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

    input[type="number"],input[type="date"],
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
    <h1 id="hi">Student Attendance System</h1>
    <form action="attendance1.php" method="post">
        <label for="semester">Select semester from 1 to 8:</label>
        <select name="semester" id="semester" required>
            <option value="">--Select Semester--</option>
            <option value="Semester 1">1st Semester</option>
            <option value="Semester 2">2nd Semester</option>
            <option value="Semester 3">3rd Semester</option>
            <option value="Semester 4">4th Semester</option>
            <option value="Semester 5">5th Semester</option>
            <option value="Semester 6">6th Semester</option>
            <option value="Semester 7">7th Semester</option>
            <option value="Semester 8">8th Semester</option>

        </select>
        <br><br>
        <label for="timeOfDay">Select time of day (Morning or Evening):</label>
        <select id="timeOfDay" name="timeOfDay" required>
            <option value="">--Please select--</option>
            <option value="Morning">Morning</option>
            <option value="Evening">Evening</option>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php if (!empty($students)) { ?>
        <form action="attendance.php" method="post">
            <label for="attendance_date">Select Attendance Date:</label>
            <input type="date" id="attendance_date" name="attendance_date" required>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>College Roll Number</th>
                        <th>Time of day</th>
                        <th>uni Roll Number</th>
                    
                        <th>Semester</th>
                        <th>Image</th>
                        <th>Attendance</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student) { ?>
                        <tr>
                            <td><?php echo $student['Student_name']; ?></td>
                            <td><?php echo $student['Father_name']; ?></td>
                            <td><?php echo $student['College_roll_number']; ?></td>
                            <td><?php echo $student['Time_of_day']; ?></td>
                        <td><?php echo $student['Uni_roll_number'];?></td>
                       

                        
                            <td><?php echo $student['Semester'];?></td>
                            
                            <td><img src="<?php echo $student['image']; ?>" alt="Profile Picture"></td>
                            <td>
                                <label><input type="radio" name="attendance[<?php echo $student['Student_name']; ?>]" value="present">Present</label>
                                <label><input type="radio" name="attendance[<?php echo $student['Student_name']; ?>]" value="absent">Absent</label>
                                <label><input type="radio" name="attendance[<?php echo $student['Student_name']; ?>]" value="leave">Leave</label>
                                <input type="hidden" name="father_name[<?php echo $student['Student_name']; ?>]" value="<?php echo $student['Father_name']; ?>">
                                <input type="hidden" name="College_roll_number[<?php echo $student['Student_name']; ?>]" value="<?php echo $student['College_roll_number']; ?>">
                                <input type="hidden" name="Time_of_day[<?php echo $student['Student_name']; ?>]" value="<?php echo $student['Time_of_day']; ?>">
                                <input type="hidden" name="Semester[<?php echo $student['Student_name']; ?>]" value="<?php echo $student['Semester']; ?>">
                                <input type="hidden" name="Uni_roll_number[<?php echo $student['Student_name']; ?>]" value="<?php echo $student['Uni_roll_number']; ?>">


                           

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <input type="submit" value="Submit Attendance">
        </form>
    <?php } ?>


</body>

</html>