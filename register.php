<!DOCTYPE html>
<html>
<head>
	<title>Teacher Detail Form</title>
	<style>
        body {
            margin: 0;
            color: white;
            padding: 0;
            overflow: hidden;
        }

        .code-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(-45deg,blue, #00ff99, #00ccff, #ff00cc, #ff9900,blue,yellow);
            background-size: 400% 400%;
            animation: glitchAnimation 7s linear infinite;
        }

        @keyframes glitchAnimation {
            0%, 100% {
                background-position: 0% 50%;
            }
            25% {
                background-position: 100% 50%;
            }
            50% {
                background-position: 50% 100%;
            }
            75% {
                background-position: 0% 50%;
            }
        }

		form {
			width: 50%;
			margin: 0 auto;
			
			font-family: Arial, sans-serif;
		}
		input[type=text],input[type=password], select {
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			width: 100%;
           
		}
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 50%;
		}
		h1,label{
			background-color: red;
			color: white;
			text-align: center;
		}
        
		input[type=submit]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
<div class="code-background"></div>

	<h1>Teacher Registration</h1>
	<form action="register.php" method="post" enctype="multipart/form-data">
		<label for="name">Teacher name:</label>
		<input type="text" id="name" name="name" required placeholder="Enter Name"><br><br>
        <label for="username">Username:</label>
		<input type="text" id="username" name="username" required placeholder="Enter UserName"><br><br>

        <label for="password">Password:</label>
		<input type="password" id="password" name="password" required placeholder="Enter Password"><br><br>
		
		<label for="rank">Rank:</label>
		<select id="rank" name="rank">
            <option value="">--Select Rank--</option>
			<option value="HOD">HOD</option>
			<option value="Professor">Professor</option>
			<option value="Assistant Professor">Assistant Professor</option>
		</select><br><br>
		
		<label for="contact">Contact number:</label>
		<input type="text" id="contact" name="contact" required><br><br>
		
		<label for="image">Image:</label>
		<input type="file"  name="image"><br><br>
		
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>

<?php
$conn = mysqli_connect("localhost","root","","students1");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rank = $_POST['rank'];
    $contact = $_POST['contact'];
    $file = $_FILES['image']['name'];
    
        $sql = "INSERT INTO teacher (`Teacher_name`, `Username`, `Password`, `Rank`, `Contact_number`, `Image`) VALUES ('$name', '$username', '$password', '$rank', '$contact', '$file')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            move_uploaded_file($_FILES['image']['tmp_name'], $file);
        }
        if ($result) {
            echo "Successful";
        } else {
            echo "Sorry " . mysqli_error($conn);
        }
    }

?>

