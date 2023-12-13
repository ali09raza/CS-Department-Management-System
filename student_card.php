<?php
require_once('db_connection.php');

function get_students($conn, $semester,$timeOfDay,$College_roll_number) {
    $query = "";
    $query = "SELECT * FROM records WHERE Semester LIKE '%$semester%' AND College_roll_number LIKE '%$College_roll_number%' AND Time_of_day LIKE '%$timeOfDay%'";
   

    if ($query) {
        $result = mysqli_query($conn, $query);
        if ($result) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }

    return array();
}

if (isset($_POST['submit'])) {
    $semester = $_POST['Semester'];
    $timeOfDay = $_POST['Time_of_day'];
    $College_roll_number = $_POST['College_roll_number'];
    $students = get_students($conn, $semester, $timeOfDay,$College_roll_number);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Record</title>
  <style>
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
			color: black;
      
		}
    h1 {
  text-align: center;
  margin-top: 30px;
}
form {
  margin: 20px;
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
input[type="text"], select {
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


  h2 {
    text-align: center; 
    background-color: blue; 
    color: white;
    padding: 10px; 
  }

img {
  display: block;
  margin: 0 auto;
  max-width: 400px;
  max-height: 400px;

}
table {
  border-collapse: collapse;
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  color: white;
  background-color: blueviolet;
}
#hi{
            text-align: center;
            margin-top: 20px;
            
            font-size: 36px;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: white;
        }

tr {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
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


<h1 id="hi">Student Card System</h1>
    <form action="student_card.php" method="post">
        <label for="Semester">Select semester from 1 to 8:</label>
        <select name="Semester" id="Semester" required>
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

        <label for="Time_of_day">Select time of day (Morning or Evening):</label>
        <select id="Time_of_day" name="Time_of_day" required>
            <option value="">--Please select--</option>
            <option value="Morning">Morning</option>
            <option value="Evening">Evening</option>
        </select>

        <br><br>
        <label for="College_roll_number">Enter roll number:</label>
    <input type="text" id="College_roll_number" name="College_roll_number">

    <br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
    <h2>View Record</h2>
    <?php if (!empty($students)) {?>
        <?php foreach ($students as $student) { ?>

  
  <td><img src="<?php echo $student['image']; ?>" alt="Profile Picture"></td>
  
  <table>
  <!-- <?php foreach ($students as $student) { ?> -->
    <tr>
      <th>Field</th>
      <th>Value</th>
    </tr>
    <tr>
      <td>Student Name</td>
      <td><?php echo $student['Student_name'];?></td>
      
    </tr>
    <tr>
      <td>Father Name</td>
      <td><?php echo $student['Father_name'];?></td>
     
    </tr>
    <tr>
      <td>Department</td>
      <td><?php echo $student['Department'];?></td>
     
    </tr>
    <tr>
      <td>College Roll Number</td>
      <td><?php echo $student['College_roll_number'];?></td>
    </tr>
    <tr>
      <td>Uni Roll Number</td>
      <td><?php echo $student['Uni_roll_number'];?></td>
    </tr>
    <tr>
      <td>Registration Number</td>
      <td><?php echo $student['Registration_number'];?></td>
    </tr>
    <tr>
      <td>Semester</td>
      <td><?php echo $student['Semester'];?></td>
    </tr>
    <tr>
      <td>Time of Day</td>
      <td><?php echo $student['Time_of_day'];?></td>
    </tr>
    <tr>
      <td>Blood Group</td>
      <td><?php echo $student['Blood_group'];?></td>
    </tr>
    <tr>
      <td>CNIC</td>
      <td><?php echo $student['CNIC'];?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $student['Email'];?></td>
    </tr>
    <tr>
      <td>Mobile</td>
      <td><?php echo $student['Mobile'];?></td>
    </tr>
    <tr>
      <td>Date of Birth</td>
      <td><?php echo $student['Date of birth'];?></td>
    </tr>
    <tr>
      <td>Marital Status</td>
      <td><?php echo $student['Martial_status'];?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php echo $student['Gender'];?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $student['Address'];?></td>
    </tr>
    <!-- <?php } ?> -->
  </table>
  <?php } ?>
  <?php } ?>
  

<button onclick="window.print()">Print this page</button> 
  <h2>Developed by Ali Raza</h2>

  
</body>

</html>
