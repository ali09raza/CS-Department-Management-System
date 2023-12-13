<!DOCTYPE html>
<html>
<head>
	<title>Teacher Detail Form</title>
	<style>
		form {
			width: 50%;
			margin: 0 auto;
			
			font-family: Arial, sans-serif;
		}
		input[type=text], select {
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
		h1{
			background-color: blue;
			color: white;
			text-align: center;
		}
		input[type=submit]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
	<h1>Teacher Form</h1>
	<form action="teacher_form.php" method="post" enctype="multipart/form-data">
		<label for="name">Teacher name:</label>
		<input type="text" id="name" name="name" required><br><br>
		<label for="user_name">user name:</label>
		<input type="text" id="user_name" name="user_name" required><br><br>
		<label for="password">Password:</label>
		<input type="text" id="password" name="password" required><br><br>
		
		<label for="rank">Rank:</label>
		<select id="rank" name="rank">
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
$conn = mysqli_connect("localhost","root","","cs_department");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
    $rank =$_POST['rank'];
    $contact = $_POST['contact'];
    $file = $_FILES['image']['name'];
	if($rank=='HOD'){
    $sql = "INSERT INTO `teacher` (`Name`,`user_name`,`password`, `Rank`, `Mobile`, `Image`) VALUES ('$name','$user_name','$password', '$rank','$contact', '$file')";
    $result = mysqli_query($conn,$sql);
    if($result) {
        move_uploaded_file($_FILES['image']['tmp_name'], $file);
    }
    if($result) {
        echo "successful";
    } else {
        echo "Sorry " . mysqli_error($conn);
    }
}
   else{
	$sql = "INSERT INTO `teacher` (`Name`, `Rank`, `Mobile`, `Image`) VALUES ('$name', '$rank','$contact', '$file')";
    $result = mysqli_query($conn,$sql);
    if($result) {
        move_uploaded_file($_FILES['image']['tmp_name'], $file);
    }
    if($result) {
        echo "successful";
    } else {
        echo "Sorry " . mysqli_error($conn);
    }
}
}

?>
