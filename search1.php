<!DOCTYPE html>
<html>

<head>
    <title>Student Data</title>
    <style>
       body {
			
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
            color: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: black;
        }

        label {
            display: block;
            font-weight: bold;
            font-size: 20px;
            color: white;
            margin-bottom: 10px;
            text-align: center;
        }

        input[type="text"] {
            width: 100%;
            height: 40px;
            border-radius: 15px;
            border-color: cyan;
            margin-bottom: 10px;
        }

        input[type="submit"] {
    background-color: blue;
    color: #fff;
    padding: 10px;
    border: 2px solid black;
    border-radius: 5px;
    border-color: white;
    cursor: pointer;
    font-size: 16px;
    width: 200px;
    margin: 0 auto;
    display: block; 
}
input[type="submit"]:hover {
    background-color: green;
    
}



        .search-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
            
        }

        h1 {
            text-align: center;
            /* background-color: #007ACC; */
            color: white;
            
            
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: 4px solid red;
            margin-right: 100px;
        }

        
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid black;
            color: black;
            background-color: white;
        }

        th {
            background-color: green;
            color: white;
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid black;
        }

        img {
            max-width: 75px;
            max-height: 75px;
        }

       

		header {
			background-color: #007ACC;
			color: white;
			padding: 10px;
			text-align: center;
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
			
			color: white;
			text-align: center;
			position: relative;
			bottom: 0;
			width: 100%;
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
        hr {
    border: 2px solid white;
    margin: 20px 0;
  }


        

        
    </style>
</head>

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
    <h1>Student Records System</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="search">Enter Values to Search Data :</label>
        <input type="text" id="search" name="search" placeholder="Enter Values to search data like name, Roll Number, Registration number, Time of day, Address etc..">
        <input type="submit" value="Search">
    </form>
    <h1>View Record</h1>

    <?php
    require_once('db_connection.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $search = $_POST["search"];
        $sql = "SELECT * FROM records WHERE Student_name LIKE '%$search%' OR College_roll_number LIKE '%$search%' 
        OR Semester LIKE '%$search%' OR Father_name LIKE '%$search%' OR Uni_roll_number LIKE '%$search%' 
        OR Registration_number LIKE '%$search%' OR Blood_group LIKE '%$search%' OR CNIC LIKE '%$search%'
        OR Martial_status LIKE '%$search%' OR Gender LIKE '%$search%' OR Time_of_day LIKE '%$search%' OR Address LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
    ?>
            <table>
                <thead>
                    <tr>
                        
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>College Roll Number</th>
                        <th>Uni Roll Number</th>
                        <th>Registration Number</th>
                        <th>Semester</th>
                        <th>Time of Day</th>
                        <th>Address</th>
                        <th>Picture</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            
                            <td><?php echo $row['Student_name']; ?></td>
                            <td><?php echo $row['Father_name']; ?></td>
                            <td><?php echo $row['College_roll_number']; ?></td>
                            <td><?php echo $row['Uni_roll_number']; ?></td>
                            <td><?php echo $row['Registration_number']; ?></td>
                            <td><?php echo $row['Semester']; ?></td>
                            <td><?php echo $row['Time_of_day']; ?></td>
                            <td><?php echo $row['Address']; ?></td>
                            <td><img src="<?php echo $row['image']; ?>" alt="Profile Picture"></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    <?php
        } else {
            echo "No records found.";
        }
    }
    ?>

</body>
<hr>
<footer>
<marquee behavior="scroll" direction="left" scrollamount="15">
<b> Computer Science Department Samundri Management System :- This system provides a centralized platform for managing various aspects of the CS department, such as faculty, students, courses,attendance,time table, student card . </b>
</marquee>
	
</footer>
<hr>

</html>
