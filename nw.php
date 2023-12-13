<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function get_students($conn, $category)
{
    $category = $conn->real_escape_string($category);
    $query = "SELECT * FROM coursetitles WHERE semester LIKE '%$category%'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return array();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["category"])) {
    $category = $conn->real_escape_string($_POST['semester1']);
    $students = get_students($conn, $category);
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
			 background: linear-gradient(to bottom,black ,green ); 
			color: white;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			min-height: 100vh;
		
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



   /*  h1 {
        text-align: center;
        background-color: blue;
        color: white;
        padding: 20px;
    } */

    table {
        border-collapse: collapse;
        width: 100%;
        border: 2px solid white;

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

    

</style>

<body>

   
   
    <form action="prospectus.php" method="post">
        <label for="category">Select category:</label>
        <select name="category" id="category" required>
            <option value="">--Select Semest--</option>
            <option value="category 1">1st category</option>
            <option value="category 2">2nd category</option>
            <option value="category 3">3rd category</option>
            <option value="category 4">4th category</option>
            <option value="category 5">5th category</option>
            <option value="category 6">6th category</option>
            <option value="category 7">7th category</option>
            <option value="category 8">8th category</option>
            

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
                        
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($students as $student) { ?>


                        <tr>
                            <td><?php echo $student['courseCode']; ?></td>
                            <td><?php echo $student['courseTitle']; ?></td>
                            <td><?php echo $student['creditHours']; ?></td>
                            <td><?php echo $student['semester']; ?></td>

                            







                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
           

      
    <?php } ?>


</body>

</html>