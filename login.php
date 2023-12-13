/* The code provided is an HTML file that creates a login page with two login forms: one for teachers
and one for students. */
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			color: #333;
			padding: 0;
			margin: 0;
			background-image: url("12.jpg"); 
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
		}
		.container {
			display: flex; /* Add this line to create a flexbox layout */
			justify-content: center; /* Add this line to center the containers horizontally */
			margin: 100px 0;
			width: 100%; /* Adjust the width to fit both containers */
		}
		.login-form {
			margin-right: 50px; /* Add this line to create space between the containers */
			width: 500px;
			padding: 20px;
			padding-right: 40px;
			background: linear-gradient(to top, black, #010230);
			color: white;
			border-radius: 5px;
		}
		.login-form h1 {
			text-align: center;
			margin-top: 0;
		}
		.login-form label {
			display: block;
			margin-bottom: 10px;
		}
		.login-form input[type="text"], .login-form input[type="password"] {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			font-size: 16px;
			margin-bottom: 20px;
		}
		.login-form button {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px;
			font-size: 16px;
			border-radius: 5px;
			cursor: pointer;
			width: 40%;
			margin-bottom: 20px;
			margin-top: 30px;
		}
		.login-form button:hover {
			background-color: #45a049;
		}
		.login-form .error-message {
			color: red;
			margin-bottom: 20px;
		}
		.new-login-container {
			width: 500px;
			padding: 20px;
			background: linear-gradient(to top, black, #010230);
			color: white;
			border-radius: 5px;
		}
		.new-login-container h1 {
			text-align: center;
			margin-top: 0;
		}
		.new-login-container label {
			display: block;
			margin-bottom: 10px;
		}
		.new-login-container input[type="text"], .new-login-container input[type="password"] {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			font-size: 16px;
			margin-bottom: 20px;
		}
		.new-login-container button {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px;
			font-size: 16px;
			border-radius: 5px;
			cursor: pointer;
			width: 40%;
			margin-bottom: 20px;
			margin-top: 30px;
		}
		.new-login-container button:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="login-form">
			<h1>Teacher Login Form</h1>
			<form action="login.php" method="post">
				<label for="username">Username:</label>
				<input type="text" id="username" name="username" placeholder="Enter your username" required>

				<label for="password">Password:</label>
				<input type="password" id="password" name="password" placeholder="Enter your password" required>

				<button type="submit" name="submit">Login</button>
		        <button onclick="window.open('register.php', '_blank')">Register</button>
				

				
				<div class="error-message">
					<?php
					session_start(); // Start the session

					if(isset($_POST['submit'])) {
						$username = $_POST['username'];
						$password = $_POST['password'];
						
						// Replace the database connection code below with your actual code
						$conn = mysqli_connect("localhost", "root", "", "students1");
						if (!$conn) {
						    die("Connection failed: " . mysqli_connect_error());
						}

						$sql = "SELECT * FROM teacher WHERE username='$username' AND password='$password'";
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
							$_SESSION['username'] = $username;
							header('Location: project1.php');
							exit();
						} else {
							echo "Wrong username and password.";
						}

						mysqli_close($conn);
					}
					?>
				</div>
			</form>
			


		</div>
		<div class="new-login-container">
			<h1>Student Login Form</h1>
			<form action="login.php" method="post">
				<label for="new-username">Username:</label>
				<input type="text" id="new-username" name="new-username" placeholder="Enter your new username" required>

				<label for="new-password">Password:</label>
				<input type="password" id="new-password" name="new-password" placeholder="Enter your new password" required>

				<button type="submit" name="new-submit">Login</button>
		        <button onclick="window.open('student_form.php', '_blank')">Register</button>

				<div class="error-message">
					<?php
					

					if(isset($_POST['new-submit'])) {
						$username1 = $_POST['new-username'];
						$password1 = $_POST['new-password'];
						
						// Replace the database connection code below with your actual code
						$conn = mysqli_connect("localhost", "root", "", "cs_department");
						if (!$conn) {
						    die("Connection failed: " . mysqli_connect_error());
						}

						$sql = "SELECT * FROM student WHERE username='$username1' AND password='$password1'";
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
							$_SESSION['username'] = $username1;
							header('Location: project.php');
							exit();
						} else {
							echo "Wrong username and password.";
						}

						mysqli_close($conn);
					}
					?>
				</div>


			</form>
		</div>
	</div>
</body>
</html>
