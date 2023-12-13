<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Records Form</title>
    <style>
       

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: white;
        }
        

        input[type=text],
        input[type=number],
        input[type=date],
        input[type=tel],
        input[type=email],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
            font-size: 16px;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: background-color 0.3s ease;
        }

        input[type=submit]:hover {
            background-color: blue;
        }

        select {
            height: 40px;
        }

        textarea {
            height: 80px;
            resize: vertical;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            font-size: 36px;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: white;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        body {
			 /* background: linear-gradient(to bottom, #010230 ,blueviolet );  */
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

    <h1>Student Records Form</h1>
    <form action="Student_form.php" method="post" enctype="multipart/form-data">
        <label for="studentName">Student Name:</label>
        <input type="text" id="studentName" name="studentName" required>

        <label for="username">UserName:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" required>

        <label for="fatherName">Father Name:</label>
        <input type="text" id="fatherName" name="fatherName" required>

        <label for="Department">Department:</label>
        <select id="Department" name="Department" required>
            <option value="">--Select Department--</option>
            <option value="computer science">computer science</option>

        </select>

        <label for="collegeRoll">College Roll Number:</label>
        <input type="number" id="collegeRoll" name="collegeRoll" required>

        <label for="universityRoll">University Roll Number:</label>
        <input type="number" id="universityRoll" name="universityRoll" required>

        <label for="semester">Semester:</label>
        <select id="semester" name="semester" required>
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

        <label for="registration">Registration Number:</label>
        <input type="text" id="registration" name="registration" required>

        
        <label for="bloodGroup">Blood Group:</label>
<select id="bloodGroup" name="bloodGroup" required>
  <option value="">-- Select Blood Group --</option>
  <option value="A+">A+</option>
  <option value="A-">A-</option>
  <option value="B+">B+</option>
  <option value="B-">B-</option>
  <option value="AB+">AB+</option>
  <option value="AB-">AB-</option>
  <option value="O+">O+</option>
  <option value="O-">O-</option>
</select>


        <label for="cnic">CNIC:</label>
        <input type="text" id="cnic" name="cnic" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="mobile">Mobile Number:</label>
        <input type="tel" id="mobile" name="mobile" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="maritalStatus">Marital Status:</label>
        <select id="maritalStatus" name="maritalStatus" required>
            <option value="">--Select Marital Status--</option>
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Divorced">Divorced</option>
            <option value="Widowed">Widowed</option>
        </select>
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <label for="time_of_day">Time of Day:</label>
        <select id="time_of_day" name="time_of_day">
            <option value="">--Select Time of Day--</option>
            <option value="Morning">Morning</option>
            <option value="Evening">Evening</option>
        </select>





        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>
       
        <label for="photo">Upload Photo:</label>
        <input type="file" name="image" >
      <input type="submit" name="upload" value="UPLOAD">
   
    </form>
</body>
<?php
require_once('db_connection.php');


 if(isset($_POST['upload'])){
    $studentName = $_POST['studentName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fatherName = $_POST['fatherName'];
    $Department = $_POST['Department'];
    $collegeRoll = $_POST['collegeRoll'];
    $universityRoll = $_POST['universityRoll'];
    $semester = $_POST['semester'];
    $registration = $_POST['registration'];
    $blood_Group = $_POST['bloodGroup'];
    $cnic = $_POST['cnic'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $marital_Status = $_POST['maritalStatus'];
    $gender = $_POST['gender'];
    $time_of_day = $_POST['time_of_day'];
    $address = $_POST['address'];
    $file = $_FILES['image']['name'];

    $sql = "INSERT INTO `student` (`Student_name`,`username`,`password`, `Father_name`,`Department`, `College_roll_number`, `Uni_roll_number`, `Semester`, `Registration_number`, `Blood_group`, `CNIC`, `Email`, `Mobile`, `Date of birth`, `Martial_status`, `Gender`, `Time_of_day`, `Address`, `image`) VALUES ('$studentName','$username','$password', '$fatherName','$Department', '$collegeRoll', '$universityRoll', '$semester', '$registration', '$blood_Group', '$cnic', '$email', '$mobile', '$dob', '$marital_Status', '$gender', '$time_of_day', '$address', '$file')";

            $result = mysqli_query($conn,$sql);
            if($result)
            {
                move_uploaded_file($_FILES['image']['tmp_name'], "$file");
            }
            if($result){
                 echo "successfulll";
             }
             else{
                  echo "Sorry". mysqli_error($conn);
             }


            }
    

   


    







?>

</html>