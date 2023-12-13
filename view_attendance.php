<?php
require_once('db_connection.php');

function get_students($conn, $semester, $timeOfDay, $attendanceDate) {
  
    $semester = $conn->real_escape_string($semester);
    $timeOfDay = $conn->real_escape_string($timeOfDay);
    $attendanceDate = $conn->real_escape_string($attendanceDate);

    $query = "SELECT * FROM attendance WHERE attendance_date LIKE '%$attendanceDate%' AND Semester LIKE '%$semester%' AND Time_of_day = '$timeOfDay'";

    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
      return false;
    }
    
}

if (isset($_POST['submit'])) {
    $semester = $_POST['semester'];
    $timeOfDay = $_POST['timeOfDay'];
    $attendanceDate = $_POST['attendanceDate'];
    $students = get_students($conn, $semester, $timeOfDay,$attendanceDate);
   
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Data</title>
    <style>
     
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

input[type="number"], select {
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



      
      table {
        border-collapse: collapse;
        width: 100%;
        border: 2px solid black; 
        background-color: white;
        color: black;
        
        margin-right: 100px; 
      }
      th, td {
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
      text-align: center;
		}
    p{
      margin: 30px;
			font-size: 36px;
      text-align: center;
      color: white;
      background-color: red;
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
    <h1>Student Attendance System</h1>
    <form action="view_attendance.php" method="post">
    <label for="attendanceDate">Select attendance date:</label>
    <input type="date" id="attendanceDate" name="attendanceDate" required>

    <br><br>


        <label for="semester">Select semester from 1 to 8:</label>
        <select name="semester" id="semester" required>
            <option value="">--Select Semester--</option>
            <option value="1">1st Semester</option>
            <option value="2">2nd Semester</option>
            <option value="3">3rd Semester</option>
            <option value="4">4th Semester</option>
            <option value="5">5th Semester</option>
            <option value="6">6th Semester</option>
            <option value="7">7th Semester</option>
            <option value="8">8th Semester</option>
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
    <h1>View Attendance</h1>
    

    
      <?php if (!empty($students)) {?>
        <table>
            <thead>
                <tr>
                    <th>Attendance Date</th>
                    <th>College Roll Number</th>


                    <th>Name</th>
                    <th> Father Name</th>
                    <th>Time of Day</th>

                    <th>uni Roll Number</th>
                    <th>Semester</th>
                    <th>Image</th>

                    <th>Attendance Status</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student) { ?>
                    <tr>
                        <td><?php echo $student['attendance_date'];?></td>
                        <td><?php echo $student['College_roll_number'];?></td>
                        <td><?php echo $student['Student_name'];?></td>
                        <td><?php echo $student['Father_name'];?></td>
                        <td><?php echo $student['Time_of_day'];?></td>

                        <td><?php echo $student['Uni_roll_number'];?></td>
                       
                        
                        <td><?php echo $student['Semester'];?></td>
                        <td><img src="<?php echo $student['image_path']; ?>" alt="Profile Picture"></td>

                        <td><?php echo $student['status'];?></td>

                       
                        
                    </tr>
                <?php } ?>
                
            </tbody>
        </table>
    <?php }else { ?>
      <p>Records not found</p>
<?php } ?>
    
    
</body>
</html>
